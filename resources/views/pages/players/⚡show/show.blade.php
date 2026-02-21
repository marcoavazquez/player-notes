
<div>
    <div class="flex items-center justify-between gap-4">
        <flux:text size="xl" class="mb-4">{{ $player->name }}</flux:text>
        @can('create notes')
            <flux:modal.trigger name="create-note">
                <flux:button class="mb-4">
                    Create New Note
                </flux:button>
            </flux:modal.trigger>
        @endcan
    </div>

    @forelse ($player->playerNotes as $note)
        <flux:card class="mb-4">
            <flux:text class="mb-4">{{ $note->note }}</flux:text>
            <div class="flex justify-between">
                <flux:text size="sm">Author: {{ $note->author->name }}</flux:text>
                <flux:text size="sm">{{ $note->created_at->format('d/m/Y H:i:s') }}</flux:text>
            </div>
        </flux:card>
    @empty
        <flux:text>No notes found</flux:text>
    @endforelse

    @can('create notes')
        <flux:modal name="create-note">
            <livewire:player-note.create :playerId="$player->id"/>
        </flux:modal>
    @endcan
</div>
