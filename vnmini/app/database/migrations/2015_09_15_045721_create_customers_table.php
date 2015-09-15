<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nickname', 256)->nullable();
            $table->string('fullname', 256)->nullable();
            $table->string('email', 256)->nullable();
            $table->string('password', 256)->nullable();
            $table->string('phone', 256)->nullable();
            $table->string('address', 256)->nullable();
            $table->string('city', 256)->nullable();
            $table->text('note')->nullable();
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
        Schema::drop('customers');
    }

}
