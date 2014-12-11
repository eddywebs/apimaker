<?php

class datasetsTableSeeder extends Seeder{

	public function run(){

		Eloquent::unguard();
		$dataset = dataset::create(array(
			'description'=>'this first database description',
			'dbname'=>'personaldb',
			'username'=>'root',
			'password'=>'dbpass',
			'hostname'=>'localhost',
			'port'=>'3306',
			'type'=>'mysql',
			));
	}

}