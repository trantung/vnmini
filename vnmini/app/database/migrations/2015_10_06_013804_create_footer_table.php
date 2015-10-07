<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('footers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('contact', 256)->nullable();
            $table->string('address', 256)->nullable();
            $table->string('hotline', 256)->nullable();
            $table->string('email', 256)->nullable();
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
        Schema::drop('footers');
	}

}
