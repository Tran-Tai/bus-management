<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_name_id');
            $table->date('date');
            $table->unsignedBigInteger('operator_id');
            $table->unsignedBigInteger('create_by')->nullable();
            $table->timestamps();
            $table->foreign('route_name_id')->references('id')->on('route_names');
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
        Schema::dropIfExists('operations');
    }
}
