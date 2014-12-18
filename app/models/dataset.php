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
		#table_blacklist belongs to a dataset
		return $this->belongsTo('table_blacklist');
	}

	public function column_blacklist(){

		return $this->belongsTo('column_blacklist');
	}	
}