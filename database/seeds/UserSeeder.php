<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@metropolitan.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Employee Trainee',
            'email' => 'user@metropolitan.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');

        $trainner = User::create([
            'name' => 'Trainer',
            'email' => 'trainer@metropolitan.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('trainer');
    }
}
