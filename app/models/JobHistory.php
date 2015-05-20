<?php

class JobHistory extends Eloquent {
    

    protected $table = 'job_history';

    protected $fillable = array('person_id','date','time','work_name','work_id');

    public $timestamps = false;
}

?>