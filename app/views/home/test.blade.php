<?php

	$today = date('Y-m-d',strtotime("22-05-2015"));
	$date = $today;
	$tomorrow = $today;


	$date = Time::select('date')->first()->date;
	$exdate = explode("-", $date);
	$year = (int)$exdate[0] + 543;
	echo $year;


	$thmanday = PludDate::where('date','=',$date)->first();


?>