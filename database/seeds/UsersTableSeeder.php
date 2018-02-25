<?php

use BoldLeads\User;
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
        // Create default agent
        User::create([
            'name' => 'Lamar Nelson',
            'email' => 'lamar@boldleads.custom',
            'password' => 'Test123'
        ]);
    }
}
