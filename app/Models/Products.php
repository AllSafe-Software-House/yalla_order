<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'descrption',
        'image',
        'category_id',
        'place_id',
        'bestsale',
        'price'
    ];



    public function places()
    {
        return $this->belongsToMany(places::class);
    }

    public function menue()
    {
        return $this->hasMany(Menues::class);
    }


    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
