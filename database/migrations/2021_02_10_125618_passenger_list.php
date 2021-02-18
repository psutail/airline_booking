<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PassengerList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         if (!Schema::hasTable('passenger_list')) {
            Schema::create('passenger_list', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('booking_id')->nullable();
                $table->string('booking_number')->nullable(); 
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->integer('age')->nullable();
                $table->string('gender')->nullable();
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
         Schema::dropIfExists('passenger_list');
    
    }
}
