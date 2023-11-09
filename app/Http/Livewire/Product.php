<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;

class Product extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')->required(),

        ];
    }
    
    public function submit(): void
    {
        // ...
    }
    public function render()
    {
        return view('livewire.product');
    }
}
