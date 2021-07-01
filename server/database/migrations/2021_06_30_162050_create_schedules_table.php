<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_name_id');
            $table->unsignedBigInteger('route_id');
            $table->integer('number');
            $table->unsignedBigInteger('start_time');
            $table->integer('group_number');
            $table->timestamps();
            $table->foreign('route_id')->references('id')->on('routes');
            $table->foreign('route_name_id')->references('id')->on('route_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
