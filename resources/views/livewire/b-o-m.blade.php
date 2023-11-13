<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <button type="submit">
            Submit
        </button>
    </form>
    <div>
        @forelse ($tables as $table)
        <h1>Producto {{$table['product']}}</h1>
        <table>
            <tr>
                <td>
                    <table>
                        <thead>
                            <tr>
                                <td>Fecha</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Requerimientos Globales</td>
                            </tr>
                            <tr>
                                <td>Inventario Proyectado</td>
                            </tr>
                            <tr>
                                <td>Requerimientos Netos</td>
                            </tr>
                            <tr>
                                <td>Recepción de pedidp planeadas</td>
                            </tr>
                            <tr>
                                <td>Ordenes Planeadas</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                @foreach ($table['data'] as $key => $value)
                <td>
                    <table>
                        <thead>
                            <tr>
                                <td>{{ $key }}</td>
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
        <h1>BOM</h1>
        @endforelse
    </div>
    <div>
        <h1>Resumen</h1>
        @forelse ($resume as $item)
            @foreach ($item['data'] as $key => $value)
                    <div>
                        <span>Producto: {{$item['producto']}}</span>
                        <div>
                            <h1>Fecha: {{$key}}</h1>
                            <span>Resepcionde pedido planeadas {{$value['Resepciondepedidoplaneadas']}}</span>
                            <span>Pedir ordenes planeadas {{$value['Pedirordenesplaneadas']}}</span>
                        </div>
                    </div>
            @endforeach
        @empty

        @endforelse
    </div>
</div>
