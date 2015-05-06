<?php

		$today = Time::select('date')->first()->date;
		$id = 2;
		$manhis = MandayHistory::where('person_id','=',$id)->where('date_in','<',$today)
					->where('date_out','>',$today)->first(); 

		dd($manhis);
?>