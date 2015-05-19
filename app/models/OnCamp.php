<?php

class OnCamp extends Eloquent {
    

    protected $table = 'oncamp';

    protected $fillable = array('date','person_id');

    public $timestamps = false;
}

?>