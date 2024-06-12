<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Places;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class ChartsubsribtionclinicController extends Controller
{
        protected $chartclinic;

    public function __construct(LarapexChart $chartclinic)
    {
        $this->chartclinic = $chartclinic;
    } 
   
    public function build()
    {
        $currentYear = Carbon::now()->year;
        $subscriptions = Places::query()
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $currentYear)
            ->where('type','clinic')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();
                $monthlySubscriptions = array_fill(1, 12, 0);
        foreach ($subscriptions as $month => $count) {
            $monthlySubscriptions[$month] = $count;
        }
        
        // Create the chart
        return $this->chartclinic->lineChart()
            ->setTitle('Monthly Clinic Subscriptions')
            ->addLine('Subscriptions', array_values($monthlySubscriptions))
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
            ->setColors(['#d580d3']);
            }
}
