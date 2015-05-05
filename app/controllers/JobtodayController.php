<?php

class JobtodayController extends BaseController {


	public static function findcurrentplud($today){
		$currentpludarray = PludDate::where('date','=',$today)->get();
		foreach($currentpludarray as $cpa){
			$currentplud = $cpa->plud;
		}
		return $currentplud;
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

	public static function showdata(){
		$latestdate = Time::select('date')->first()->date;
		$latesttime = Time::select('time')->first()->time;
		$currentplud = self::findcurrentplud($latestdate);
		$works = self::getworklist($latestdate);
		$pplonwork = self::getpeopleonwork($works, $latestdate, $latesttime);
		$user_count = DB::table('job_history')->where('date','=',$latestdate)
					  ->where('time','=',$latesttime)->count();
		return View::make('home/jobtoday')->with('currentplud',$currentplud)
										  ->with('works',$works)
										  ->with('pplonwork',$pplonwork)
										  ->with('plud',$currentplud)
										  ->with('date',$latestdate)
										  ->with('time',$latesttime)
										  ->with('user_count',$user_count);
	}

}

?>