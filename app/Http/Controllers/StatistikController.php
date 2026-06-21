<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        $totalRevenue = $orders->where('status', 'completed')->sum('total_price');
        $totalOrders  = $orders->count();
        $totalCustomers = $orders->unique('customer_name')->count();
        
        $totalSold = 0;
        $productCounts = [];

        foreach ($orders as $order) {
            $productItems = $order->products;
            
            if (is_array($productItems)) {
                foreach ($productItems as $item) {
                    $name = $item['name'] ?? 'Unknown';
                    $qty = (int)($item['quantity'] ?? 0);
                    
                    $totalSold += $qty;
                    $productCounts[$name] = ($productCounts[$name] ?? 0) + $qty;
                }
            }
        }

        arsort($productCounts);
        $topProducts = array_slice($productCounts, 0, 5, true);

        $targetSales = 10000000; 
        
        $targetPercentage = ($totalRevenue / $targetSales) * 100;
        $targetPercentage = min(round($targetPercentage), 100);

        $salesData = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_price) as total'))
            ->where('status', 'completed')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $labels = $salesData->pluck('date')->map(function($date) {
            return date('d M', strtotime($date));
        })->toArray();
        
        $values = $salesData->pluck('total')->toArray();

        $monthlyData = Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as total')
        )
        ->where('status', 'completed')
        ->where('created_at', '>=', now()->subMonths(6))
        ->groupBy('year', 'month')
        ->orderBy('year', 'ASC')
        ->orderBy('month', 'ASC')
        ->get();

        $monthLabels = $monthlyData->map(function($item) {
            return date('M Y', mktime(0, 0, 0, $item->month, 1, $item->year));
        })->toArray();

        $monthValues = $monthlyData->pluck('total')->toArray();

        return view('statistik.index', compact(
            'totalRevenue', 
            'totalOrders', 
            'totalCustomers', 
            'totalSold', 
            'topProducts',
            'targetPercentage',
            'labels',
            'values',
            'monthLabels',
            'monthValues'
        ));
    }
}