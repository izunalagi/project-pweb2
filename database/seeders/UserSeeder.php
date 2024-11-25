<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
                'email' => 'admin@example.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'SemiAdmin',
                'email' => 'semiadmin@example.com',
                'password' => bcrypt('semiadmin'),
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@example.com',
                'password' => bcrypt('12345678'),
            ],


        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
