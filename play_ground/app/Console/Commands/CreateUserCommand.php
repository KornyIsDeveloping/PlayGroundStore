<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--count=} {--verified}'; //the name of the command

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user'; //will be visible when someone types php artisan list

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = $this->option('count');

        $bar = $this->output->createProgressBar($count);
        $bar->start();
        for ($i = 1; $i < $count; $i++) {
            $first_name = Str::random(8);
            $last_name = Str::random(8);
            $email = $first_name . '@example.com';
            $password = Str::random(12);

            (new \App\Models\User)->create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => bcrypt($password),
                'email_verified_at' => $this->option('verified') ? now() : null,
            ]);
            $bar->advance();
        }
        $bar->finish();
        $this->info(' ' . $count . ' Users created.');
    }
}
