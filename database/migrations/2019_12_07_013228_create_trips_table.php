<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            //$table->unsignedBigInteger('car_id')->nullable();
            //$table->foreign('car_id')->references('id')->on('cars');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('tiempo_estimado')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('barrio')->nullable();
            $table->string('calle')->nullable();
            $table->integer('numero')->nullable();
            $table->integer('lugares_disponibles');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('estado')->default('proceso');
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
        Schema::dropIfExists('trips');
    }
}
