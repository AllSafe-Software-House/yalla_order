<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use App\Models\Places;
use App\Models\Reservationes;
use App\Models\Order;


class ChartorderController extends Controller
{
          protected $chartorder;

    public function __construct(LarapexChart $chartorder)
    {
        $this->chartorder = $chartorder;
    } 
   
    public function build($admin)
    {
        $placeid = $admin->place_id;
        $placedata = Places::where('id',(int) $placeid)->first();
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        
        if ($placedata->type == 'clinic') {
            $title = "Daily Clinic Subscriptions";
            $subscriptions = Reservationes::query()
                ->selectRaw('DATE(created_at) as day, COUNT(*) as count')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->where('place_id', $placedata->id)
                ->groupBy('day')
                ->pluck('count', 'day')
                ->toArray();
        } else {
            $title = "Daily Orders Subscriptions";
            $subscriptions = Order::query()
                ->selectRaw('DATE(created_at) as day, COUNT(*) as count')
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->where('place_id', $placedata->id)
                ->groupBy('day')
                ->pluck('count', 'day')
                ->toArray();
        }
        
        $chartorder = [];
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        
        foreach ($daysOfWeek as $day) {
            $chartorder[$day] = 0;
        }
        
        foreach ($subscriptions as $date => $count) {
            $dayOfWeek = Carbon::parse($date)->format('l'); 
            $chartorder[$dayOfWeek] = $count;
        }
        
        return $this->chartorder->lineChart()
            ->setTitle($title)
            ->addLine('Subscriptions', array_values($chartorder))
            ->setXAxis($daysOfWeek)
            ->setColors(['#d580d3']);
    }
}
