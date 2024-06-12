<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'places_id',
        'size',
        'price'
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
