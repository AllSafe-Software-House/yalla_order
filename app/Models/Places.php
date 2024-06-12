<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'descrption',
        'starttime',
        'endtime',
        'address',
        'logo',
        'type',
        'delivery_fee',
        'longitude',
        'latitude'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function product()
    {
        return $this->belongsToMany(Products::class);
    }

    public function favproduct()
    {
        return $this->hasMany(Favorites::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function menus()
    {
        return $this->hasMany(Menues::class);
    }

    public function promocode()
    {
        return $this->hasMany(Promo_Codes::class);
    }

    public function review()
    {
        return $this->hasMany(Reviews::class);
    }

    public function doctor()
    {
        return $this->hasMany(Doctores::class);
    }

    public function reservationes()
    {
        return $this->hasMany(Reservationes::class);
    }
}
