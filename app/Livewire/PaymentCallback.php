<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class PaymentCallback extends Component
{
    public $result;
    public $product;

    public function mount ($result, $product_slug) {
        $this->result = $result;
        $this->product = Product::where('slug', $product_slug)->with('giver')->firstOrFail();
    }
    
    public function render()
    {
        return view('livewire.payment-callback', [
            'product' => $this->product,
            'result' => $this->result
        ]);
    }
}
