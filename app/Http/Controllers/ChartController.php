<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use App\Models\User;



class ChartController extends Controller
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
   
    public function build()
    {
        $currentYear = Carbon::now()->year;
        $subscriptions = User::query()
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();
                $monthlySubscriptions = array_fill(1, 12, 0);
        foreach ($subscriptions as $month => $count) {
            $monthlySubscriptions[$month] = $count;
        }
        
        // Create the chart
        return $this->chart->lineChart()
            ->setTitle('Monthly User Subscriptions')
            ->addLine('Subscriptions', array_values($monthlySubscriptions))
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
            ->setColors(['#9B4999']);
            }
    }
