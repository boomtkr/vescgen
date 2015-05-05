<?php

class TmrchangeController extends BaseController {

	public static function showdata(){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));

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
					->where('manday_history.date_out','=',$tomorrow)
					->orderBy('person.year','DSC')
					->get();
		return View::make('home/tmrchange')->with('today',$today)
										   ->with('tomorrow',$tomorrow)
										   ->with('pplinlist',$pplinlist)
										   ->with('pploutlist',$pploutlist)
										   ->with('ppltodaycount',$ppltodaycount);
	}

}

?>