<form wire:submit="save">
    <flux:field>
        <flux:select label="Player" wire:model="playerId">
            <option value="">Select a Player</option>
            @foreach ($this->players as $player)
                <flux:select.option
                    wire:key="player-{{ $player->id }}"
                    value="{{ $player->id }}"
                >
                    {{ $player->name }}
                </flux:select.option>
            @endforeach
        </flux:select>
    </flux:field>
    <flux:field>
        <flux:textarea label="Note" wire:model="note" />
    </flux:field>
    <flux:button type="submit" wire:click.prevent="save">
        Save Note
    </flux:button>
</form>