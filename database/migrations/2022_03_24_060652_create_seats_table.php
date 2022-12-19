<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('accomodation_id');
            $table->unsignedBigInteger('room_id');
            $table->string('room_no');
            $table->string('seat_no');
            $table->string('floor_no');
            $table->integer('occupied')->default(0);
            $table->integer('booked')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
