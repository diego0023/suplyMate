<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductDependencies;
use App\Models\Supplier;

use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BOM extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $product_id;
    public $init_week;
    public $quantity_week = array();
    public $tree = array();
    public $levels = array();
    public $resume  = array();
    public $tables = array();

    protected function getFormSchema(): array
    {
        return [
            Select::make('product_id')
            ->label('Producto')
            ->options(Product::all()->pluck('name', 'id'))
            ->searchable()
            ->required(),
            DatePicker::make('init_week')
            ->label('Semana inicial')
            ->format('m/d/Y')
            ->displayFormat('d/m/Y')
            ->required(),
            Repeater::make('quantity_week')
            ->label('Cantidad por Semana')
            ->schema([
                TextInput::make('quantity')
                ->label('Cantidad')
                ->required(),
            ])
            ->createItemButtonLabel('Agregar semana'),
        ];
    }

    public function submit(): void
    {
        $data = $this->form->getState();

        $detailModel = new ProductDependencies();
        // Call the recursive method to get details
        $detailModel->getRecursiveDependencies($data['product_id'], $this->tree);

        $root = self::getProduct($data['product_id']);
        $this->levels[] = [
            'name'             =>$root->name,
            'stock_inventory' => $root->stock_inventory,
            'supply_time'     => $root->supply_time,
            'security_stock'  => $root->security_stock,
            'lot_quantity'    => $root->lot_quantity,
            'quantity'        => 1,
        ];

        foreach ($this->tree as $records) {
            $record = self::getProduct($records['product_id']);
            $this->levels[] = [
                'name'            => $record->name,
                'stock_inventory' => $record->stock_inventory,
                'supply_time'     => $record->supply_time,
                'security_stock'  => $record->security_stock,
                'lot_quantity'    => $record->lot_quantity,
                'quantity'        => $records['quantity'],

            ];
        }


        $weeks = self::getWeeks($data['init_week'], $data['quantity_week']);
        $loops = count($weeks);
        $this->tables = array();
        $table = array();
        $order = 0;
        $requerimientos = 0;
        foreach ($this->levels as $item) {
            $row = array();
            $past_row = array();
            $table = array();
            for($i = 0; $i < $loops ; $i++) {
                if($i == 0){
                    $inventario = $item['stock_inventory'] - $item['security_stock'];
                    if(!empty($weeks[$i+1])){
                        if( $weeks[$i+1]['quantity'] > $inventario){
                            $resultado = ceil($weeks[$i+1]['quantity'] / $item['lot_quantity']);
                            $order = $item['lot_quantity'] * $resultado;
                        }else{
                            $order = 0;
                        }
                    }else{
                        $order = 0;
                    }

                    if($inventario < $weeks[$i]['quantity']){
                        $requerimientos = $weeks[$i]['quantity'] - $inventario;
                    }

                    $row[$weeks[$i]['week']] = [
                        'RequerimientosGlobales'          => ($weeks[$i]['quantity'] * $item['quantity']),
                        'InventarioProyectado'            => $inventario,
                        'RequeriminetoNeto'               => $requerimientos,
                        'Resepciondepedidoplaneadas'      => 0,
                        'Pedirordenesplaneadas'           => $order,
                    ];

                }else {
                    $inventario = 0;
                    if($past_row['RequeriminetoNeto'] == 0 && $past_row['Resepciondepedidoplaneadas'] == 0 ){

                        $inventario = $weeks[$i]['quantity'] - ($past_row['InventarioProyectado']);
                    }else{
                        $inventario = $past_row['Resepciondepedidoplaneadas']  - $past_row['RequeriminetoNeto'];
                    }

                    $requerimientos = $weeks[$i]['quantity'] - $inventario;
                    $recepcion = $past_row['Pedirordenesplaneadas'];
                    $pedidos = 0;
                    if(!empty($weeks[$i+1])){
                        if( $weeks[$i+1]['quantity'] > $inventario){
                            $resultado = ceil($weeks[$i+1]['quantity'] / $item['lot_quantity']);
                            $pedidos = $item['lot_quantity'] * $resultado;
                        }else{
                            $pedidos = 0;
                        }
                    }else{
                        $pedidos = 0;
                    }


                    $row[$weeks[$i]['week']] = [
                        'RequerimientosGlobales'           => ($weeks[$i]['quantity'] * $item['quantity']),
                        'InventarioProyectado'             => $inventario,
                        'RequeriminetoNeto'                => $requerimientos,
                        'Resepciondepedidoplaneadas'       => $recepcion,
                        'Pedirordenesplaneadas'            => $pedidos,
                    ];

                }

                $past_row = $row[$weeks[$i]['week']];

            }
            $this->tables[] =[
                'product' => $item['name'],
                'data'    => $row,
            ];
        }
        $this->resume = array();
        foreach ($this->tables as $table) {
            $row = array();
           foreach ($table['data'] as $key => $value) {
            $row[$key] = [
                'Resepciondepedidoplaneadas'=> $value['Resepciondepedidoplaneadas'],
                'Pedirordenesplaneadas'=> $value['Pedirordenesplaneadas'],
            ];
           }
           $this->resume[] = [
               'producto'=> $table['product'],
               'data'=> $row,
           ];
        }
    }


    public static function getProduct($product_id){
        return Product::find($product_id);
    }

    public static function getWeeks($init_week, $details){
        $weeks = array();

        $init_date = Carbon::parse($init_week);
        for ($i = 0; $i < count($details); $i++) {
            $weeks[] = [
                'week'=> $init_date->format('d m Y'),
                'quantity' => $details[$i]['quantity'],
            ];

            $init_date->addWeek();
        }

        return $weeks;
    }






    public function render()
    {
        return view('livewire.b-o-m');
    }
}