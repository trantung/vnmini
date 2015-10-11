<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 256)->nullable();
            $table->text('description', 256)->nullable();
            $table->string('image_url', 256)->nullable();
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
        Schema::drop('news');
    }

}
