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
        $player = User::factory()->create([
            'name' => 'Player',
            'email' => 'player@example.com',
            'password' => bcrypt('password'),
        ]);

        $player2 = User::factory()->create([
            'name' => 'Player2',
            'email' => 'player2@example.com',
            'password' => bcrypt('password'),
        ]);

        $player3 = User::factory()->create([
            'name' => 'Player3',
            'email' => 'player3@example.com',
            'password' => bcrypt('password'),
        ]);

        $support = User::factory()->create([
            'name' => 'Support',
            'email' => 'support@example.com',
            'password' => bcrypt('password'),
        ]);

        $support2 = User::factory()->create([
            'name' => 'Support2',
            'email' => 'support2@example.com',
            'password' => bcrypt('password'),
        ]);

        $support3 = User::factory()->create([
            'name' => 'Support3',
            'email' => 'suppor3@example.com',
            'password' => bcrypt('password'),
        ]);


        $player->assignRole('player');
        $player2->assignRole('player');
        $player3->assignRole('player');

        $support->assignRole('support');
        $support2->assignRole('support');
        $support3->assignRole('support');
    }
}
