<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Notifications\Notifiable;


class Places extends Model
{
    use HasFactory , HasTranslations , Notifiable;
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
        'latitude',
        'category_id'
    ];

    public $translatable = [
        'name',
        'descrption',
        'address'
    ];

    public function wallet()
    {
        return $this->morphOne(UserWallet::class, 'walletable');
    }

    public function walletTransactions()
    {
        return $this->morphMany(WalletTransaction::class,'transactionable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function product()
    {
        return $this->hasMany(Products::class);
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

    public function addtion(){
        return $this->hasMany(Addons::class);
    }
    public function size(){
        return $this->hasMany(Size::class);
    }
}
