<?php

use Illuminate\Database\Seeder;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->insert([
            [
                'permission_id' => 1,
                'permission_name' => 'create_user'
            ],
            [
                'permission_id' => 2,
                'permission_name' => 'edit_user'
            ],
            [
                'permission_id' => 3,
                'permission_name' => 'view_user'
            ],
        ]);

        \DB::table('roles')->insert([
            [
                'role_id' => 1,
                'role_name' => 'Manager'
            ],
            [
                'role_id' => 2,
                'role_name' => 'Staff'
            ],
        ]);

        \DB::table('role_has_permissions')->insert([
            [
                'role_id'    => 1,
                'permission_id' => 1
            ],
            [
                'role_id'    => 1,
                'permission_id' => 2
            ],
            [
                'role_id'    => 2,
                'permission_id' => 3
            ],
        ]);
    }
}
