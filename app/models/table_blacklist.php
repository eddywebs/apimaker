<?php

class table_blacklist extends Eloquent {

	public function dataset(){
		#dataset can have many blacklisted tables
		return $this->hasMany('dataset');
	}
}