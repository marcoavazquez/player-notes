<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $player = Role::create([
            'name' => 'Player'
        ]);

        $support = Role::create([
            'name' => 'Support'
        ]);

        $admin = Role::create([
            'name' => 'Admin'
        ]);
    }
}
