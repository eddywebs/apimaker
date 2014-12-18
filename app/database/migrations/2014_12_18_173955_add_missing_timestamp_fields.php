<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingTimestampFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//	$table->timestamps();
		Schema::table('table_blacklists',function($table) {
        	$table->timestamps();
		});
		Schema::table('column_blacklists',function($table) {
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
