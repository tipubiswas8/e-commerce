<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['product_i', 'product_n', 'product_p', 'customer_n', 'customer_a', 'customer_p', 'is_deliver'];
    // protected $guarded = [];

    // public function myProductBelongsTo(){
    //     return $this->belongsTo(Product::class, 'product_i');
    // }

    public function myProductHasOne(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
