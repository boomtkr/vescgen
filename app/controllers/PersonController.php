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
		$tddate = Time::select('date')->first()->date;
		$exdate = explode("-", $tddate);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$m = (int)$exdate[1];
		if($m==1){ $month = "มกราคม"; }
		if($m==2){ $month = "กุมภาพันธ์"; }
		if($m==3){ $month = "มีนาคม"; }
		if($m==4){ $month = "เมษายน"; }
		if($m==5){ $month = "พฤษภาคม"; }
		if($m==6){ $month = "มิถุนายน"; }
		if($m==7){ $month = "กรกฏาคม"; }
		if($m==8){ $month = "สิงหาคม"; }
		if($m==9){ $month = "กันยายน"; }
		if($m==10){ $month = "ตุลาคม"; }
		if($m==11){ $month = "พฤศจิกายน"; }
		if($m==12){ $month = "ธันวาคม"; }
		$thmanday = PludDate::where('date','=',$date)->first()->id;
		$weekday = Array('Monday'=>'จันทร์', 'Tuesday'=>'อังคาร', 'Wednesday'=>'พุธ',
						 'Thursday'=>'พฤหัสบดี', 'Friday'=>'ศุกร์', 'Saturday'=>'เสาร์',
						 'Sunday'=>'อาทิตย์');
		$tdate = date("l",strtotime($date));
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

		return View::make('home/person')->with('day',$day)
										->with('weekday',$weekday[$tdate])
										->with('month',$month)
										->with('year',$year)
										->with('thmanday',$thmanday)
										->with('person',$person)
										->with('datehistory',$datehistory)
										->with('timehistory',$timehistory)
										->with('jobhistory',$jobhistory);
	}


}
?>