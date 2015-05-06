<?php

class DailyjobController extends BaseController {

	public static function findcurrentplud($today){
		$currentpludarray = PludDate::where('date','=',$today)->get();
		foreach($currentpludarray as $cpa){
			$currentplud = $cpa->plud;
		}
		return $currentplud;
	}

	public static function countdatelist($currentplud,$today){
		$datelistarray = PludDate::select('date')->where('plud','=',$currentplud)->where('date','<=',$today)->get();
		$datelist = array();
		foreach($datelistarray as $dla){
			array_push($datelist,$dla->date);
		}
		return $datelist;
	}

	public static function firstdateofplud($thisplud){
		$fdate = PludDate::select('date')->where('plud','=',$thisplud)->first();
		return $fdate->date;
	}

	public static function getworklist($date){
		$works = DB::table('job_history')->select('work_id','work.work_name')
				->where('date','=',$date)
				->join('work','work.id','=','job_history.work_id')
				->distinct()
				->orderBy('work.id')
				->get();
		return $works;
	}

	public static function getpeopleonwork($works, $date, $time){
		$i = 0;
		$peopleonwork = array();
		foreach($works as $work){
			$peopleonwork[$i] = DB::table('job_history')->where('date','=',$date)
							->join('person','person.id','=','job_history.person_id')
							->join('work','work.id','=','job_history.work_id')
							->where('job_history.work_id','=',$work->work_id)
							->where('job_history.time','=',$time)
							->select('work.id','work.work_name','person.nickname','person.year','person.id')
							->orderBy('person.year','DSC')
							->get();
			$i++;
		}
		return $peopleonwork;
	}

	public static function timeondate($date){
		$times = DB::table('job_history')->where('date','=',$date)
				->select('time')
				->distinct()
				->get();
		$timelist = array();
		foreach($times as $t){
			array_push($timelist,$t->time);
		}
		return $timelist;
	}

	public static function dailyjob(){
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
		$today = Time::select('date')->first()->date;
		$currentplud = self::findcurrentplud($today);
		$date = $today;
		$plud = $currentplud;
		$time = "morning";
		$datelist = self::countdatelist($currentplud,$today);
		$works = self::getworklist($date);
		$pplonwork = self::getpeopleonwork($works, $date, $time);
		$timelist = self::timeondate($date);
		$user_count = DB::table('job_history')->where('date','=',$date)
					  ->where('time','=',$time)->count();
		return View::make('home/dailyjob')->with('day',$day)
										  ->with('weekday',$weekday[$tdate])
										  ->with('month',$month)
										  ->with('year',$year)
										  ->with('thmanday',$thmanday)
										  ->with('datelist',$datelist)
										  ->with('timelist',$timelist)
										  ->with('currentplud',$currentplud)
										  ->with('works',$works)
										  ->with('pplonwork',$pplonwork)
										  ->with('plud',$plud)
										  ->with('date',$date)
										  ->with('time',$time)
										  ->with('user_count',$user_count);
	}

	public static function dailyjobp($plud){
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
		$today = Time::select('date')->first()->date;
		$currentplud = self::findcurrentplud($today);
		$date = self::firstdateofplud($plud);
		$plud = $plud;
		$time = "morning";
		$datelist = self::countdatelist($plud,$today);
		$works = self::getworklist($date);
		$pplonwork = self::getpeopleonwork($works, $date, $time);
		$timelist = self::timeondate($date);
		$user_count = DB::table('job_history')->where('date','=',$date)
					  ->where('time','=',$time)->count();
		return View::make('home/dailyjob')->with('day',$day)
										  ->with('weekday',$weekday[$tdate])
										  ->with('month',$month)
										  ->with('year',$year)
										  ->with('thmanday',$thmanday)
										  ->with('datelist',$datelist)
										  ->with('timelist',$timelist)
										  ->with('currentplud',$currentplud)
										  ->with('works',$works)
										  ->with('pplonwork',$pplonwork)
										  ->with('plud',$plud)
										  ->with('date',$date)
										  ->with('time',$time)
										  ->with('user_count',$user_count);

	}

	public static function dailyjobpd($plud, $date){
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
		$today = Time::select('date')->first()->date;
		$currentplud = self::findcurrentplud($today);
		$date = $date;
		$plud = $plud;
		$time = "morning";
		$datelist = self::countdatelist($plud,$today);
		$works = self::getworklist($date);
		$pplonwork = self::getpeopleonwork($works, $date, $time);
		$timelist = self::timeondate($date);
		$user_count = DB::table('job_history')->where('date','=',$date)
					  ->where('time','=',$time)->count();
		return View::make('home/dailyjob')->with('day',$day)
										  ->with('weekday',$weekday[$tdate])
										  ->with('month',$month)
										  ->with('year',$year)
										  ->with('thmanday',$thmanday)
										  ->with('datelist',$datelist)
										  ->with('timelist',$timelist)
										  ->with('currentplud',$currentplud)
										  ->with('works',$works)
										  ->with('pplonwork',$pplonwork)
										  ->with('plud',$plud)
										  ->with('date',$date)
										  ->with('time',$time)
										  ->with('user_count',$user_count);

	}

		public static function dailyjobpdt($plud, $date, $time){
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
		$tdate = date("l",strtotime($tddate));
		$today = Time::select('date')->first()->date;
		$currentplud = self::findcurrentplud($today);
		$date = $date;
		$plud = $plud;
		$time = $time;
		$datelist = self::countdatelist($plud,$today);
		$works = self::getworklist($date);
		$pplonwork = self::getpeopleonwork($works, $date, $time);
		$timelist = self::timeondate($date);
		$user_count = DB::table('job_history')->where('date','=',$date)
					  ->where('time','=',$time)->count();
		return View::make('home/dailyjob')->with('day',$day)
										  ->with('weekday',$weekday[$tdate])
										  ->with('month',$month)
										  ->with('year',$year)
										  ->with('thmanday',$thmanday)
										  ->with('datelist',$datelist)
										  ->with('timelist',$timelist)
										  ->with('currentplud',$currentplud)
										  ->with('works',$works)
										  ->with('pplonwork',$pplonwork)
										  ->with('plud',$plud)
										  ->with('date',$date)
										  ->with('time',$time)
										  ->with('user_count',$user_count);
	}

}

?>