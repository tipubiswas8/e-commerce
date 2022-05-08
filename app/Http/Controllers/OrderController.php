<?php

namespace App\Http\Controllers;
use App\Models\Order;

class OrderController extends Controller
{
public function index(){
    $orders = Order::all();

          return view('admin.orders.index', ['data' => $orders]);
      }
    
      public function changeStatus($id)
      {
          try {
              $order = Order::find($id);
              $order->is_deliver = true;
              $order->update();
              return redirect()->back()->with('success', 'Order delivery status changed');
          }catch(\Exception $e){
              return redirect()->back()->with('error', 'Unable to change delivery status');
          }
      }
  }

