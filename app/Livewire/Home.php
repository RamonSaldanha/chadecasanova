<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $products = Product::all();

        return view('livewire.home', [
            'products' => $products
        ]);
    }
}
