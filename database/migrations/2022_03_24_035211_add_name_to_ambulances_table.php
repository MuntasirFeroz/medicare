<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToAmbulancesTable extends Migration
{
    
    public function up()
    {
        Schema::table('ambulances', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
        });
    }

    
    public function down()
    {
        Schema::table('ambulances', function (Blueprint $table) {
            //
        });
    }
}
