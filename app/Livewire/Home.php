<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    protected $listeners = ['filterProductsByPrice' => 'applyFilter'];

    public $maxPriceDefault = 10000;
    
    public function applyFilter ($filterProductsByPrice) {
        $this->maxPriceDefault = $filterProductsByPrice;
    }

    public function render()
    {
        $products = Product::where('price', '<=', $this->maxPriceDefault)->get();
        
        $productsPaied = Product::where('paid', 2)->with('giver')->get();

        return view('livewire.home', [
            'products' => $products,
            'productsPaied' => $productsPaied
        ]);
    }
}
