<?php

class OnCamp extends Eloquent {
    

    protected $table = 'oncamp';

    public function person(){
    	return $this->belongsTo('Person','person_id','id');
    }

}

?>