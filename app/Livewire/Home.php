<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    protected $listeners = ['filterProductsByPrice' => 'applyFilter'];

    public $products = [];

    public function mount() {
        $this->loadDefaultProducts();
    }
    
    public function loadDefaultProducts() {
        $this->products = Product::where('price', '<=', 10000)->get();
    }
    public function applyFilter ($filterProductsByPrice) {
        $this->products = Product::where('price' , '<=', $filterProductsByPrice)->get();
    }

    public function render()
    {
        return view('livewire.home', [
            'products' => $this->products
        ]);
    }
}
