<?php

class UpdatepeopleController extends BaseController {

	public static function showhome(){
		return View::make('home/updatepeople');
	}

	public static function addpeople(){
		$people = Person::select('citizen_id')->get();
		$citizenlist = array();
		foreach($people as $pp){
			array_push($citizenlist,$pp->citizen_id);
		}
		return View::make('home/addpeople')->with('citizenlist',$citizenlist);
	}

	public static function saveadded(){
		$citizen_id = Input::get('citizen_id');
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$nickname = Input::get('nickname');
		$year = Input::get('year');
		$gender = Input::get('gender');
		$faculty = Input::get('faculty');
		$dep = Input::get('dep');
		$student_id = Input::get('student_id');
		$phone = Input::get('phone');
		$birthday = Input::get('birthday');
		$str_lvl = Input::get('str_lvl');
		$date_in = Input::get('date_in');
		$date_out = Input::get('date_out');

		$person = new Person;
		$person->citizen_id = $citizen_id;
		$person->first_name = $first_name;
		$person->last_name = $last_name;
		$person->nickname = $nickname;
		$person->year = $year;
		$person->gender = $gender;
		$person->faculty = $faculty;
		$person->dep = $dep;
		$person->student_id = $student_id;
		$person->phone = $phone;
		$person->birthday = $birthday;
		$person->str_lvl = $str_lvl;
		$person->save();

  		$id = Person::where('citizen_id','=',$citizen_id)->first()->id;

		$manhis = new MandayHistory;
		$manhis->person_id = $id;
		$manhis->date_in = $date_in;
		$manhis->date_out = $date_out;
		$manhis->save();

		return View::make('home/addpeople');
	}

}

?>