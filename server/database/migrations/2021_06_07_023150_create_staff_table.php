<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('gender');
            $table->date('birthday');
            $table->string('identity_number');
            $table->integer('role_code');
            $table->string('user_name');
            $table->string('password');
            $table->unsignedBigInteger('route_name_id')->nullable();
            $table->unsignedBigInteger('last_worktime');
            $table->unsignedBigInteger('last_station_id');
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
        Schema::dropIfExists('staff');
    }
}
