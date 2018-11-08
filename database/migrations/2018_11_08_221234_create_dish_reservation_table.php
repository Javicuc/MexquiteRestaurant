<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_reservation', function (Blueprint $table) {
            $table->integer('dish_id')->unsigned();
            $table->integer('reservation_id')->unsigned();

            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->foreign('reservation_id')->references('id')->on('reservations');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_reservation');
    }
}
