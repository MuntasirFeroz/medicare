<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomBookingsTable extends Migration
{
   
    public function up()
    {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('accomodation_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('seat_id');
            $table->string('room_no');
            $table->string('seat_no');
            $table->double('cost');
            $table->date('booking_date');
            $table->time('entry_time');
            $table->string('patient');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_bookings');
    }
}
