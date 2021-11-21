<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('car_brand');
            $table->string('transmition');
            $table->string('car_type');
            $table->string('engine_vol');
            $table->integer('price');
            $table->string('plate_number');
            $table->string('car_capacity');
            $table->string('car_year');
            $table->bigInteger('kilometers');
            $table->text('image');
            $table->string('fuel');
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
        Schema::dropIfExists('cars');
    }
}
