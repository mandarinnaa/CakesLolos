<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'editor',
                'email' => 'editor@gmail.com',
                'password' => Hash::make('editor'),
                'role' => 'editor',
            ],
            [
                'name' => 'michi',
                'email' => 'michi@gmail.com',
                'password' => Hash::make('michi'),
                'role' => 'user',
            ],

        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], 
                $user 
            );
        }
    }
}
