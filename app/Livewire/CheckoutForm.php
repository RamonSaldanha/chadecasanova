<?php

namespace App\Livewire;

use App\Models\Giver;
use App\Models\Product;
use Livewire\Component;

class CheckoutForm extends Component
{
    public $title;
    public $product_id;
    public $available;
    public $fullname;
    public $email;
    public $whatsapp;
    public $comment;
    public $terms;

    protected $rules = [
        'fullname' => 'required|min:3',
        'email' => 'required|email',
        'whatsapp' => 'required',
        'terms' => 'required',
    ];

    public function mount($product)
    {
        $this->title = $product->title;
        $this->product_id = $product->id;
        $this->available = $product->available;
    }

    public function save () {

        $this->validate();

        $giver = Giver::create([
            'fullname' => $this->fullname,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'comment' => $this->comment,
            'terms' => $this->terms,
        ]);

        $product = Product::find($this->product_id);
        $product->giver_id = $giver->id;
        $product->available = false;
        $product->save();

        session()->flash('message', 'Obrigado por presentear o casal!');
        return redirect()->route('checkout', $product->slug);

    }

    public function render()
    {
        return view('livewire.checkout-form');
    }
}
