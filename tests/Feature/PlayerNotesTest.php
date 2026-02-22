<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerNotesTest extends TestCase
{

    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_page(): void
    {
        $response = $this->get(route('player-notes'));
        $response->assertRedirect(route('login'));
    }

        public function test_authenticated_users_can_visit_the_player_notes_page(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('player-notes'));
        $response->assertOk();
    }

    public function test_player_notes_can_be_created(): void
    {
        $response = $this->post(route('player-notes'), [
            'player_id' => 1,
            'note' => 'This is a test note',
        ]);

        $response->assertStatus(200);
    }
}
