<?php

class Person extends Eloquent {
    

    protected $table = 'person';

    protected $guarded = array('id');

    protected $fillable = array('first_name','last_name','nickname','faculty','dep','year','gender','student_id','citizen_id','phone','birthday','str_lvl','total_manday');

    public $timestamps = false;

}

?>