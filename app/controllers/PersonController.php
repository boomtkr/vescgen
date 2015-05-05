<?php
class PersonController extends BaseController {


	public static function updatedetails($id){
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$nickname = Input::get('nickname');
		$faculty = Input::get('faculty');
		$dep = Input::get('dep');
		$year = Input::get('year');
		$gender = Input::get('gender');
		$student_id = Input::get('student_id');
		$citizen_id = Input::get('citizen_id');
		$phone = Input::get('phone');
		$str_lvl = Input::get('str_lvl');
		$birthday = Input::get('birthday');

		$person = Person::find($id);
		if($person->first_name != $first_name){
			$person->first_name = $first_name;
		}
		if($person->last_name != $last_name){
			$person->last_name = $last_name;
		}
		if($person->nickname != $nickname){
			$person->nickname = $nickname;
		}
		if($person->faculty != $faculty){
			$person->faculty = $faculty;
		}
		if($person->dep != $dep){
			$person->dep = $dep;		
		}
		if($person->year != $year){
			$person->year = $year;
		}
		if($person->gender != $gender){
			$person->gender = $gender;
		}
		if($person->student_id != $student_id){
			$person->student_id = $student_id;
		}
		if($person->citizen_id != $citizen_id){
			$person->citizen_id = $citizen_id;
		}
		if($person->birthday != $birthday){
			$person->birthday = $birthday;
		}
		if($person->phone != $phone){
			$person->phone = $phone;
		}
		if($person->str_lvl != $str_lvl){
			$person->str_lvl = $str_lvl;
		}
		$person->save();
		return Redirect::back()->with('person',$person);
	}

	public static function persondetails($id){
		$latestdate = Time::select('date')->first()->date;
		$latesttime = Time::select('time')->first()->time;
		$person = Person::where('id','=',$id)->first();
		$datehistory = array();
		$timehistory = array();
		$jobhistory = array();
		$nextdate = $latestdate;
		for($i=0; $i<5; $i++){
			$date = str_replace('-', '/', $nextdate);
			$nextdate = date('Y-m-d',strtotime($date . "-".$i." days"));
			$joblistthatdate = JobHistory::where('date','=',$nextdate)->where('person_id','=',$id)->get();
			foreach($joblistthatdate as $jltd){
				$jobname = Work::where('id','=',$jltd->work_id)->first()->work_name;
				array_push($datehistory,$nextdate);
				array_push($timehistory,$jltd->time);
				array_push($jobhistory,$jobname);
			}
		}

		return View::make('home/person')->with('person',$person)
										->with('datehistory',$datehistory)
										->with('timehistory',$timehistory)
										->with('jobhistory',$jobhistory);
	}


}
?>