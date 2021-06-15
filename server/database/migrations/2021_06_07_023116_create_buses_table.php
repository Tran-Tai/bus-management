<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->integer('seat');
            $table->integer('capacity');
            $table->unsignedBigInteger('route_name_id')->nullable();
            $table->unsignedBigInteger('last_worktime');
            $table->unsignedBigInteger('last_station_id')->nullable();
            $table->integer('status');
            $table->unsignedBigInteger('last_update_by')->nullable();
            $table->timestamps();
            $table->foreign('route_name_id')->references('id')->on('route_names');
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
        Schema::dropIfExists('buses');
    }
}
