<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public static function findcurrentplud($today){
		$currentpludarray = PludDate::where('date','=',$today)->get();
		foreach($currentpludarray as $cpa){
			$currentplud = $cpa->plud;
		}
		return $currentplud;
	}

	public static function showhome()
	{
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
		$user_count = DB::table('oncamp')->where('date','=',$date)
						  ->join('person','oncamp.person_id','=','person.id')
						  ->count();
		$senior_count = DB::table('oncamp')->where('date','=',$date)
						  ->join('person','oncamp.person_id','=','person.id')
						  ->where('person.year','=',4)->count();
		$junior_count = DB::table('oncamp')->where('date','=',$date)
						  ->join('person','oncamp.person_id','=','person.id')
						  ->where('person.year','=',3)->count();
		$more_count = DB::table('oncamp')->where('date','=',$date)
						  ->join('person','oncamp.person_id','=','person.id')
						  ->where('person.year','=',2)->count();
		$freshy_count = DB::table('oncamp')->where('date','=',$date)
						  ->join('person','oncamp.person_id','=','person.id')
						  ->where('person.year','=',1)->count();

		return View::make('home/home')->with('day',$day)
									  ->with('weekday',$weekday[$tdate])
									  ->with('month',$month)
									  ->with('year',$year)
									  ->with('thmanday',$thmanday)
									  ->with('currentplud',$currentplud)
									  ->with('user_count',$user_count)
						   		      ->with('senior_count',$senior_count)
									  ->with('junior_count',$junior_count)
									  ->with('more_count',$more_count)
									  ->with('freshy_count',$freshy_count);
	}

}
