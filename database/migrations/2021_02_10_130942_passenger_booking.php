<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PassengerBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        if (!Schema::hasTable('passenger_booking')) {
            Schema::create('passenger_booking', function (Blueprint $table) {
                $table->increments('id');
                $table->string('booking_number')->nullable(); 
                $table->integer('destination')->nullable();
                $table->string('terminal')->nullable();
                $table->integer('check_in_passenger')->nullable();
                $table->integer('booking_amount')->nullable();
                $table->tinyInteger('status')->nullable();
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

         Schema::dropIfExists('passenger_booking');
    
    }
}
