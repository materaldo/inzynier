<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('dispatchers', function($table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('phone_number');
			$table->string('street')->nullable();
			$table->string('building')->nullable();
			$table->string('post_code')->nullable();
			$table->string('city')->nullable();
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
		//
		Schema::drop('dispatchers');
	}

}
