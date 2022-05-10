<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // //permission for tickets
        // Permission::create(['name' => 'tickets.index']);
        // Permission::create(['name' => 'tickets.create']);
        // Permission::create(['name' => 'tickets.edit']);
        // Permission::create(['name' => 'tickets.delete']);

        // //permission for slas
        // Permission::create(['name' => 'slas.index']);
        // Permission::create(['name' => 'slas.create']);
        // Permission::create(['name' => 'slas.edit']);
        // Permission::create(['name' => 'slas.delete']);

        // //permission for news
        // Permission::create(['name' => 'news.index']);
        // Permission::create(['name' => 'news.create']);
        // Permission::create(['name' => 'news.edit']);
        // Permission::create(['name' => 'news.delete']);

        // //permission for users
        // Permission::create(['name' => 'users.index']);
        // Permission::create(['name' => 'users.create']);
        // Permission::create(['name' => 'users.edit']);
        // Permission::create(['name' => 'users.delete']);

        // //permission for customers
        // Permission::create(['name' => 'customers.index']);
        // Permission::create(['name' => 'customers.create']);
        // Permission::create(['name' => 'customers.edit']);
        // Permission::create(['name' => 'customers.delete']);

        // //permission for projects
        // Permission::create(['name' => 'projects.index']);
        // Permission::create(['name' => 'projects.create']);
        // Permission::create(['name' => 'projects.edit']);
        // Permission::create(['name' => 'projects.delete']);

        // //permission for log_emails
        // Permission::create(['name' => 'log_emails.index']);
        // Permission::create(['name' => 'log_emails.create']);
        // Permission::create(['name' => 'log_emails.edit']);
        // Permission::create(['name' => 'log_emails.delete']);

        // //permission for log_users
        // Permission::create(['name' => 'log_users.index']);

        //permission for permissions
        Permission::create(['name' => 'permissions.index']);
    }
}
