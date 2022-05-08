<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle(Request $myReq, Closure $next)
    {
        if($myReq->myPermit == 'myFalse'){
             return redirect()->route('products.index');
        }

        // if(auth()->user()->name != 'tipu'){
        //     return 'www.google.com';
        //     // return redirect()->route('products.index');
        // }

        return $next($myReq);
    }
}

// register middleware (MyMiddleware) into app/Http/Kernel.php using namespace



  /* 
  Note: 
  when you hit (http://localhost:8000/orders) this url, you see order list page

  if you want check some condition like:

  if you hit (http://localhost:8000/orders?permit=true) this url, you goto order list page.

  but if you hit (http://localhost:8000/orders?permit=false) this url, you goto www.google.com or anything.
    
  */
