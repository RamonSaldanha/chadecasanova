<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\FormProduct;
use App\Livewire\Home;
use App\Livewire\Checkout;

Route::get('/', Home::class);

 
Route::get('/form-product', FormProduct::class)->name('form-product');
Route::get('/checkout/{product_slug}', Checkout::class)->name('checkout');

