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

	public static function clearlastpploncamp($today, $date, $time){
		OnCamp::where('date','=',$date)->delete();
	}

	public static function calculatepploncamp($today, $date, $time){
		$people_list = DB::table('oncamp')->where('date','=',$today)
						->join('person','person.id','=','oncamp.person_id')
						->get();
		$incoming_people = MandayHistory::where('date_in','=',$date)->get();
		$outgoing_people = MandayHistory::where('date_out','=',$today)->get();
		foreach($people_list as $pl){
			$okay = 1;
			foreach($outgoing_people as $op){
				if($pl->id == $op->id){
					$okay = 0;
				}
			}
			if($okay == 1){
				$oncamp = new OnCamp;
				$oncamp->date = $date;
				$oncamp->person_id = $pl->person_id;
				$oncamp->save();
			}
		}
		foreach($incoming_people as $ip){
			$oncamp = new OnCamp;
			$oncamp->date = $date;
			$oncamp->person_id = $ip->person_id;
			$oncamp->save();
		}
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
		$currentplud = self::findcurrentplud($latestdate);

		return View::make('home/jobmgt')->with('day',$day)
										->with('weekday',$weekday[$tdate])
										->with('month',$month)
										->with('year',$year)
										->with('thmanday',$thmanday)
										->with('today',$today)
										->with('tomorrow',$tomorrow)
										->with('latestdate',$latestdate)
										->with('latesttime',$latesttime)
										->with('currentplud',$currentplud);
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
		$latestdate = Time::select('date')->first()->date;
		$latesttime = Time::select('time')->first()->time;
		$currentplud = self::findcurrentplud($latestdate);


		if($timerecord->date > $today){
			Self::clearlastpploncamp($today, $timerecord->date, $timerecord->time);
			Self::calculatepploncamp($today, $timerecord->date, $timerecord->time);
		}

		else if($timerecord->date == PludDate::first()->date){
			$affected = OnCamp::where('date','=',PludDate::first()->date)->delete();
			$incoming_list = MandayHistory::where('date_in','=',$timerecord->date)->get();
			foreach($incoming_list as $il){
				$oncamp = new OnCamp;
				$oncamp->date = $timerecord->date;
				$oncamp->person_id = $il->person_id;
				$oncamp->save();
			}
		}

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
										   ->with('currentplud',$currentplud)
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
		$latestdate = Time::select('date')->first()->date;
		$latesttime = Time::select('time')->first()->time;
		$currentplud = self::findcurrentplud($latestdate);

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
											  ->with('currentplud',$currentplud)
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
		if(!empty($nonsenior_namelist)){
			foreach($nonsenior_namelist as $nsn){
				$person = explode('.',$nsn);
				array_push($nonseniors[$person[1]],Person::find($person[0]));
			}
		}


		$girlleft[] = array();
		$menleft[] = array();
		for($i=0; $i<count($job); $i++){
			$girlleft[$i] = 0;
			$girlused = 0;
			$menused = 0;
			for($j=0; $j<count($nonseniors[$i]); $j++){
				if($nonseniors[$i][$j]->gender == 'F'){
					$girlused++;
				}
				else if($nonseniors[$i][$j]->gender == 'M'){
					$menused++;
				}
			}
			$girlleft[$i] = $female[$i] - $girlused;
			$menleft[$i] = $user[$i] - $female[$i] - $menused - count($seniors[$i]);
		}

		$men_index = -1;
		$girl_index = -1;
		$menfitness = 0;
		$girlfitness = 0;

		$today = Time::first()->date;
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
		$currentplud = self::findcurrentplud($latestdate);

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

		//RANDOM GIRL


		$tmpnonseniors_girl = array();
		for($k=0;$k<3;$k++){
			$tmpnonseniors_girl[$k] = array();
			for($i=0;$i<count($job);$i++){
				$tmpnonseniors_girl[$k][$i] = array();
			}
		}
		$tmpgirls = array();
		for($i=0;$i<3;$i++){
			$tmpgirls[$i]=array();
			$tmpgirls[$i]=$girls;
		}

		$fitness = array();
		for($k=0; $k<3; $k++){
			$total_fvalue = 0;
			$divider = 0;
			$x = 0;
			for($i=0; $i<count($job); $i++){
				for($h=0; $h<$girlleft[$i]; $h++){
					$max_x = 0;
					$max_f = 0;
					for($j=0; $j<3; $j++){
						$x = rand(0,count($tmpgirls[$k])-1);
						$fvalue = Self::getfitnessvalue($tmpgirls[$k][$x], $job[$i], $timerecord->date);
						if($fvalue > $max_f){
							$max_f = $fvalue;
							$max_x = $x;
						}
					}
					$total_fvalue += $max_f;
					$divider++;
					array_push($tmpnonseniors_girl[$k][$i],$tmpgirls[$k][$max_x]);
					array_splice($tmpgirls[$k], $max_x, 1);
				}
			}
			if($divider > 0) $fitness[$k] = $total_fvalue / $divider;
		}	
		if(count($fitness)>0){
			$maxfitness = max($fitness);
			$girlfitness = $maxfitness;
				for($k=0; $k<3; $k++){
					if($fitness[$k] == $maxfitness){
						$girl_index = $k;
						break;
					}
				}
		}


		//RANDOM MEN

		$mens = array();
		$men_list = DB::table('oncamp')->where('date','=',$timerecord->date)
					->join('person','oncamp.person_id','=','person.id')
					->where('person.gender','=','M')
					->where('person.year','!=',4)
					->get();

		foreach($men_list as $ml){
			$check = 0;
			foreach($nonseniors as $nss){
				foreach($nss as $ns){
					if($ns->id == $ml->id){
						$check = 1;
					}
				}
			}
			if($check==0){
				array_push($mens,$ml);
			}
		}

		$tmpnonseniors_men = array();
		for($k=0;$k<3;$k++){
			$tmpnonseniors_men[$k] = array();
			for($i=0;$i<count($job);$i++){
				$tmpnonseniors_men[$k][$i] = array();
			}
		}
		$tmpmens = array();
		for($i=0;$i<3;$i++){
			$tmpmens[$i]=array();
			$tmpmens[$i]=$mens;
		}

		$fitness = array();
		for($k=0; $k<3; $k++){
			$total_fvalue = 0;
			$divider = 0;
			$x = 0;
			for($i=0; $i<count($job); $i++){
				for($h=0; $h<$menleft[$i]; $h++){
					$max_x = 0;
					$max_f = 0;
					for($j=0; $j<3; $j++){
						$x = rand(0,count($tmpmens[$k])-1);
						$fvalue = Self::getfitnessvalue($tmpmens[$k][$x], $job[$i], $timerecord->date);
						if($fvalue > $max_f){
							$max_f = $fvalue;
							$max_x = $x;
						}
					}
					$total_fvalue += $max_f;
					$divider++;
					array_push($tmpnonseniors_men[$k][$i],$tmpmens[$k][$max_x]);					array_splice($tmpmens[$k], $max_x, 1);
				}
			}
			if($divider > 0) $fitness[$k] = $total_fvalue / $divider;
		}	

		if(count($fitness)>0){
			$maxfitness = max($fitness);
			$menfitness = $maxfitness;
			for($k=0; $k<3; $k++){
				if($fitness[$k] == $maxfitness){
					$men_index = $k;	
					break;
				}
			}
		}

		for($i=0; $i<count($job); $i++){
			if(count($girls) > 0){
				for($g=0; $g<count($tmpnonseniors_girl[$girl_index][$i]); $g++){
					array_push($nonseniors[$i],$tmpnonseniors_girl[$girl_index][$i][$g]);
				}
			}
			if(count($mens) > 0){
				for($m=0; $m<count($tmpnonseniors_men[$men_index][$i]); $m++){
					array_push($nonseniors[$i],$tmpnonseniors_men[$men_index][$i][$m]);
				}
			}
		}

		for($i=0; $i<count($job); $i++){
			usort($nonseniors[$i], function($a, $b)
			{
			    return strcmp($a->year, $b->year) * -1;
			});
		}	

		return View::make('home/jobmgtrandom')->with('day',$day)
										   	  ->with('weekday',$weekday[$tdate])
										      ->with('month',$month)
										      ->with('year',$year)
										      ->with('thmanday',$thmanday)
											  ->with('currentplud',$currentplud)
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

	public static function savedata(){
		$s_user = Input::get('user');
		$s_job = Input::get('job');
		$s_female = Input::get('female');
		$s_seniors = Input::get('seniors');
		$s_nonseniors = Input::get('nonseniors');
		$s_jobhis = Input::get('jobhis');
		$s_timerecord = Input::get('timerecord');

		$user = json_decode($s_user);
		$job = json_decode($s_job);
		$timerecord = json_decode($s_timerecord);
		// $jobhis = json_decode($s_jobhis);
		$seniors = json_decode($s_seniors);
		$nonseniors = json_decode($s_nonseniors);


		$currentrecord = Time::first();
		$lastdate = $currentrecord->date;
		$lasttime = $currentrecord->time;
		$date = $timerecord->date;
		$time = $timerecord->time;
		if($date == $lastdate and $time == 'OT' and $lasttime == 'morning'){
			$jobhis = JobHistory::where('date','=',$date)->get();
			foreach($jobhis as $mh){
				$mh->time = "day";
				$mh->save();
			}
		}
		elseif($date != $lastdate and $lasttime == 'morning'){
			$jobhis = JobHistory::where('date','=',$lastdate)->get();
			foreach($jobhis as $mh){
				$mh->time = "day";
				$mh->save();
			}
		}
		
		if($date != $lastdate){
			for($i=0; $i<count($job); $i++){
				foreach($seniors[$i] as $s){
					$person = Person::find($seniors[$i]->id);
					$person->total_manday += 1;
					$person->save();
				}
				foreach($nonseniors[$i] as $s){
					$person = Person::find($nonseniors[$i]->id);
					$person->total_manday += 1;
					$person->save();
				}
			}
		}

		$currentrecord->date = $timerecord->date;
		$currentrecord->time = $timerecord->time;
		$currentrecord->save();


		for($i=0; $i<count($job); $i++){
			foreach($seniors[$i] as $s){
				$record = new JobHistory;
				$record->person_id = $s->id;
				$record->date = $timerecord->date;
				$record->time = $timerecord->time;
				$record->work_id = Work::where('work_name','=',$job[$i])->first()->id;
				$record->work_name = $job[$i];
				$record->save();
			}
			foreach($nonseniors[$i] as $s){
				$record = new JobHistory;
				$record->person_id = $s->id;
				$record->date = $timerecord->date;
				$record->time = $timerecord->time;
				$record->work_id = Work::where('work_name','=',$job[$i])->first()->id;
				$record->work_name = $job[$i];
				$record->save();
			}
		}

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
		$currentplud = self::findcurrentplud($latestdate);

		return View::make('home/jobmgtdone')->with('day',$day)
										   	  ->with('weekday',$weekday[$tdate])
										      ->with('month',$month)
										      ->with('year',$year)
										      ->with('thmanday',$thmanday)
											  ->with('currentplud',$currentplud)
										      ->with('today',$today)
									   	      ->with('tomorrow',$tomorrow);
	}

}

?>