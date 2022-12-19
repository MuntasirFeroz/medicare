<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbulancesTable extends Migration
{
   
    public function up()
    {
        Schema::create('ambulances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('registration_no');
            $table->integer('dispatched')->default(0);
            $table->string('driver')->nullable();
            $table->string('driver_phone')->nullable();
            $table->double('cost')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ambulances');
    }
}
