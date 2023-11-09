<?php

namespace App\Http\Livewire;

use App\Models\Supplier;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProductForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $id_supplier;

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
                    ->label('Tiempo de suministro (TS)'),
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
                        ->defaultItems(1),
             ]),

        ];
    }

    public function submit(): void
    {
        $data = $this->form->getState();
    }
    public function render()
    {
        return view('livewire.product');
    }
}
