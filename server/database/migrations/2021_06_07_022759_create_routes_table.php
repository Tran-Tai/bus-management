<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_name_id');
            $table->integer('direction');
            $table->integer('total_station');
            $table->unsignedBigInteger('first_station_id');
            $table->unsignedBigInteger('last_station_id');
            $table->unsignedBigInteger('total_time');
            $table->integer('status');
            $table->unsignedBigInteger('last_update_by')->nullable();
            $table->timestamps();
            $table->foreign('route_name_id')->references('id')->on('route_names');
            $table->foreign('first_station_id')->references('id')->on('stations');
            $table->foreign('last_station_id')->references('id')->on('stations');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
