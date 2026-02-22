<div>
    <flux:table>
        <flux:table.columns>
            <flux:table.column>Player Name</flux:table.column>
            <flux:table.column>Actions</flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($this->players as $idx => $player)
                <flux:table.row wire:key="player-{{ $idx }}">
                    <flux:table.cell>{{ $player->name }}</flux:table.cell>
                    <flux:table.cell>
                        <flux:button icon="pencil" href="{{ route('players.show', $player) }}" wire:navigate />
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
