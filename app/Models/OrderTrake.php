<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTrake extends Model
{
    use HasFactory;
    protected $table = 'order_trakes';
    protected $fillable = [
        'order_id',
        'accept_statue',
        'ready_statue',
        'pickup_statue',
        'deliverd_statue'
    ];

    public function order()  {
       return  $this->hasOne(Order::class);
    }

    public function user()  {
        return  $this->belongsTo(User::class);
     }
}
