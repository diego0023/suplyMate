<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <button type="submit">
            Crear
        </button>
    </form>
    {{ $this->modal }}
</div>
