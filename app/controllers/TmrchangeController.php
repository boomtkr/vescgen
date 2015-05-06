<?php

class TmrchangeController extends BaseController {

	public static function showdata(){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));

		$date = $today;
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

		$ppltodaycount = OnCamp::where('date','=',$today)->count();

		$pplinlist = DB::table('manday_history')
					->select('person.id','person.nickname','person.year')
					->join('person','manday_history.person_id','=','person.id')
					->where('manday_history.date_in','=',$tomorrow)
					->orderBy('person.year','DSC')
					->get();
		$pploutlist = DB::table('manday_history')
					->select('person.id','person.nickname','person.year')
					->join('person','manday_history.person_id','=','person.id')
					->where('manday_history.date_out','=',$today)
					->orderBy('person.year','DSC')
					->get();

		$pploncamp = DB::table('oncamp')
					 ->select('person.id','person.nickname','person.year')
					 ->join('person','oncamp.person_id','=','person.id')
					 ->join('manday_history','oncamp.person_id','=','manday_history.person_id')
					 ->where('manday_history.date_out','!=',$today)
					 ->where('oncamp.date','=',$today)
					 ->orderBy('person.year','DSC')
					 ->get();

		$pploutcamp = DB::table('person')->get(); 
		$i = 0;
		foreach($pploutcamp as $ppl){
			$pcount = OnCamp::where('date','=',$today)->where('person_id','=',$ppl->id)->count();
			if($pcount == 1){
				unset($pploutcamp[$i]);
			}
			$i++;
		}

		return View::make('home/tmrchange')->with('day',$day)
								 		   ->with('weekday',$weekday[$tdate])
								  		   ->with('month',$month)
								  		   ->with('year',$year)
								  		   ->with('thmanday',$thmanday)
								  		   ->with('today',$today)
										   ->with('tomorrow',$tomorrow)
										   ->with('pplinlist',$pplinlist)
										   ->with('pploutlist',$pploutlist)
										   ->with('ppltodaycount',$ppltodaycount)
										   ->with('pploncamp',$pploncamp)
										   ->with('pploutcamp',$pploutcamp);

	}
}

?>