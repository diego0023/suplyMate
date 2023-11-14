<div class="min-h-full bg-white grid grid-cols-6">

    <div class="col-span-1 w-[300px] bg-[#F5F5F5]">
        @include('layouts.navbar')
    </div>
    <div class="col-span-5 w-full grid bg-gramy-200 content-start place-content-center p-4">
        <div class="w-[900px] bg-white p-8 mt-20 rounded-xl shadow-md border-b-2 border-[#3FC1C9] ">
            <div class="w-full bg-[#FC5185] p-4 rounded-xl text-white font-bold text-2xl shadow-sm mb-4">BOM</div>
            <div>
                <form wire:submit.prevent="submit">
                    {{ $this->form }}

                    <button type="submit" class="w-full mt-4 bg-[#364F6B] text-white rounded-full py-2 px-4 hover:bg-[#3FC1C9]">
                        Submit
                    </button>
                </form>
                <div class="bg-gray-100 p-4 rounded-xl border shadow-sm m-2">
                    @forelse ($tables as $table)
                    <h1 class="text-[#FC5185] font-semibold text-lg">Producto: {{$table['product']}}</h1>
                    <table>
                        <tr>
                            <td>
                                <table class="bg-gsreen-400 p-4 rounded-xl border-b-2 shadow-sm m-2 font-semibold text-[#364F6B]" >
                                    <thead>
                                        <tr>
                                            <td>Fecha</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>- Requerimientos Globales</td>
                                        </tr>
                                        <tr>
                                            <td>- Inventario Proyectado</td>
                                        </tr>
                                        <tr>
                                            <td>- Requerimientos Netos</td>
                                        </tr>
                                        <tr>
                                            <td>- Recepción de órdenes planeadas</td>
                                        </tr>
                                        <tr>
                                            <td>- Ordenes Planeadas</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            @foreach ($table['data'] as $key => $value)
                            <td>
                                <table class="text-gray-500 f">
                                    <thead>
                                        <tr>
                                            <td>{{ $key }} - </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $value['RequerimientosGlobales'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $value['InventarioProyectado'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $value['RequeriminetoNeto'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $value['Resepciondepedidoplaneadas'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $value['Pedirordenesplaneadas'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            @endforeach
                        </tr>
                    </table>
                    @empty
                    <h1 class="font-semibold text-[#24767a]">BOM</h1>
                    @endforelse
                </div>
                <div class="bg-gray-50 p-4 rounded-xl border shadow-sm m-2">
                    <h1 class="font-semibold text-[#24767a]" >RESUMEN</h1>
                    @forelse ($resume as $item)
                        @foreach ($item['data'] as $key => $value)
                                <div class=" p-4 rounded-xl border-b-2 shadow-sm m-2 font-semibold text-[#364F6B]">
                                    <span class="text-[#3FC1C9] font-semibold text-lg" >Producto: {{$item['producto']}}</span>
                                    <div>
                                        <div class="flex">
                                            <h1>Fecha: </h1>
                                            <h1 class="text-gray-500 pl-2 font-normal">{{$key}}</h1>
                                        </div>
                                        <div class="flex">
                                            <span> - Recepción pendidos planeadas </span>
                                            <span class="text-gray-500 pl-2 font-normal" >{{$value['Resepciondepedidoplaneadas']}}</span>
                                        </div>
                                        <div class="flex">
                                            <span> - Pedir órdenes planeadas </span>
                                            <span class="text-gray-500 pl-2 font-normal" > {{$value['Pedirordenesplaneadas']}}</span>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @empty

                    @endforelse
                </div>
            </div>
        </div>

    </div>

</div>

