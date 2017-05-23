<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new \App\Role();
        $role_user->name = 'Gerant';

        $role_admin = new \App\Role();
        $role_admin->name = 'Admin';

        $role_other = new \App\Role();
        $role_other->name = 'Admin';
    }
}
