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
        $table->integer('user_id');
        $table->string('name',45)->nullable();
        $table->string('description',128)->nullable();
        $table->string('address',256)->nullable();
        $table->string('contact',256)->nullable();
        $table->string('tel',45)->nullable();
        $table->string('mobile',45)->nullable();
        $table->string('image_url',256)->nullable();
        $table->string('lat',256)->nullable();
        $table->string('long',256)->nullable();
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