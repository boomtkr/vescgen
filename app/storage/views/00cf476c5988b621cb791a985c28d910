<?php

	$today = date('Y-m-d',strtotime("25-05-2015"));
	$date = $today;
	$tomorrow = $today;
// 	$date = "04-15-2013";
// $date1 = str_replace('-', '/', $date);
// $tomorrow = date('m-d-Y',strtotime($date1 . "+1 days"));

// echo $tomorrow;	
	
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

		foreach($pplinlist as $ppl){
			echo $ppl->nickname." ";
		}
		foreach($pploutlist as $ppl){
			echo $ppl->nickname." ";
		}
	
	// $ppllist = OnCamp::select('person_id')->where('date','=',$today)->get();
	// $plist = array();
	// foreach($ppllist as $ppl){
	// 	array_push($plist,$ppl->person_id);
	// }
	// $pploutlist = MandayHistory::select('person_id')->where('date_out','=',$tomorrow)->get();
	// $poutlist = array();
	// foreach($pploutlist as $ppol){
	// 	array_push($)
	// }
?>