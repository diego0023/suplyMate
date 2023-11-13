<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductDependencies;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProductTree extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $product_id;
    public $tree = array();
    public $levels = array();


    protected function getFormSchema(): array
    {
        return [
            Select::make('product_id')
                ->label('Producto para desplegar el árbol de dependencias')
                ->options(Product::all()->pluck('name', 'id'))
                ->searchable(),
        ];
    }

    public function submit(): void
    {
        $levels = array();
        $tree = array();
        $data = $this->form->getState();
        $detailModel = new ProductDependencies();
        // Call the recursive method to get details
        $detailModel->getRecursiveDependencies($data['product_id'], $this->tree);

        $root = self::getProduct($data['product_id']);
        $this->levels[] = [
            'name' => $root->name,
            'father'=> 'N/A',
            'quantity'=> '1',
        ];

        foreach ($this->tree as $records) {
            $record = self::getProduct($records['product_id']);
            $father = self::getProduct($records['father_id']);
            $this->levels[] = [
                'name' => $record->name,
                'father'=> $father->name,
                'quantity'=> $records['quantity'],
            ];
        }
    }

    public static function getProduct($product_id){
        return Product::find($product_id);
    }


    public function render()
    {
        return view('livewire.product-tree');
    }
}
