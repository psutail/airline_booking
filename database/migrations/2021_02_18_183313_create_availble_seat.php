<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailbleSeat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availble_seat', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        if (!Schema::hasTable('available_seats')) {
            Schema::create('available_seats', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('airline_id')->nullable(); 
                $table->string('seat_type')->nullable();
                $table->integer('seats')->nullable();
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
        Schema::dropIfExists('available_seats');
    }
}
