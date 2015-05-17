<?php

class JobmgtController extends BaseController {

	public static function getmonthname($m){
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
		return $month;
	}

	public static function findcurrentplud($today){
		$currentpludarray = PludDate::where('date','=',$today)->get();
		foreach($currentpludarray as $cpa){
			$currentplud = $cpa->plud;
		}
		return $currentplud;
	}

	public static function jobmgt(){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
		$thmanday = PludDate::where('date','=',$date)->first()->id;
		$weekday = Array('Monday'=>'จันทร์', 'Tuesday'=>'อังคาร', 'Wednesday'=>'พุธ',
						 'Thursday'=>'พฤหัสบดี', 'Friday'=>'ศุกร์', 'Saturday'=>'เสาร์',
						 'Sunday'=>'อาทิตย์');
		$tdate = date("l",strtotime($date));

		$latestdate = Time::select('date')->first()->date;
		$latesttime = Time::select('time')->first()->time;
		$plud = self::findcurrentplud($latestdate);

		return View::make('home/jobmgt')->with('day',$day)
										->with('weekday',$weekday[$tdate])
										->with('month',$month)
										->with('year',$year)
										->with('thmanday',$thmanday)
										->with('today',$today)
										->with('tomorrow',$tomorrow)
										->with('latestdate',$latestdate)
										->with('latesttime',$latesttime)
										->with('plud',$plud);
	}

	public static function datechosen(){
		$date = Input::get('date');
		$time = Input::get('time');
		$currentrecord = Time::first();
		$lastdate = $currentrecord->date;
		$lasttime = $currentrecord->time;
		if($date == $lastdate and $time == 'OT' and $lasttime == 'morning'){
			$jobhis = JobHistory::where('date','=',$date)->get();
			foreach($jobhis as $mh){
				$mh->time = "day";
				// $mh->save();
			}
		}
		elseif($date != $lastdate and $lasttime == 'morning'){
			$jobhis = JobHistory::where('date','=',$lastdate)->get();
			foreach($jobhis as $mh){
				$mh->time = "day";
				// $mh->save();
			}
		}
		else {
			$jobhis = JobHistory::where('date','=',$date)->get();
		}
		$timerecord = new Time;
		$timerecord->date = $date;
		$timerecord->time = $time;
		// $timerecord->save();

		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
		$thmanday = PludDate::where('date','=',$date)->first()->id;
		$weekday = Array('Monday'=>'จันทร์', 'Tuesday'=>'อังคาร', 'Wednesday'=>'พุธ',
						 'Thursday'=>'พฤหัสบดี', 'Friday'=>'ศุกร์', 'Saturday'=>'เสาร์',
						 'Sunday'=>'อาทิตย์');
		$tdate = date("l",strtotime($date));

		$worklist = Work::all();

		$user_count = DB::table('oncamp')->where('date','=',$timerecord->date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->count();
		$female_count = DB::table('oncamp')->where('date','=',$timerecord->date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')->count();

		return View::make('home/jobmgtjob')->with('day',$day)
										   ->with('weekday',$weekday[$tdate])
										   ->with('month',$month)
										   ->with('year',$year)
										   ->with('thmanday',$thmanday)
										   ->with('today',$today)
									   	   ->with('tomorrow',$tomorrow)
										   ->with('jobhis',$jobhis)
										   ->with('timerecord',$timerecord)
										   ->with('user_count',$user_count)
										   ->with('female_count',$female_count)
										   ->with('worklist',$worklist);
	}

	public static function workcreated() {
		$user = Input::get('user');
		$job = Input::get('job');
		$female = Input::get('female');
		$s_jobhis = Input::get('jobhis');
		$s_timerecord = Input::get('timerecord');
		$timerecord = json_decode($s_timerecord);
		$jobhis = json_decode($s_jobhis);

		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
		$thmanday = PludDate::where('date','=',$date)->first()->id;
		$weekday = Array('Monday'=>'จันทร์', 'Tuesday'=>'อังคาร', 'Wednesday'=>'พุธ',
						 'Thursday'=>'พฤหัสบดี', 'Friday'=>'ศุกร์', 'Saturday'=>'เสาร์',
						 'Sunday'=>'อาทิตย์');
		$tdate = date("l",strtotime($date));

		$user_count = DB::table('oncamp')->where('date','=',$timerecord->date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->count();
		$senior_count = DB::table('oncamp')->where('date','=',$timerecord->date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',4)->count();
		$female_count = DB::table('oncamp')->where('date','=',$timerecord->date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')->count();

		$people = DB::table('oncamp')->where('date','=',$timerecord->date)
					->join('person','oncamp.person_id','=','person.id')
					->select('person.id','person.nickname','person.year')
					->get();
		$senior = DB::table('oncamp')->where('date','=',$timerecord->date)
					->join('person','oncamp.person_id','=','person.id')
					->where('person.year','=',4)
					->select('person.id','person.nickname','person.year')
					->get();
		$nonsenior = DB::table('oncamp')->where('date','=',$timerecord->date)
					->join('person','oncamp.person_id','=','person.id')
					->where('person.year','!=',4)
					->select('person.id','person.nickname','person.year')
					->get();
		return View::make('home/jobmgtpeople')->with('day',$day)
										   	  ->with('weekday',$weekday[$tdate])
										      ->with('month',$month)
										      ->with('year',$year)
										      ->with('thmanday',$thmanday)
										      ->with('today',$today)
									   	      ->with('tomorrow',$tomorrow)
									   	      ->with('user',$user)
											  ->with('job',$job)
											  ->with('female',$female)
											  ->with('jobhis',$jobhis)
											  ->with('people',$people)
											  ->with('senior',$senior)
											  ->with('nonsenior',$nonsenior)
											  ->with('timerecord',$timerecord)
										      ->with('user_count',$user_count)
										      ->with('senior_count',$senior_count)
										      ->with('female_count',$female_count);
	}

	// public static function workrandom(){
	// 	$timerecord
	// 	$jobhis 
	// 	$job
	// 	$usrperjob
	// 	$people

		
	// }

}

?>