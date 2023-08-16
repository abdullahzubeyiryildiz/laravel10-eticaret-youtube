<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
   public function index() {
    $mountTotalCount = Order::where('created_at', '>=', now()->subDays(30))->count();


     $mountTotalPrice =Order::select(DB::raw('SUM(qty * price * (1 + kdv / 100)) as total_revenue'))
      ->where('created_at', '>=', now()->subDays(30))
    ->value('total_revenue');



    $TotalCount = Order::count();

    $TotalPrice =Order::select(DB::raw('SUM(qty * price * (1 + kdv / 100)) as total_revenue'))
  ->value('total_revenue');



    $topProducts = Order::select('product_id',  DB::raw('SUM(qty) as total_sold'))
  ->with('product:id,name')
    ->with(['product' => function ($query) {
           $query->select(['id','name']);
            $query->with('images');
    }])
  ->groupBy('product_id')
  ->orderByDesc('total_sold')
  ->limit(10)
  ->get();

    return view('backend.pages.index',compact('mountTotalCount','mountTotalPrice','TotalCount','TotalPrice','topProducts'));
   }

   public function orderchart() {

    $aggregatedData = Order::select(DB::raw('name, SUM(price * qty) as total_price'))
    ->groupBy('name')
    ->get();

    $labels = $aggregatedData->pluck('name');
    $data = $aggregatedData->pluck('total_price');

    $data = [
        'labels' =>  $labels,
        'data' => $data,
    ];

     return view('backend.pages.chart',compact('data'));
   }
}
