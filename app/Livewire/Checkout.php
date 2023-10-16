<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Checkout extends Component
{
    public $productSlug;

    public function mount($product_slug)
    {
        $this->productSlug = $product_slug;
    }

    public function render()
    {

        $product = Product::where('slug', $this->productSlug)->firstOrFail();
        // $product = Product::where('slug', $product_slug)->first();
        
        return view('livewire.checkout', [
            'product' => $product
        ]);
    }
}
