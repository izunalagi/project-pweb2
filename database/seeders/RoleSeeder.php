<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'semiadmin', 'customer'];

        foreach ($roles as $item) {
            $role = Role::updateOrCreate([
                'name' => $item
            ], []);
        }
    }
}
