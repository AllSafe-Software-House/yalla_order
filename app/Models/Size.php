<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Size extends Model
{
    use HasFactory , HasTranslations;
    protected $fillable = [
        'places_id',
        'size',
        'price'
    ];

    public $translatable = ['size'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function place(){
        return $this->belongsTo(Places::class,'places_id');
    }
}
