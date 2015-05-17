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

	public static function getfitnessvalue($person,$workname,$date){
		$fvalue = 0;
		$work = Work::where('work_name','=',$workname)->first();
		if($person->gender = 'F' and $work->work_lvl > $person->str_lvl){
			$char_value = 0.85;
		}
		else $char_value = 1;
		$jobhis = JobHistory::where('person_id','=',$person->id)
				->where('date','<',$date)
				->orderBy('date','DSC')->get();
		$count = -1;
		$lastdate = $date;
		$repeatcount = 0;
		foreach($jobhis as $jh){
			if($count == 5) break;
			if($jh->date != $lastdate){
				$count++;
				$lastdate = $date;
			}
			if($jh->time == 'day' or $jh->time == 'morning'){
				if($jh->work_id == $work->id){
					$repeatcount++;
				}
			}
		}
		if($repeatcount == 0){ $history_value = 1.0; }
		elseif($repeatcount == 1){ $history_value = 0.8; }
		elseif($repeatcount == 2){ $history_value = 0.5; }
		elseif($repeatcount == 3){ $history_value = 0.1; }
		else{ $history_value = 0.02; }

		$fvalue = $char_value * $history_value;
		return $fvalue;
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
					  ->where('person.gender','=','F')
					  ->where('person.year','!=',4)->count();

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
					->select('person.id','person.nickname','person.year','person.gender')
					->get();
		$senior = DB::table('oncamp')->where('date','=',$timerecord->date)
					->join('person','oncamp.person_id','=','person.id')
					->where('person.year','=',4)
					->select('person.id','person.nickname','person.year','person.gender')
					->get();
		$nonsenior = DB::table('oncamp')->where('date','=',$timerecord->date)
					->join('person','oncamp.person_id','=','person.id')
					->where('person.year','!=',4)
					->select('person.id','person.nickname','person.year','person.gender')
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


	public static function workrandom(){
		$s_user = Input::get('user');
		$s_job = Input::get('job');
		$s_female = Input::get('female');
		$user = json_decode($s_user);
		$job = json_decode($s_job);
		$female = json_decode($s_female);

		$s_jobhis = Input::get('jobhis');
		$s_timerecord = Input::get('timerecord');
		$timerecord = json_decode($s_timerecord);
		$jobhis = json_decode($s_jobhis);

		$senior_namelist = Input::get('senior_namelist');
		$nonsenior_namelist = Input::get('nonsenior_namelist');

		$seniors[] = array();
		for($i=0;$i<count($job);$i++){
			$seniors[$i] = array();
		}
		foreach($senior_namelist as $sn){
			$person = explode('.',$sn);
			array_push($seniors[$person[1]],Person::find($person[0]));
		}

		$nonseniors[] = array();
		for($i=0;$i<count($job);$i++){
			$nonseniors[$i] = array();
		}
		foreach($nonsenior_namelist as $nsn){
			$person = explode('.',$nsn);
			array_push($nonseniors[$person[1]],Person::find($person[0]));
		}
		$girlleft[] = array();

		for($i=0; $i<count($job); $i++){
			$girlleft[$i] = 0;
			for($j=0; $j<count($nonseniors[$i]); $j++){
				if($nonseniors[$i][$j]->gender == 'F'){
					$girlleft[$i]++;
				}
			}
		}

		// for($i=0;$i<count($job);$i++){
		// 	echo $job[$i]. "+".count($seniors[$i]);;
		// 	for($j=0;$j<count($seniors[$i]);$j++){
		// 		echo $seniors[$i][$j]->nickname." ";
		// 	}
		// 	for($j=0;$j<count($nonseniors[$i]);$j++){
		// 		echo $nonseniors[$i][$j]->nickname." ";
		// 	}
		// 	echo "/////";
		// }

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

		$girls = array();
		$girl_list = DB::table('oncamp')->where('date','=',$timerecord->date)
					->join('person','oncamp.person_id','=','person.id')
					->where('person.gender','=','F')
					->where('person.year','!=',4)
					->get();

		foreach($girl_list as $gl){
			$check = 0;
			foreach($nonseniors as $nss){
				foreach($nss as $ns){
					if($ns->id == $gl->id){
						$check = 1;
					}
				}
			}
			if($check==0){
				array_push($girls,$gl);
			}
		}

		$tmpnonseniors[] = array();
		for($i=0;$i<count($job);$i++){
			$tmpnonseniors[$i] = array();
		}

		for($i=0; $i<count($job); $i++){
			if($girlleft[$i] > 0){
				$x = rand(0,count($girls)-1);
				$fit = Self::getfitnessvalue($girls[$x],$job[$i],$timerecord->date);
				// echo $x."===".$girls[$x]->nickname."====".$fit;
				array_push($tmpnonseniors[$i],$girls[$x]);
				unset($girls[$x]);
				array_values($girls);
			}
		}

		return View::make('home/jobmgtrandom')->with('day',$day)
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
											  ->with('timerecord',$timerecord)
										      ->with('seniors',$seniors)
										      ->with('nonseniors',$nonseniors);

		
	}

}

?>