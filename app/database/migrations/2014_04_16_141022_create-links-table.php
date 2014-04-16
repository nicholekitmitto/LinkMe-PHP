<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateLinksTable extends Migration {

	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		Schema::create('links', function($table) {
			$table->increments('id');
			$table->string('message', 250);
			$table->string('link', 200);
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
		Schema::drop('links');
	}
}
