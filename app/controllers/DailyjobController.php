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
		return View::make('home/dailyjob')->with('datelist',$datelist)
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
		return View::make('home/dailyjob')->with('datelist',$datelist)
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
		return View::make('home/dailyjob')->with('datelist',$datelist)
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
		return View::make('home/dailyjob')->with('datelist',$datelist)
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