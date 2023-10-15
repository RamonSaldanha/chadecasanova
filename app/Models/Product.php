<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'description',
        'price',
        'photo',
        'slug',
        'giver_id',
        'available',
        'paid',
        'status', // 0 - pending, 1 - paid, 2 - canceled
        'mercado_pago_url'
    ];

    public function giver()
    {
        return $this->belongsTo(Giver::class);
    }
}
