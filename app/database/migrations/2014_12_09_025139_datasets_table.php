<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatasetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create datasets table
		Schema::create('datasets', function($table){

			#AI, pk
			$table->increments('id');
			#standard timestamping
			$table->timestamps();
			#data
			$table->string('dbname');
			$table->string('username');
			$table->string('password');
			$table->string('hostname');
			$table->integer('port');
			$table->string('dbtype');
			$table->string('description');
			$table->string('_token')->nullable();
		});

		Schema::create('table_blacklists', function($table){
			#pk
			$table->increments('id');
			$table->string('value');
			$table->integer('dataset_id')->unsigned();
			$table->string('_token')->nullable();
			$table->foreign('dataset_id')->references('id')->on('datasets');			

		});

		Schema::create('column_blacklists', function($table){
			#pk
			$table->increments('id');
			$table->string('value');
			$table->integer('dataset_id')->unsigned();
			$table->string('_token')->nullable();
			$table->foreign('dataset_id')->references('id')->on('datasets');			
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
