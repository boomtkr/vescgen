<?php

class AllnameController extends BaseController {


	public static function findcurrentplud($today){
		$currentpludarray = PludDate::where('date','=',$today)->get();
		foreach($currentpludarray as $cpa){
			$currentplud = $cpa->plud;
		}
		return $currentplud;
	}
	
	public static function sortbyyear(){
		$date = Time::select('date')->first()->date;
		$exdate = explode("-", $date);
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
		$currentplud = self::findcurrentplud($latestdate);
		$users = Person::orderBy('year','ASC')->get();
		$user_count = Person::all()->count();
		$female_count = Person::where('gender','=','F')->count();
		$male_count = Person::where('gender','=','M')->count();
		$senior_count = Person::where('year','=',4)->count();
		$junior_count = Person::where('year','=',3)->count();
		$more_count = Person::where('year','=',2)->count();
		$freshy_count = Person::where('year','=',1)->count();
		return View::make('home/allname')->with('day',$day)
										 ->with('weekday',$weekday[$tdate])
										 ->with('month',$month)
										 ->with('year',$year)
										 ->with('thmanday',$thmanday)
										 ->with('users',$users)
										 ->with('currentplud',$currentplud)
										 ->with('user_count',$user_count)
										 ->with('male_count',$male_count)
										 ->with('female_count',$female_count)
										 ->with('senior_count',$senior_count)
										 ->with('junior_count',$junior_count)
										 ->with('more_count',$more_count)
										 ->with('freshy_count',$freshy_count);
	}

	public static function sortbyname(){
		$date = Time::select('date')->first()->date;
		$exdate = explode("-", $date);
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
		$currentplud = self::findcurrentplud($latestdate);
		$users = Person::orderBy('first_name','ASC')->get();
		$user_count = Person::all()->count();
		$female_count = Person::where('gender','=','F')->count();
		$male_count = Person::where('gender','=','M')->count();
		$senior_count = Person::where('year','=',4)->count();
		$junior_count = Person::where('year','=',3)->count();
		$more_count = Person::where('year','=',2)->count();
		$freshy_count = Person::where('year','=',1)->count();
		return View::make('home/allname')->with('day',$day)
										 ->with('weekday',$weekday[$tdate])
										 ->with('month',$month)
										 ->with('year',$year)
										 ->with('thmanday',$thmanday)
										 ->with('users',$users)
										 ->with('currentplud',$currentplud)
										 ->with('user_count',$user_count)
										 ->with('male_count',$male_count)
										 ->with('female_count',$female_count)
										 ->with('senior_count',$senior_count)
										 ->with('junior_count',$junior_count)
										 ->with('more_count',$more_count)
										 ->with('freshy_count',$freshy_count);
	}

	public static function sortbynickname(){
		$date = Time::select('date')->first()->date;
		$exdate = explode("-", $date);
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
		$currentplud = self::findcurrentplud($latestdate);
		$users = Person::orderBy('nickname','ASC')->get();
		$user_count = Person::all()->count();
		$female_count = Person::where('gender','=','F')->count();
		$male_count = Person::where('gender','=','M')->count();
		$senior_count = Person::where('year','=',4)->count();
		$junior_count = Person::where('year','=',3)->count();
		$more_count = Person::where('year','=',2)->count();
		$freshy_count = Person::where('year','=',1)->count();
		return View::make('home/allname')->with('day',$day)
								  		 ->with('weekday',$weekday[$tdate])
										 ->with('month',$month)
										 ->with('year',$year)
										 ->with('thmanday',$thmanday)
										 ->with('users',$users)
										 ->with('currentplud',$currentplud)
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