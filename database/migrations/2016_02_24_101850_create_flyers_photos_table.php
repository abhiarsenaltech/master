<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlyersPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flyers_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flyer_id')->unsigned();
            $table->foreign('flyer_id')->references('id')->on('flyers')->onDetele('cascade');
            $table->string('photo');

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
        Schema::drop('flyers_photos');
    }
}
