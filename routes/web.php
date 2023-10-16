<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\FormProduct;
use App\Livewire\Home;
use App\Livewire\Payment;
use App\Livewire\PaymentCallback;
use App\Livewire\Checkout;

Route::get('/', Home::class);

 
Route::get('/form-product', FormProduct::class)->name('form-product');
Route::get('/checkout/{product_slug}', Checkout::class)->name('checkout');
Route::get('/payment/{product_slug}', Payment::class)->name('payment');
Route::get('/payment-callback/{result}/{product_slug}', PaymentCallback::class)->name('payment-callback');
