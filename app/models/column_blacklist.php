<?php

class column_blacklist extends Eloquent{

	public function dataset(){
		return $this->hasMany('dataset');
	}
	
}