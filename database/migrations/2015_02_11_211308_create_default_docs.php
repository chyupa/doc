<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultDocs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('default_docs', function(Blueprint $table){
			$table->increments('id');
			$table->string('name')->unique();
			$table->longText('doc_source');
			$table->string('categories');
			$table->int('no_of_vars');
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
	}

}
