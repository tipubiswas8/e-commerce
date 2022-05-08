<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
        'product_i' => 10,
        'product_n' => 'Banana',
        'product_p' => 200,
        'customer_n' => 'Tipu',
        'customer_a' => 'Dhaka',
        'customer_p' => '01991',
    ]);
        
        /* in here,

        'product_i',
        'product_n',
        'product_p',
        'customer_n',
        'customer_a',
        'customer_p'
         is orders table column name 

        10 is the value that is insert into orders table 'product_i' field
        'Banana' is the value that is insert into orders table 'product_n' field
        200 is the value that is insert into orders table 'product_p' field
        'Tipu' is the value that is insert into orders table 'customer_n' field
        'Dhaka' is the value that is insert into orders table 'customer_a' field
        01991 is the value that is insert into orders table 'customer_p' field
             
        */
   
    }
}
