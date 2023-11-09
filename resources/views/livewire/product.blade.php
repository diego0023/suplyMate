<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <button type="submit">
            Submit
        </button>
    </form>
    {{ $this->modal }}
</div>
