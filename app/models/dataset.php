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
}