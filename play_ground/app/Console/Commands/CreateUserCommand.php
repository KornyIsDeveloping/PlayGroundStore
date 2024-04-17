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
    protected $signature = 'user:create {first_name} {last_name} {email} {password}'; //the name of the command

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
            $first_name = $this->argument('first_name');
            $last_name = $this->argument('last_name');
            $email = $this->argument('email');
            $password = $this->argument('password');

            (new \App\Models\User)->create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => bcrypt($password),
            ]);
            $bar->advance();
        }
        $bar->finish();
        $this->info('User created successfully: Email: ' . $email .'; Password: ' . $password);
    }
}
