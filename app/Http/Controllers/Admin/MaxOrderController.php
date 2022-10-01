<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class MaxOrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all();

        $summary = DB::table('orders')
                    ->join('products','products.id','=','orders.product_id')
                    ->select(
                        'orders.product_id',
                        'products.name',
                        DB::raw('SUM(orders.qty) AS total_qty'),
                        DB::raw('SUM(orders.total_amount) AS total_amount')
                    )->groupBy('orders.product_id')
                    ->orderByDesc('total_qty')
                    ->first();

        return view('admin.orders.max-order-product', compact('orders','summary'));
    }
}
