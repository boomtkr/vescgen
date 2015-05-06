<?php

class MandayHistory extends Eloquent {
    

    protected $table = 'manday_history';


    protected $fillable = array('date_in','date_out');

    public $timestamps = false;

}

?>