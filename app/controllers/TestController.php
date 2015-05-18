<?php

class TestController extends BaseController {
	public static function exportjson(){
		$people = Person::all();
		$jsonfile = json_encode($people);
		// dd($jsonfile);
		$x = Person::find(1);
		echo "<pre>";
		dd($x);
		echo "</pre>";
	}
}

?>