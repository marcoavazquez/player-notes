
<div>
    <flux:button href="{{ route('player-notes.create')}}" wire:navigate>
        Create New Note
    </flux:button>
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
</div>