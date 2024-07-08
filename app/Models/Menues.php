<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menues extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'product_id',
        'sale',
        'category_id',
        'count_selling'
    ];


    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function favproduct()
    {
        return $this->hasMany(Favorites::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function place()
    {
        return $this->belongsTo(Places::class);
    }

    public function size(){
        return $this->hasMany(Size::class);
    }

}
