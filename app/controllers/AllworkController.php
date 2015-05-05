<?php

class AllworkController extends BaseController {

	public static function allwork(){
		$works = Work::all();
		return View::make('home/allwork')->with('works',$works);
	}

}

?>