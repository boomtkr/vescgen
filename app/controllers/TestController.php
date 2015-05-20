<?php

class TestController extends BaseController {
	public static function exportjson(){
		$people = Person::all();
		$jsonfile = json_encode($people);
		// dd($jsonfile);
		$x = Person::all();
		foreach($x as $a){
			$a->total_manday = 0;
			$a->save();
		}
	}
}

?>