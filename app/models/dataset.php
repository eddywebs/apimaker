<?php

class dataset extends Eloquent{

	public static function search($query)
	{
		if($query){

			$books = DB::table('datasets')->where('description', 'LIKE', '%query%')->get();
			//Book::with('description', 'LIKE', "%%query%");
		}
		else
		{
			$books =DB::all();
		}
	}
	
}