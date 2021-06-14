<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_names', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('name');
            $table->unsignedBigInteger('time_interval');
            $table->bigInteger('first_route_id')->nullable();
            $table->bigInteger('second_route_id')->nullable();
            $table->integer('status');
            $table->unsignedBigInteger('last_update_by')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('route_names');
    }
}
