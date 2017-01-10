<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuriedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('buried', function($table)
		{
			$table->increments('id');
			$table->integer('id_grev')->unsigned();
			$table->foreign('id_grev')->references('id')->on('graves');
			$table->string('first_name');
			$table->string('last_name');			
			$table->string('family_name')->nullable();			
			$table->date('date_of_birth');
			$table->date('date_of_death');
			$table->date('date_of_burial');
			$table->string('registration_number')->nullable();
			$table->string('street')->nullable();
			$table->string('building')->nullable();
			$table->string('post_code')->nullable();
			$table->string('city')->nullable();
			$table->string('note')->nullable();	
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
		Schema::drop('buried');
	}

}
