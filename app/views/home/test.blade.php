<?php

	$today = date('Y-m-d',strtotime("22-05-2015"));
	$date = $today;
	$tomorrow = $today;

	$weekday = Array('Monday'=>'จันทร์', 'Tuesday'=>'อังคาร', 'Wednesday'=>'พุธ',
					 'Thursday'=>'พฤหัสบดี', 'Friday'=>'ศุกร์', 'Saturday'=>'เสาร์',
					 'Sunday'=>'อาทิตย์');
	$tdate = date("l",strtotime($tomorrow));
	echo $weekday[$tdate];

?>