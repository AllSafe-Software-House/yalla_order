<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $table = 'settings';
    protected $fillable = ['key', 'value'];

    public function applyCashback($order)
    {
        $enabled = GeneralSetting::where('key', 'cashback_enabled')->value('value');
        $amount = GeneralSetting::where('key', 'cashback_amount')->value('value');
        $percentage = GeneralSetting::where('key', 'cashback_percentage')->value('value');
        $limit = GeneralSetting::where('key', 'cashback_limit')->value('value');

        if (!$enabled) {
            return;
        }

        if ($order->total < $limit) {
            return;
        }

        $cashbackAmount = 0;
        if ($amount > 0) {
            $cashbackAmount = $amount;
        } elseif ($percentage > 0) {
            $cashbackAmount = $order->total * ($percentage / 100);
        }

        // Apply cashback to user's wallet
        $order->user->wallet->cashback($cashbackAmount, $order->id);

        // Log cashback transaction
        $order->user->walletTransactions()->create([
            'amount' => $cashbackAmount,
            'type' => 'cashback',
            'description' => "Cashback for order #{$order->id}",
        ]);
    }

}
