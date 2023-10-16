<?php

namespace App\Livewire;

use Livewire\Component;

class ProductsFilter extends Component
{
    public $priceRange = 10000; 
    public $isCollapsed = true;

    public function toggleCollapse() {
        $this->isCollapsed = !$this->isCollapsed;
    }
    

    public function updatePriceRange () {
        $this->dispatch('filterProductsByPrice', [ 
            "price"=> $this->priceRange
        ]);
    }

    public function render()
    {
        return view('livewire.products-filter');
    }
}
