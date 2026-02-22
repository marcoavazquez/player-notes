<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{

    protected function setUp(): void
    {
        parent::setUp();

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

        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
