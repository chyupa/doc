<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocCatsLinkerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doc_cats_linker', function(Blueprint $table){
			$table->integer('doc_id')->unsigned();
			$table->integer('cat_id')->unsigned();
		});

		Schema::table('doc_cats_linker', function(Blueprint $table){
			$table->foreign('doc_id')->references('id')->on('default_docs')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('cat_id')->references('id')->on('doc_cats')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doc_cats_linker');
	}

}
