<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $player = Role::create([
            'name' => 'player'
        ]);

        $support = Role::create([
            'name' => 'support'
        ]);

        $playerPermission = Permission::create([
            'name' => 'view notes'
        ]);

        $supportPermission = Permission::create([
            'name' => 'create notes'
        ]);

        $player->givePermissionTo($playerPermission);
        $support->givePermissionTo($supportPermission);
    }
}
