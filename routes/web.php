<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\FormProduct;
use App\Livewire\Home;
use App\Livewire\Checkout;
use App\Livewire\Payment;

Route::get('/', Home::class);

 
Route::get('/form-product', FormProduct::class)->name('form-product');
Route::get('/checkout/{product_slug}', Checkout::class)->name('checkout');
Route::get('/payment/{product_slug}', Payment::class)->name('payment');
Route::get('/webhook', [Checkout::class, 'webhook'])->name('webhook');
