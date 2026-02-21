<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $player = User::createOrFirst([
            'name' => 'Player',
            'email' => 'player@example.com',
            'password' => bcrypt('password'),
        ]);

        $support = User::createOrFirst([
            'name' => 'Support',
            'email' => 'support@example.com',
            'password' => bcrypt('password'),
        ]);

        $player->assignRole('player');
        $support->assignRole('support');
    }
}
