<?php

class AllnameController extends BaseController {
	public static function sortbyyear(){
		$users = Person::orderBy('year','ASC')->get();
		$user_count = Person::all()->count();
		$female_count = Person::where('gender','=','F')->count();
		$male_count = Person::where('gender','=','M')->count();
		$senior_count = Person::where('year','=',4)->count();
		$junior_count = Person::where('year','=',3)->count();
		$more_count = Person::where('year','=',2)->count();
		$freshy_count = Person::where('year','=',1)->count();
		return View::make('home/allname')->with('users',$users)
										 ->with('user_count',$user_count)
										 ->with('male_count',$male_count)
										 ->with('female_count',$female_count)
										 ->with('senior_count',$senior_count)
										 ->with('junior_count',$junior_count)
										 ->with('more_count',$more_count)
										 ->with('freshy_count',$freshy_count);
	}

	public static function sortbyname(){
		$users = Person::orderBy('first_name','ASC')->get();
		$user_count = Person::all()->count();
		$female_count = Person::where('gender','=','F')->count();
		$male_count = Person::where('gender','=','M')->count();
		$senior_count = Person::where('year','=',4)->count();
		$junior_count = Person::where('year','=',3)->count();
		$more_count = Person::where('year','=',2)->count();
		$freshy_count = Person::where('year','=',1)->count();
		return View::make('home/allname')->with('users',$users)
										 ->with('user_count',$user_count)
										 ->with('male_count',$male_count)
										 ->with('female_count',$female_count)
										 ->with('senior_count',$senior_count)
										 ->with('junior_count',$junior_count)
										 ->with('more_count',$more_count)
										 ->with('freshy_count',$freshy_count);
	}

	public static function sortbynickname(){
		$users = Person::orderBy('nickname','ASC')->get();
		$user_count = Person::all()->count();
		$female_count = Person::where('gender','=','F')->count();
		$male_count = Person::where('gender','=','M')->count();
		$senior_count = Person::where('year','=',4)->count();
		$junior_count = Person::where('year','=',3)->count();
		$more_count = Person::where('year','=',2)->count();
		$freshy_count = Person::where('year','=',1)->count();
		return View::make('home/allname')->with('users',$users)
										 ->with('user_count',$user_count)
										 ->with('male_count',$male_count)
										 ->with('female_count',$female_count)
										 ->with('senior_count',$senior_count)
										 ->with('junior_count',$junior_count)
										 ->with('more_count',$more_count)
										 ->with('freshy_count',$freshy_count);
	}

}

?>