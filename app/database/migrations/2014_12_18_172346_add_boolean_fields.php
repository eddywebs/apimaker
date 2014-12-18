<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBooleanFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('table_blacklists',function($table) {
        	$table->boolean('blacklisted');
		});
		Schema::table('column_blacklists',function($table) {
       		$table->boolean('blacklisted');
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
