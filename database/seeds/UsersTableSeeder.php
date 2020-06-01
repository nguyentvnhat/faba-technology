<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'email'    => 'superadmin@localhost.com',
            'password' => bcrypt('123456'),
            'first_name'  => 'Super',
            'last_name' => 'Admin',
            'role_id' => 1
        ]);

        \DB::table('users')->insert([
            'email'    => 'customer1@localhost.com',
            'password' => bcrypt('123456'),
            'first_name'     => 'Customer',
            'last_name' => 'Role',
            'role_id' => 2
        ]);
    }
}
