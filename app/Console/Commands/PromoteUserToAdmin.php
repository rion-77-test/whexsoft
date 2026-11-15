<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

#[Signature('users:promote-admin {email : The registered user email to promote}')]
#[Description('Grant administrator access to a registered user')]
class PromoteUserToAdmin extends Command
{
    public function handle(): int
    {
        $user = User::query()
            ->where('email', Str::lower((string) $this->argument('email')))
            ->first();

        if (! $user) {
            $this->components->error('No user was found with that email address.');

            return self::FAILURE;
        }

        if ($user->is_admin) {
            $this->components->info('That user already has administrator access.');

            return self::SUCCESS;
        }

        $user->is_admin = true;
        $user->save();

        $this->components->info('Administrator access granted.');

        return self::SUCCESS;
    }
}
