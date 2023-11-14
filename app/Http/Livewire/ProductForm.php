<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductDependencies;
use App\Models\Supplier;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class ProductForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $id_supplier;
    public $name;
    public $stock_inventory;
    public $supply_time;
    public $security_stock;
    public $lot_quantity;
    public $supplier;
    public $dependencies = array();

    protected function getFormSchema(): array
    {
        return [
            Card::make()
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nombre'),
                TextInput::make('stock_inventory')
                    ->required()
                    ->label('Existencia Inventario (INV)')
                    ->numeric(),
                TextInput::make('supply_time')
                    ->required()
                    ->numeric()
                    ->label('Tiempo de suministro en semanas (TS)'),
                TextInput::make('security_stock')
                    ->required()
                    ->numeric()
                    ->label('Stock de Seguridad (Es)'),
                TextInput::make('lot_quantity')
                    ->required()
                    ->numeric()
                    ->label('Cantidad Lote (Q)'),
                Select::make('id_supplier')
                    ->searchable()
                    ->required()
                    ->label('Proveedor')
                    ->options(Supplier::all()->pluck('name', 'id'))
                    ->createOptionForm([
                       TextInput::make('name')
                            ->required()
                            ->label('Nombre'),
                       TextInput::make('nit')
                            ->required()
                            ->label('Nit'),
                       TextInput::make('phone')
                            ->required()
                            ->tel()
                            ->label('Telefono'),
                       TextInput::make('email')
                            ->required()
                            ->label('email'),
                    ])
                    ->createOptionUsing(function ($data) {
                        return Supplier::create($data)->getKey();
                    }),
                ]),
                Card::make()
                ->schema([
                    Repeater::make('dependencies')
                        ->schema([
                            Select::make('id_product')
                                ->searchable()
                                ->options(Product::all()->pluck('name', 'id')),
                            TextInput::make('quantity')
                                ->label('Cantidad')
                                ->numeric(),
                        ])
                        ->createItemButtonLabel('Agregar Dependencia')
                        ->defaultItems(1),
             ]),

        ];
    }

    public function submit()
    {
        $data = $this->form->getState();
        $record = Product::create([
            'name'            => $data['name'],
            'supplier_id'     => $data['id_supplier'],
            'stock_inventory' => $data['stock_inventory'],
            'supply_time'     => $data['supply_time'],
            'security_stock'  => $data['security_stock'],
            'lot_quantity'    => $data['lot_quantity'],
        ]);

        foreach ($data['dependencies'] as $dependencie) {
            ProductDependencies::create([
                'father_id' => $record->id,
                'product_id' => $dependencie['id_product'],
                'quantity' => $dependencie['quantity'],
            ]);
        }

        return Redirect::to('product');
    }
    public function render()
    {
        return view('livewire.product');
    }

    public function generatePdf()
    {

        return Excel::download(new Product, 'products.xlsx');
    }

    public function generatePdf2()
    {
        return Excel::download(new ProductDependencies, 'Dependencias.xlsx');
    }

    public function generatePdf3()
    {

        return Excel::download(new Supplier, 'Supplier.xlsx');
    }
}