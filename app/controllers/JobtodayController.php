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

	public static function showdata(){

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
		$works = self::getworklist($latestdate);
		$pplonwork = self::getpeopleonwork($works, $latestdate, $latesttime);
		$user_count = DB::table('job_history')->where('date','=',$latestdate)
					  ->where('time','=',$latesttime)->count();


		$senior_md = 0;
		$junior_md = 0;
		$more_md = 0;
		$freshy_md = 0;

		$ppllist = Person::all();
		foreach($ppllist as $p){
			$count = Oncamp::where('person_id','=',$p->id)->
							where('date','<=',$date)->count();
			if($p->year == 4){
				$senior_md += $count;
			}
			else if($p->year == 3){
				$junior_md += $count;
			}
			else if($p->year == 2){
				$more_md += $count;
			}
			else{
				$freshy_md += $count;
			}
		}
		return View::make('home/jobtoday')->with('day',$day)
										  ->with('weekday',$weekday[$tdate])
										  ->with('month',$month)
										  ->with('year',$year)
										  ->with('thmanday',$thmanday)
										  ->with('currentplud',$currentplud)
										  ->with('works',$works)
										  ->with('pplonwork',$pplonwork)
										  ->with('plud',$currentplud)
										  ->with('date',$latestdate)
										  ->with('time',$latesttime)
										  ->with('user_count',$user_count)
										  ->with('senior_md',$senior_md)
										  ->with('junior_md',$junior_md)
										  ->with('more_md',$more_md)
										  ->with('freshy_md',$freshy_md);
	}

}

?>