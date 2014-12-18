<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('homepage');
});


Route::controller('debug', 'debugController'); //implicit route

Route::resource('dataset', 'datasetController'); //switching to implicit controller

Route::get('api/v1/{id}/{query}', 'apiController@getApi');

Route::Get('getTable/{id}', function($id){

	$dataset = dataset::findOrFail($id);


// function &connect( $db ) {
		
		// check for existing connection
		// if ( isset( $this->connections[$db] ) ) {
		// 	return $this->connections[$db];
		// }
			
	
		try {
			if ($dataset['dbtype'] == 'mysql') {
				$dbh = new PDO( "mysql:host={$dataset['hostname']};dbname={$dataset['dbname']}", $dataset['username'], $dataset['password']);
			}
			elseif ($db->type == 'pgsql') {
				$dbh = new PDO( "pgsql:host={$db->server};dbname={$db->name}", $db->username, $db->password );
			}
			elseif ($db->type == 'mssql') {
				$dbh = new PDO( "sqlsrv:Server={$db->server};Database={$db->name}", $db->username, $db->password );
			}
			elseif ($db->type == 'sqlite') {
				$dbh = new PDO( "sqlite:/{$db->name}" );
			}
			elseif ($db->type == 'oracle') {
				$dbh = new PDO( "oci:dbname={$db->name}" );
			}
			elseif ($db->type == 'ibm') {
				// May require a specified port number as per http://php.net/manual/en/ref.pdo-ibm.connection.php.
				$dbh = new PDO( "ibm:DRIVER={IBM DB2 ODBC DRIVER};DATABASE={$db->name};HOSTNAME={$db->server};PROTOCOL=TCPIP;", $db->username, $db->password );
			}
			elseif ( ($db->type == 'firebird') || ($db->type == 'interbase') ){
				$dbh = new PDO( "firebird:dbname={$db->name};host={$db->server}" );
			}
			elseif ($db->type == '4D') {
				$dbh = new PDO( "4D:host={$db->server}", $db->username, $db->password );
			}
			elseif ($db->type == 'informix') {
				$dbh = new PDO( "informix:host={$db->server}; database={$db->name}; server={$db->server}", $db->username, $db->password );
			}
			else {
				$this->error('Unknown database type.');
			}
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			$this->error( $e );
		}

		// add cache?
		//$this->connections[$db->type] = &$dbh
		$sth = $dbh->query("show tables;"); //select
		$sth->setFetchMode(PDO::FETCH_ASSOC);

		// $results= $sth->fetch();

		// //int $r=0;
		// while ($results) 
		// {
		// 	print $results['Tables_in_apimaker2'] ;//= $sth['Tables_in_apimaker2'];
		// 	//$r+1;
		// 	//$results->rowCount();//"boo";//print_r($dbh);
		
		// }
		//print_r($results);
//	}
//     return $DB::select('SHOW TABLES;');


});

Route::get('addDataset', function()
{
	$dataset= new dataset();

	$dataset->dbname='personaldb';
	$dataset->username='root';
	$dataset->password='dbpass';
	$dataset->hostname='localhost';
	$dataset->port=3306;
	$dataset->dbtype='mysql';

	$dataset->save();

	return 'done adding a dataset';
});