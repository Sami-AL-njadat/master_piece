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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('EventTypeId');
            $table->foreign('EventTypeId')->references('id')->on('event_types')->onDelete('cascade');
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('aboutProject')->nullable();
            $table->string('clientRequest')->nullable();
            $table->string('idea')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->date('beginning')->nullable();
            $table->date('ending')->nullable();
            $table->string('clientName')->nullable();
            $table->integer('contractValue')->nullable();
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
        Schema::dropIfExists('events');
    }
};

 