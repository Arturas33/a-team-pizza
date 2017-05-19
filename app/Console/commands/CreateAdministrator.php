<?php

namespace App\Console\commands;

use App\Models\Users;
use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;


class CreateAdministrator extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'create_admin';

    /**
     * The console command description.
     */
    protected $description = 'Create user with administrative role.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->comment('creating admin user');
        $name = $this->ask('please enter your name');
        $this->info($name);
        $email = $this->ask('please provide your e-mail');
        $this->info($email);
        $phone = $this->ask('please insert phone number');
        $this->info($phone);
        $address = $this->ask('please provide your address');
        $this->info($address);
        $password = $this->secret('please insert password');


//        $this->comment('comment');
//        $this->info('info');
//        $this->error('error');
        $record = Users::create([
            'id' => Uuid::uuid4(),
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'password' => bcrypt($password)
        ]);

        $record->role()->sync('super-admin');
    }

}