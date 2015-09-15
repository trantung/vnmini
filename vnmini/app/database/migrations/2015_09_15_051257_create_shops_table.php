<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function(Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('cascade');
        $table->string('name',45);
        $table->string('description',128);
        $table->string('address',256);
        $table->string('contact',256);
        $table->string('tel',45);
        $table->string('mobile',45);
        $table->string('image_url',256);
        $table->string('lat',256);
        $table->string('long',256);
        $table->softDeletes();
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
        Schema::drop('shops');
    }

}