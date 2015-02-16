<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('variables', function(Blueprint $table){
			$table->increments('id');
			$table->integer('document_id')->unsigned();
//			$table->foreign('document_id')->references('id')->on('documents');
			$table->string('name');
			$table->string('var');
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
		Schema::drop('vars');
	}

}
