<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('route_id');
            $table->integer('number');
            $table->integer('status');
            $table->unsignedBigInteger('start_time');
            $table->unsignedBigInteger('end_time');
            $table->unsignedBigInteger('bus_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('ticket_collector_id');
            $table->unsignedBigInteger('operator_id');
            $table->unsignedBigInteger('next_station_id');
            $table->integer('next_station_number');
            $table->unsignedBigInteger('arrive_at');
            $table->integer('passenger');
            $table->unsignedBigInteger('create_by')->nullable();
            $table->timestamps();
            $table->foreign('route_id')->references('id')->on('routes');
            $table->foreign('bus_id')->references('id')->on('buses');
            $table->foreign('driver_id')->references('id')->on('staff');
            $table->foreign('ticket_collector_id')->references('id')->on('staff');
            $table->foreign('operator_id')->references('id')->on('staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
