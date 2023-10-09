<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On; 

class ModalEditProduct extends Component
{
    public $product_id;

    public function mount($product)
    {
        $this->product_id = $product->id;
    }
    
    public function render()
    {
        $product = Product::with('giver')->find($this->product_id);
        return view('livewire.modal-edit-product', [
            'product' => $product
        ]);
    }

    #[On('turn-available')] 
    public function turnAvailable()
    {
        $product = Product::with('giver')->find($this->product_id);
        $product->available = true;
        $product->giver_id = null;
        $product->save();

        $giver = $product->giver;
        $giver->delete();

        session()->flash('turnAvailable', 'Presente disponível novamente!');
        return redirect()->route('form-product');;        

    }
}
