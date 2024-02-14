<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GenerateTestTokenCommand extends Command
{
    protected $signature = 'generate:test-token';

    protected $description = 'Generates a bearer token for the test user';

    public function handle(): void
    {
        //TODO: remove before production release
        $user = User::find(1);
        $token = $user->createToken('access-token', ['pdf'])->plainTextToken;

        $this->info($token);
    }
}
