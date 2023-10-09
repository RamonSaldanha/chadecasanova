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
        'paid'
    ];

    public function giver()
    {
        return $this->belongsTo(Giver::class);
    }
}
