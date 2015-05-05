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

		return View::make('home/tmrchange')->with('today',$today)
										   ->with('tomorrow',$tomorrow)
										   ->with('pplinlist',$pplinlist)
										   ->with('pploutlist',$pploutlist)
										   ->with('ppltodaycount',$ppltodaycount)
										   ->with('pploncamp',$pploncamp)
										   ->with('pploutcamp',$pploutcamp);

	}
}

?>