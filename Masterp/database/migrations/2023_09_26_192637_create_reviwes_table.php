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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productId');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('customerId');
            $table->foreign('customerId')->references('id')->on('users')->onDelete('cascade');
            $table->string('review')->nullable();
            $table->string('name')->nullable();
            $table->integer('rating')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('reviews');
    }
};
