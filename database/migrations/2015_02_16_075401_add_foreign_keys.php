<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table){
      $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
      $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
    });

    Schema::table('variables', function(Blueprint $table){
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
		//
	}

}
