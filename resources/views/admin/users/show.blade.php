@extends('layouts.admin')

@section('title', $user->name)

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h1 class="mb-0 fs-3">{{ $user->name }}</h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">Edit User</a>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $user->name }}</dd>
                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9">{{ $user->email }}</dd>
                        <dt class="col-sm-3">Access</dt>
                        <dd class="col-sm-9">
                            <span class="badge {{ $user->is_admin ? 'text-bg-success' : 'text-bg-secondary' }}">
                                {{ $user->is_admin ? 'Administrator' : 'User' }}
                            </span>
                        </dd>
                        <dt class="col-sm-3">Created</dt>
                        <dd class="col-sm-9">{{ $user->created_at?->format('M j, Y H:i') }}</dd>
                        <dt class="col-sm-3">Last updated</dt>
                        <dd class="col-sm-9">{{ $user->updated_at?->format('M j, Y H:i') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
