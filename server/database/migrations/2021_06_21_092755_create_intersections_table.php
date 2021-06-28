<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntersectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intersections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('first_route_id');
            $table->unsignedBigInteger('second_route_id');
            $table->unsignedBigInteger('station_id');
            $table->integer('first_route_number');
            $table->integer('second_route_number');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('first_route_id')->references('id')->on('routes');
            $table->foreign('second_route_id')->references('id')->on('routes');
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
        Schema::dropIfExists('intersections');
    }
}
