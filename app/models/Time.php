<?php

class Time extends Eloquent {
    

    protected $table = 'time';

    protected $fillable = array('date','time');

    public $timestamps = false;
}

?>