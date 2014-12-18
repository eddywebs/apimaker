<?php

class table_blacklist extends Eloquent {

	public function dataset(){
		#table blacklist belongs to a dataset
		return $this->belongsTo('dataset');
	}
}