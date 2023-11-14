<div class="min-h-full bg-white grid grid-cols-6">

    <div class="col-span-1 w-[300px] bg-[#F5F5F5]">
        @include('layouts.navbar')
    </div>
    <div class="col-span-5 w-full grid bg-gramy-200 content-start place-content-center p-4">
        <div class="w-[900px] bg-white p-8 mt-20 rounded-xl shadow-md border-b-2 border-[#3FC1C9] ">
            <div class="w-full bg-[#FC5185] p-4 rounded-xl text-white font-bold text-2xl shadow-sm">Árbol</div>
            <form wire:submit.prevent="submit">
                {{ $this->form }}

                <button type="submit" class="w-full mt-4 bg-[#364F6B] text-white rounded-full py-2 px-4 hover:bg-[#3FC1C9]">
                    Buscar
                </button>
            </form>
            @forelse ($levels as $item)
                <div>
                    <div class="bg-white grid gap-2 p-2 border rounded-lg m-2">
                        <div class="flex items-center">
                            <p class="p-2 bg-[#F5F5F5] rounded-lg text-[#FC5185] font-semibold">Nombre: </p>
                            <p class="pl-2 font-semibold text-gray-600"> {{$item['name']}}</p>
                        </div>
                        <div class="flex items-center">
                            <p class="p-2 bg-[#3FC1C9] rounded-lg text-white font-semibold">Padre: </p>
                            <p class="pl-2 font-semibold text-gray-600"> {{$item['father']}}</p>
                        </div>
                        <div class="flex items-center">
                            <p class="p-2 bg-[#364F6B] rounded-lg text-white font-semibold">Cantidad: </p>
                            <p class="pl-2 font-semibold text-gray-600"> {{$item['quantity']}}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <h1>Se mostrará el árbol de dependencias según el producto que elijas</h1>
                </div>
            @endforelse
        </div>

    </div>

</div>
