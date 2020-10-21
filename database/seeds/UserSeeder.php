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
            'name' => 'Admin Role',
            'email' =>'admin@role.test',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'name' => 'Writer Role',
            'email' =>'writer@role.test',
            'role' =>'content-writer',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole('content-writer');

        $admin = User::create([
            'name' => 'User Role',
            'email' =>'user@role.test',
            'role'=>'user',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole('user');
    }
}
