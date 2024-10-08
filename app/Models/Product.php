<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'weight',
        'description',
        'gender',
        'warranty',
        'store_available',
        'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
