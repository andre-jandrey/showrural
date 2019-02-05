<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDemanda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demanda', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->integer('quantidade');
            $table->decimal('valor', 8, 2);

            $table->unsignedInteger('variedade_id')->nullable();
            $table
                ->foreign('variedade_id')
                ->references('id')
                ->on('variedade')
                ->onDelete('cascade');

            $table->unsignedInteger('user_id')->nullable();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('demanda');
    }
}
