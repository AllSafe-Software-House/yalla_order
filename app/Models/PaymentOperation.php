<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOperation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'status'
    ];
}
