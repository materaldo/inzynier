<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGravesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('graves', function($table)
		{
			$table->increments('id');
			$table->integer('id_place')->unsigned();
			$table->foreign('id_place')->references('id')->on('places');
			$table->date('payment_date')->nullable();
			$table->float('width')->nullable();
			$table->float('length')->nullable();
			$table->string('image')->nullable();
			$table->integer('id_type')->unsigned();
			$table->foreign('id_type')->references('id')->on('typesOfGraves');
			$table->integer('id_dis')->unsigned()->nullable();
			$table->foreign('id_dis')->references('id')->on('dispatchers');
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
		Schema::drop('graves');
	}

}
