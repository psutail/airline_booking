<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Destination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         if (!Schema::hasTable('destination')) {
            Schema::create('destination', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();  
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
        Schema::dropIfExists('destination');
    }
}
