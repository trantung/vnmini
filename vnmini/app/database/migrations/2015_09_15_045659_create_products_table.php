<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('code', 256)->nullable();
            $table->string('name', 256)->nullable();
            $table->string('size', 256)->nullable();
            $table->string('material', 256)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('origin_price', 256)->nullable();
            $table->string('new_price', 256)->nullable();
            $table->string('image_url', 256)->nullable();
            $table->string('big_image_url', 256)->nullable();
            $table->text('description')->nullable();
            $table->string('introduce', 256)->nullable();
            $table->string('information', 256)->nullable();
            $table->integer('status')->nullable();
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
        Schema::drop('products');
    }

}
