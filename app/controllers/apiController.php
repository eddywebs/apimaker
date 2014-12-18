<?php

class apiController extends BaseController{


	public function getApi($id, $query){
		try{
			$dataset= dataset::findOrFail($id);

			$config['name']= $dataset['dbname'];
			$config['username']= $dataset['username'];
			$config['password']= $dataset['password'];
			$config['server']= $dataset['hostname'];
			$config['port']= $dataset['port'];
			$config['type']= $dataset['dbtype'];

			// $table->string('dbname');
			// $table->string('username');
			// $table->string('password');
			// $table->string('hostname');
			// $table->integer('port');
			// $table->string('dbtype');
			// $table->string('description');
			return Eddywebs\DbToApi\DbToApi::getApi($query, $config);

		}
		catch(exception $e){
			return Redirect::action('datasetController@index')->with('flash_message','Cannot find api with id: '.$id);
		}

	}


	public function getIndex()
	{
		$config = array( 
            'name' => 'apimaker2',
            'username' => 'root',
            'password' => '',
            'server' => 'localhost',
            'port' => 3306,
            'type' => 'mysql',
            'table_blacklist' => array(),
            'column_blacklist' => array(),
		);
		$param='db=apimaker2&table=datasets&format=json';
		$var = Eddywebs\DbToApi\DbToApi::getApi($param, $config);
		//return "here goes api";
	}
}