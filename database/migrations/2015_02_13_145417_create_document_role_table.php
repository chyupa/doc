<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_role', function(Blueprint $table){
			$table->increments('id');
			$table->integer('document_id')->unsigned();
			$table->integer('role_id')->unsigned();

			$table->foreign('document_id')->references('id')->on('documents')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
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
