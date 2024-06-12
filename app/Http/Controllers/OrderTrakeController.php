<?php

namespace App\Http\Controllers;

use App\Models\OrderTrake;
use Illuminate\Http\Request;

class OrderTrakeController extends Controller
{
    public function trackconfirm($order_id)
    {
        $order_trakes = OrderTrake::create([
            'order_id' => $order_id,
            'accept_statue' => '1'
        ]);
        return redirect()->back()->with('done', 'confirmed order');
    }

    public function trackready($order_id)
    {
        $order_trakes = OrderTrake::where('order_id', $order_id)->first();
        if ($order_trakes) {
            if ($order_trakes->accept_statue == '1') {
                $order_trakes->ready_statue = '1';
                $order_trakes->save();
                return redirect()->back()->with('done', 'order is ready');
            }
        } else {
            return redirect()->back()->with('fail', 'Must confirm order');
        }
    }

    public function trackpiked($order_id)
    {
        $order_trakes = OrderTrake::where('order_id', $order_id)->first();
        if ($order_trakes) {
            if ($order_trakes->accept_statue == '1' && $order_trakes->ready_statue == '1') {
                $order_trakes->pickup_statue = '1';
                $order_trakes->save();
                return redirect()->back()->with('done', 'order is pikedup');
            }else{
                return redirect()->back()->with('fail', 'Must  order is  ready');
            }
        } else {
            return redirect()->back()->with('fail', 'Must confirm order');
        }

    }

    public function trackdelivery($order_id)
    {
        $order_trakes = OrderTrake::where('order_id', $order_id)->first();
        if ($order_trakes) {
            if ($order_trakes->accept_statue == '1' && $order_trakes->ready_statue == '1' && $order_trakes->pickup_statue == '1') {
                $order_trakes->deliverd_statue = '1';
                $order_trakes->save();
                return redirect()->back()->with('done', 'order is done');
            }else{
                return redirect()->back()->with('fail', 'Must  order is  ready and picked up ');
            }
        } else {
            return redirect()->back()->with('fail', 'Must confirm order ');
        }

    }
}
