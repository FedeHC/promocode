<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user rol editor
        $editor = User::create([
        	'name' => 'editor',
        	'email' => 'editor@gmail.com',
        	'password' => bcrypt('gofer123')
        ]);

        $editor->assignRole('editor');

        // user rol moderator
        $moderator = User::create([
        	'name' => 'moderator',
        	'email' => 'moderator@gmail.com',
        	'password' => bcrypt('gofer123')
        ]);

        $moderator->assignRole('moderator');

        // user rol super-admin
        $admin = User::create([
        	'name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('gofer123')
        ]);

        $admin->assignRole('super-admin');
    }
}
