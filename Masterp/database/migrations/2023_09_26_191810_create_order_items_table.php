<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderItems', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->float('price');
            $table->unsignedBigInteger('orderId');
            $table->unsignedBigInteger('customerId');
            $table->unsignedBigInteger('productId');
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
        Schema::dropIfExists('orderItems');
    }
};
