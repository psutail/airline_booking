<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AircraftInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         if (!Schema::hasTable('aircraft_info')) {
            Schema::create('aircraft_info', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();  
                $table->tinyInteger('status')->nullable();
                 $table->string('detail')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('aircraft_info');
    }
}
