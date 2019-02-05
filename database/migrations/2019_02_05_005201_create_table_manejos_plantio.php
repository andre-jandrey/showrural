<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableManejosPlantio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manejos_plantio', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedInteger('plantio_id')->nullable();
            $table
                ->foreign('plantio_id')
                ->references('id')
                ->on('plantio')
                ->onDelete('cascade');

            $table->unsignedInteger('manejo_id')->nullable();
            $table
                ->foreign('manejo_id')
                ->references('id')
                ->on('manejo')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manejos_plantio');
    }
}
