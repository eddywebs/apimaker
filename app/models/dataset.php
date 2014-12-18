<?php

class dataset extends Eloquent{

	public static function search($query)
	{
		if($query){

			$datasets = DB::table('datasets')->where('description', 'LIKE', '%query%')->get();
			//Book::with('description', 'LIKE', "%%query%");
		}
		else
		{
			$datasets =dataset::all();
		}

		return $datasets;
	}


	public function table_blacklist(){
		#dataset has many blacklisted tables
		return $this->hasMany('table_blacklist');
	}

	public function column_blacklist(){
		#dataset has many blacklisted columns
		return $this->hasMany('column_blacklist');
	}

	public function tables() {
			
        return $this->belongsTo('table_blacklist');
    }

	public static function boot() {

        parent::boot();
        static::created(function($dataset) {

        	//below we get all the tables of the database and populate in the child tables
        	try{
            	$query="select distinct table_name as results from information_schema.columns where table_schema='".$dataset['dbname']."'"; 
            	$tables = dataset::runQuery($dataset, $query);

            	foreach($tables as $table=>$table_value){
					$table = new table_blacklist();
					$table->value = $table_value;//"table_blacklists";
					$table->blacklisted = false;
					$table->dataset()->associate($dataset);
					$table->save();
				}
				
            }
            catch (exception $e)
            {
            	//forget and forgive :|
            }
        });
	}

	public static function runQuery($dataset, $query){

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
		$sth = $dbh->query($query); //make sure the query as results column
		$sth->setFetchMode(PDO::FETCH_ASSOC);

		$records= $sth->fetchAll();

		foreach($records as $row){
			$results[]=$row['results'];
		}
		
		return $results;

	}



}//class end bracket