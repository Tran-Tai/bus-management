<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('route_id');
            $table->unsignedBigInteger('station_id');
            $table->integer('station_number');
            $table->unsignedBigInteger('estimated_time');
            $table->unsignedBigInteger('actual_time');
            $table->integer('normal_passenger')->nullable();
            $table->integer('reserved_passenger')->nullable();
            $table->integer('passenger_leave')->nullable();
            $table->integer('passenger')->nullable();
            $table->timestamps();
            $table->foreign('trip_id')->references('id')->on('trips');
            $table->foreign('route_id')->references('id')->on('routes');
            $table->foreign('station_id')->references('id')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
