<?php

class TestController extends BaseController {
	public static function exportjson(){
		$people = Person::all();
		$jsonfile = json_encode($people);
		// dd($jsonfile);
		$myfile = fopen('/Applications/XAMPP/xamppfiles/htdocs/VESCgen/app/controllers/testfile.txt 
', "w") or die("Unable to open file!");
		// fwrite($myfile, $jsonfile);
		fwrite($myfile, 'ok');
		fclose($myfile);
		echo " DONE";
	}
}

?>