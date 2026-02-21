<form wire:submit="save">
    <flux:select label="Player" wire:model="playerId" class="mb-4">
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
    <flux:textarea label="Note" wire:model="note" class="mb-4" />
    <flux:button type="submit" wire:loading.attr="disabled">
        Save Note
    </flux:button>
</form>