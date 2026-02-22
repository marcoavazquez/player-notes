<div>
    @if ($message)
        <flux:callout variant="success" class="mb-4" :heading="$message" />
    @endif
    @can('create notes')
        <flux:modal.trigger name="create-note">
            <flux:button class="mb-4">
                Agregar Nota
            </flux:button>
        </flux:modal.trigger>
    @endcan
    <flux:table :paginate="$this->playerNotes">
        <flux:table.columns>
            <flux:table.column>Jugador</flux:table.column>
            <flux:table.column>Nota</flux:table.column>
            <flux:table.column>Fecha</flux:table.column>
            <flux:table.column>Autor</flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($this->playerNotes as $idx => $note)
                <flux:table.row wire:key="note-{{ $idx }}">
                    <flux:table.cell>{{ $note->player->name }}</flux:table.cell>
                    <flux:table.cell>
                        @if (strlen($note->note) > 25)
                            <flux:heading size="sm">
                                {{ substr($note->note, 0, 22) }}...
                                <flux:tooltip toggleable>
                                    <flux:button icon="eye" size="xs" variant="ghost" />
                                    <flux:tooltip.content>
                                        {{ $note->note }}
                                    </flux:tooltip.content>
                                </flux:tooltip>
                            </flux:heading>
                        @else
                            <flux:heading size="sm">
                                {{ $note->note }}
                            </flux:heading>
                        @endif
                    </flux:table.cell>
                    <flux:table.cell>{{ $note->created_at->format('Y-m-d H:i') }}</flux:table.cell>
                    <flux:table.cell>{{ $note->author->name }}</flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>

    @can('create notes')
        <flux:modal name="create-note" >
            <livewire:player-note.create />
        </flux:modal>
    @endcan
</div>
