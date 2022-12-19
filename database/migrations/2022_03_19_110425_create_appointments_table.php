<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('prescription_id')->nullable();
            $table->string('patient_name');
            $table->string('phone');
            $table->string('email');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->longText('message')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->integer('canceled')->default(0)->nullable();
            $table->integer('completed')->default(0)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
