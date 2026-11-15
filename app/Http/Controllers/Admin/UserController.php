<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->orderBy('name')
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        if (is_string($request->input('email'))) {
            $request->merge(['email' => Str::lower($request->input('email'))]);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Password::defaults()],
            'is_admin' => ['required', 'boolean'],
        ]);

        $user = new User([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);
        $user->is_admin = (bool) $validated['is_admin'];
        $user->save();

        return redirect()
            ->route('admin.users.show', $user)
            ->with('success', 'User created successfully.');
    }

    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        if (is_string($request->input('email'))) {
            $request->merge(['email' => Str::lower($request->input('email'))]);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'is_admin' => ['required', 'boolean'],
        ]);

        $failure = DB::transaction(function () use ($request, $user, $validated): ?string {
            $administrators = User::query()
                ->where('is_admin', true)
                ->orderBy('id')
                ->lockForUpdate()
                ->get(['id']);
            $currentUser = User::query()->lockForUpdate()->findOrFail($user->id);
            $isAdmin = (bool) $validated['is_admin'];

            if ($currentUser->is_admin && ! $isAdmin) {
                if ($currentUser->is($request->user())) {
                    return 'self';
                }

                if ($administrators->count() <= 1) {
                    return 'last-admin';
                }
            }

            $currentUser->name = $validated['name'];
            $currentUser->email = Str::lower($validated['email']);
            $currentUser->is_admin = $isAdmin;

            if (filled($validated['password'] ?? null)) {
                $currentUser->password = $validated['password'];
            }

            $currentUser->save();

            return null;
        });

        if ($failure !== null) {
            $message = $failure === 'self'
                ? 'You cannot remove your own administrator access.'
                : 'At least one administrator account must remain.';

            return back()
                ->withErrors(['is_admin' => $message])
                ->withInput();
        }

        return redirect()
            ->route('admin.users.show', $user)
            ->with('success', 'User updated successfully.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $failure = DB::transaction(function () use ($request, $user): ?string {
            $administrators = User::query()
                ->where('is_admin', true)
                ->orderBy('id')
                ->lockForUpdate()
                ->get(['id']);
            $currentUser = User::query()->lockForUpdate()->findOrFail($user->id);

            if ($currentUser->is($request->user())) {
                return 'self';
            }

            if ($currentUser->is_admin) {
                if ($administrators->count() <= 1) {
                    return 'last-admin';
                }
            }

            $currentUser->delete();

            return null;
        });

        if ($failure === 'self') {
            return back()->with('error', 'You cannot delete the account currently signed in.');
        }

        if ($failure === 'last-admin') {
            return back()->with('error', 'At least one administrator account must remain.');
        }

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}
