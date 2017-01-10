<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('places', function($table)
		{
			$table->increments('id');
			$table->string('sector');
			$table->integer('row');
			$table->integer('number');
			$table->integer('id_cem')->unsigned();
			$table->foreign('id_cem')->references('id')->on('cemeteries');
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
		Schema::drop('places');
	}

}
