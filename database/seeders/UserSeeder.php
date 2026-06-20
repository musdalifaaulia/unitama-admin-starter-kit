<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =[
        [
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'role' => 'Superadmin'
        ],
        [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'Admin'
        ],
        ];

            foreach($users as $user){
            User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],

            ]);
        }
    }
}
