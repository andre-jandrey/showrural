<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlantio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade');
            $table->date('inicio');
            $table->date('fim');
            $table->tinyInteger('tipo');
            $table->unsignedInteger('variedade_id')->nullable();
            $table
                ->foreign('variedade_id')
                ->references('id')
                ->on('variedade')
                ->onDelete('cascade');

            $table->unsignedInteger('endereco_id')->nullable();
            $table
                ->foreign('endereco_id')
                ->references('id')
                ->on('endereco')
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
        Schema::dropIfExists('table_plantio');
    }
}
