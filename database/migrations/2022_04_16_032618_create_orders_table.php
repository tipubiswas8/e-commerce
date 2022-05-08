<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_i')->index();
                $table->string('product_n');
                $table->integer('product_p');
                $table->string('customer_n');
                $table->string('customer_a');
                $table->integer('customer_p');
                $table->boolean('is_deliver');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
