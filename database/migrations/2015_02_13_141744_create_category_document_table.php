<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_document', function(Blueprint $table){
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->integer('document_id')->unsigned();

			$table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('document_id')->references('id')->on('documents')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_document');
	}

}
