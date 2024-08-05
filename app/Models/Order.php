<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Order extends Model
{
    use HasFactory , Notifiable , SoftDeletes;
    protected $fillable = [
        'menue_id',
        'user_id',
        'place_id',
        'Qty',
        'price',
        'addanos',
        'phone',
        'address',
        'specail_request',
        'status',
        'size_id',
        'delivery_method',
        'delivery_fee',
        'promo_code_id',
        'numberOrder',
        'pay_method',
        'merchant_order_id'
    ];


    public function place()
    {
        return $this->belongsTo(Places::class);
    }

    public function menue()
    {
        return $this->belongsTo(Menues::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trackorder()
    {
        return $this->belongsTo(OrderTrake::class);
    }
}
