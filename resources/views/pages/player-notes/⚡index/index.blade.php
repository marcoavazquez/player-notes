
<div>
    @can('create notes')
        <flux:modal.trigger name="create-note">
            <flux:button class="mb-4">
                Create New Note
            </flux:button>
        </flux:modal.trigger>
    @endcan
    <flux:table :paginate="$this->playerNotes">
        <flux:table.columns>
            <flux:table.column>Player Name</flux:table.column>
            <flux:table.column>Note</flux:table.column>
            <flux:table.column>Date</flux:table.column>
            <flux:table.column>Author</flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($this->playerNotes as $idx => $note)
                <flux:table.row wire:key="note-{{ $idx }}">
                    <flux:table.cell>{{ $note->player->name }}</flux:table.cell>
                    <flux:table.cell>{{ $note->note }}</flux:table.cell>
                    <flux:table.cell>{{ $note->created_at->format('Y-m-d') }}</flux:table.cell>
                    <flux:table.cell>{{ $note->author->name }}</flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
    @can('create notes')
        <flux:modal name="create-note">
            <livewire:player-note.create />
        </flux:modal>
    @endcan
</div>