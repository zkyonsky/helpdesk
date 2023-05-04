<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Admin'
        ]);

        $role1 = Role::create([
            'name' => 'Helpdesk'
        ]);

        $role2 = Role::create([
            'name' => 'Teknisi'
        ]);
    }
}
