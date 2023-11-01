<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On; 
use Livewire\WithFileUploads;

class ModalEditProduct extends Component
{
    use WithFileUploads;
    public $product_id;
    public $title;

    public function mount($product)
    {
        $this->product_id = $product->id;
    }

    public function save() {

        $product = Product::find($this->product_id);
        $product->title = $this->title;
        $product->save();

        session()->flash('message', 'Presente editado com sucesso!');
        return redirect()->route('form-product');
    }
    
    public function render()
    {
        $product = Product::with('giver')->find($this->product_id);
        return view('livewire.modal-edit-product', [
            'product' => $product,
            'product_id' => $this->product_id
        ]);
    }

}
