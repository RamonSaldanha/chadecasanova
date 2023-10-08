<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormProduct extends Component
{
    use WithFileUploads;

    #[Rule(['required'])]
    public $title;
    #[Rule(['required'])]
    public $description;
    #[Rule(['required'])]
    public $price;
    #[Rule('image|max:1024|required')]
    public $photo;

    public function render()
    {
        $products = Product::all();
        return view('livewire.form-product', [
            'products' => $products
        ]);
    }

    public function save() 
    {
        $this->validate();
      
        $filename = $this->photo->store('photos', 'public');

        Product::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'photo' => $filename,
            'slug' => \Str::slug($this->title)
        ]);

        session()->flash('message', 'Foto enviada com sucesso!');

        return redirect()->back(); 
    }

    public function delete($product_id)
    {

        $product = Product::find($product_id);

        if ($product) {
            $product->delete();
        }

        return redirect()->back();
    }
}
