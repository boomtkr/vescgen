<?php

class Work extends Eloquent {
    

    protected $table = 'work';
    
    protected $fillable = array('work_name','location','str_lvl');

    public $timestamps = false;

}

?>