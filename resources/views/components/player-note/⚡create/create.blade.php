<div>
    <flux:heading size="lg" class="mb-4">Nueva Nota</flux:heading>
    <form wire:submit="save">
        <flux:select label="Jugador" wire:model="playerId" class="mb-4" :disabled="$this->fromPlayerInfo">
            <option value="">Seleccionar un Jugador</option>
            @foreach ($this->players as $player)
                <flux:select.option
                    wire:key="player-{{ $player->id }}"
                    value="{{ $player->id }}"
                >
                    {{ $player->name }}
                </flux:select.option>
            @endforeach
        </flux:select>
        <flux:textarea label="Nota" wire:model="note" class="mb-4" />
        <flux:button type="submit" wire:loading.attr="disabled">
            Guardar
        </flux:button>
    </form>
</div>
