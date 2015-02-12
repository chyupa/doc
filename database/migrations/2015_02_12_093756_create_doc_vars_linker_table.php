<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocVarsLinkerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doc_vars_linker', function(Blueprint $table){
			$table->integer('doc_id')->unsigned();
			$table->integer('var_id')->unsigned();
		});

		Schema::table('doc_vars_linker', function(Blueprint $table){
			$table->foreign('doc_id')->references('id')->on('default_docs')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('var_id')->references('id')->on('doc_vars')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doc_vars_linker');
	}

}
