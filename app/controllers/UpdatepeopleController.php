<?php

class UpdatepeopleController extends BaseController {


	public static function findcurrentplud($today){
		$currentpludarray = PludDate::where('date','=',$today)->get();
		foreach($currentpludarray as $cpa){
			$currentplud = $cpa->plud;
		}
		return $currentplud;
	}

	public static function showhome(){
		return View::make('home/updatepeople');
	}

	public static function addpeople(){

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
		$thmanday = PludDate::where('date','=',$tddate)->first()->id;
		$weekday = Array('Monday'=>'จันทร์', 'Tuesday'=>'อังคาร', 'Wednesday'=>'พุธ',
						 'Thursday'=>'พฤหัสบดี', 'Friday'=>'ศุกร์', 'Saturday'=>'เสาร์',
						 'Sunday'=>'อาทิตย์');
		$tdate = date("l",strtotime($tddate));
		$latestdate = Time::select('date')->first()->date;
		$latesttime = Time::select('time')->first()->time;
		$currentplud = self::findcurrentplud($latestdate);


		$people = Person::select('citizen_id')->get();
		$citizenlist = array();
		foreach($people as $pp){
			array_push($citizenlist,$pp->citizen_id);
		}
		return View::make('home/addpeople')->with('citizenlist',$citizenlist)
										   ->with('day',$day)
										   ->with('weekday',$weekday[$tdate])
										   ->with('month',$month)
										   ->with('year',$year)
										   ->with('thmanday',$thmanday)
										   ->with('currentplud',$currentplud);;
	}

	public static function saveadded(){
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
		$thmanday = PludDate::where('date','=',$tddate)->first()->id;
		$weekday = Array('Monday'=>'จันทร์', 'Tuesday'=>'อังคาร', 'Wednesday'=>'พุธ',
						 'Thursday'=>'พฤหัสบดี', 'Friday'=>'ศุกร์', 'Saturday'=>'เสาร์',
						 'Sunday'=>'อาทิตย์');
		$tdate = date("l",strtotime($tddate));
		$latestdate = Time::select('date')->first()->date;
		$latesttime = Time::select('time')->first()->time;
		$currentplud = self::findcurrentplud($latestdate);


		$citizen_id = Input::get('citizen_id');
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$nickname = Input::get('nickname');
		$tyear = Input::get('year');
		$gender = Input::get('gender');
		$faculty = Input::get('faculty');
		$dep = Input::get('dep');
		$student_id = Input::get('student_id');
		$phone = Input::get('phone');
		$str_lvl = Input::get('str_lvl');
		$date_in = Input::get('date_in');
		$date_out = Input::get('date_out');

		for($i=0; $i<count($citizen_id); $i++){
			$person = new Person;
			$person->citizen_id = $citizen_id[$i];
			$person->first_name = $first_name[$i];
			$person->last_name = $last_name[$i];
			$person->nickname = $nickname[$i];
			$person->year = $tyear[$i];
			$person->gender = $gender[$i];
			$person->faculty = $faculty[$i];
			$person->dep = $dep[$i];
			$person->student_id = $student_id[$i];
			$person->phone = $phone[$i];
			$person->str_lvl = $str_lvl[$i];
			$person->total_manday = 0;
			$person->save();

	  		$id = Person::where('citizen_id','=',$citizen_id[$i])->first()->id;

			$manhis = new MandayHistory;
			$manhis->person_id = $id;
			$manhis->date_in = $date_in[$i];
			$manhis->date_out = $date_out[$i];
			$manhis->save();
		}

		return View::make('home/addpeople')->with('day',$day)
										   ->with('weekday',$weekday[$tdate])
										   ->with('month',$month)
										   ->with('year',$year)
										   ->with('thmanday',$thmanday)
										   ->with('currentplud',$currentplud);
	}

}

?>