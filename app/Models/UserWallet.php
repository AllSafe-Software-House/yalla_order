<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function deposit($amount)
    {
        $this->balance += $amount;
        $this->save();

        $this->user()->create([
            'amount' => $amount,
            'type' => 'deposit',
            // 'description' => 'Wallet deposit',
        ]);
    }

    public function withdraw($amount)
    {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            $this->save();

            $this->user()->create([
                'amount' => -$amount,
                'type' => 'withdraw',
                // 'description' => 'Wallet withdrawal',
            ]);

            return true;
        }

        return false;
    }

    public function cashback($amount, $orderId)
    {
        $this->balance += $amount;
        $this->save();

        $this->user()->create([
            'amount' => $amount,
            'type' => 'cashback',
            'order_id'=>$orderId,
            // 'description' => "Cashback for order #$orderId",
        ]);
    }

    public function refund($amount, $orderId)
    {
        $this->balance += $amount;
        $this->save();

        $this->user()->create([
            'amount' => $amount,
            'type' => 'refund',
            'order_id'=>$orderId,
            // 'description' => "Refund for order #$orderId",
        ]);
    }

    // public function transactions()
    // {
    //     return $this->hasMany(WalletTransaction::class,'user_id');
    // }

}
