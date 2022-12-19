<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultsTable extends Migration
{
    
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('test_id');
            $table->integer('completed')->default(0)->nullable();
            $table->date('test_date');
            $table->string('patient_name');
            $table->string('phone');
            $table->string('email');
            $table->integer('age');
            $table->string('sex');
            $table->longText('result')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('test_results');
    }
}
