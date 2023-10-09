<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giver extends Model
{
    use HasFactory;
    public $fillable = [
        'fullname',
        'email',
        'whatsapp',
        'comment',
        'terms',
    ];
}
