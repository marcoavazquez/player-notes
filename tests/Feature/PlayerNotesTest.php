<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\User;

class PlayerNotesTest extends TestCase
{

    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_page(): void
    {
        $response = $this->get(route('player-notes.index'));
        $response->assertRedirect(route('login'));
    }

        public function test_authenticated_users_can_visit_the_player_notes_page(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('player-notes.index'));
        $response->assertOk();
    }

    public function test_player_notes_page_can_be_rendered(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('player-notes.index'))
            ->assertOk();
    }

    public function test_support_user_can_see_notes_button(): void
    {
        $user = User::factory()->create();
        $user->assignRole('support');
        $this->actingAs($user);

        $response = $this->get(route('home'));
        $response->assertSee('Player Notes');
    }

    public function test_player_user_cannot_see_notes_button(): void
    {
        $user = User::factory()->create();
        $user->assignRole('player');
        $this->actingAs($user);

        $response = $this->get(route('home'));
        $response->assertDontSee('Player Notes');
    }

    public function test_support_user_can_create_notes(): void
    {
        $user = User::factory()->create();
        $user->assignRole('support');
        $this->actingAs($user);

        $response = Livewire::test('player-note.create')
            ->set('playerId', 1)
            ->set('note', 'This is a test note')
            ->call('save');

        $response->assertHasNoErrors();

        $this->assertDatabaseHas('player_notes', [
            'player_id' => 1,
            'note' => 'This is a test note',
        ]);
    }

    public function test_support_user_cannot_create_notes_with_empty_note(): void
    {
        $user = User::factory()->create();
        $user->assignRole('support');
        $this->actingAs($user);

        $response = Livewire::test('player-note.create')
            ->set('playerId', 1)
            ->set('note', '')
            ->call('save');

        $response->assertHasErrors(['note']);

        $this->assertDatabaseMissing('player_notes', [
            'player_id' => 1,
            'note' => 'This is a test note',
        ]);
    }

    public function test_player_user_cannot_create_notes(): void
    {
        $user = User::factory()->create();
        $user->assignRole('player');
        $this->actingAs($user);

        $response = Livewire::test('player-note.create')
            ->set('playerId', 1)
            ->set('note', 'This is a test note')
            ->call('save');

        $this->assertDatabaseMissing('player_notes', [
            'player_id' => 1,
            'note' => 'This is a test note',
        ]);

        $response->assertForbidden();
    }
}
