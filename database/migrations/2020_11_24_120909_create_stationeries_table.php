<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stationeries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('stationery_type_id');
            $table->integer('price');
            $table->integer('stock');
            $table->text('description');
            $table->text('photo');
            $table->timestamps();

            $table->foreign('stationery_type_id')->references('id')->on('stationery_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stationeries');
    }
}
