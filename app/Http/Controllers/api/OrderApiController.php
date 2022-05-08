<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderApiController extends Controller
{
    public function store(Request $req){

        try{
        $myShippingInfo = $req->ship_info;
        Order::create([
        
        'product_i' => $req->pro_id,
        'product_n' => $req->pro_name,
        'product_p' => $req->pro_price,

        'customer_n' => $myShippingInfo['customer_name'],
        'customer_a' => $myShippingInfo['customer_address'],
        'customer_p' => $myShippingInfo['customer_phone'],

        ]);
    
        return ['mySuccess'=> true];
        }catch(\Exception $e){
        Log::error('Place order: '. $e->getMessage());
        return ['mySuccess'=> false];
        }
    }

}
