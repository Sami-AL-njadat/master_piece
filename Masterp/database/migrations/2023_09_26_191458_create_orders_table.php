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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->float('totalPrice');
            $table->unsignedBigInteger('customerId');
            $table->unsignedBigInteger('shipmentId');
            $table->unsignedBigInteger('paymentId');
            $table->timestamps();
            $table->foreign('shipmentId')->references('id')->on('shipments')->onDelete('cascade');

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
};
