<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <button type="submit">
            Buscar
        </button>
    </form>
    @forelse ($levels as $item)
        <div>
            <div>
                <h1>Nombre: {{$item['name']}}</h1>
                <span>Padre: {{$item['father']}}</span>
                <span>Cantidad: {{$item['quantity']}}</span>
            </div>
        </div>
    @empty
        <div>
            <h1>Se mostrará el árbol de dependencias según el producto que elijas</h1>
        </div>
    @endforelse
</div>
