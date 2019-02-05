<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade');

            $table->unsignedInteger('demanda_id')->nullable();
            $table
                ->foreign('demanda_id')
                ->references('id')
                ->on('demanda')
                ->onDelete('cascade');

            $table->unsignedInteger('plantio_id')->nullable();
            $table
                ->foreign('plantio_id')
                ->references('id')
                ->on('plantio')
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
        Schema::dropIfExists('venda');
    }
}
