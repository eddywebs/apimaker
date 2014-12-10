<?php

class datasetsTableSeeder extends Seeder{

	public function run(){
		$dataset = dataset::create(array(
			'dbname'=>'personaldb',
			'username'=>'root',
			'password'=>'dbpass',
			'hostname'=>'localhost',
			'port'=>'3306',
			'type'=>'mysql',
			));
	}

}