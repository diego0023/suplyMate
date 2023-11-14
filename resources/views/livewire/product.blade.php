<div class="min-h-full bg-white grid grid-cols-6">

    <div class="col-span-1 w-[300px] bg-[#F5F5F5]">
        @include('layouts.navbar')
    </div>
    <div class="col-span-5 w-full grid bg-gramy-200 content-center place-content-center p-4">
        <div class="w-[900px] bg-white p-8 rounded-xl shadow-md border-b-2 border-[#3FC1C9]">
            <div class="w-full bg-[#FC5185] p-4 rounded-xl text-white font-bold text-2xl shadow-sm">Productos</div>
            <form wire:submit.prevent="submit" class="pt-2" >
                {{ $this->form }}

                <button type="submit" class="w-full mt-4 bg-[#364F6B] text-white rounded-full py-2 px-4 hover:bg-[#3FC1C9]">
                    Crear
                </button>
            </form>
            {{ $this->modal }}
        </div>

    </div>

</div>
