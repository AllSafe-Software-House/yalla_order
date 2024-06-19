<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory , HasTranslations;
    protected $fillable = [
        // 'place_id',
        'name',
        'logo',
        'type'
    ];

    public $translatable = ['name'];


    public function places()
    {
        return $this->belongsToMany(Places::class);
    }


    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
