<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbulanceBookingsTable extends Migration
{
   
    public function up()
    {
        Schema::create('ambulance_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ambulance_id');
            $table->date('booking_date');
            $table->string('patient');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->longText('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ambulance_bookings');
    }
}
