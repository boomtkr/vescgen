<?php

class DailynameController extends BaseController {


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

	public static function sortbyyear(){
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
		$sort = "year";
		$today = Time::select('date')->first()->date;
		$currentplud = self::findcurrentplud($today); 
		$date = $today;           
		$plud = $currentplud;    
		$datelist = self::countdatelist($currentplud,$today);
		$user_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->count();
		$female_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')->count();
		$male_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','M')->count();
		$senior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',4)->count();
		$junior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',3)->count();
		$more_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',2)->count();
		$freshy_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',1)->count();
		$userdesp[0]="ซีเนียร์";
		$userdesp[1]="จูเนียร์";
		$userdesp[2]="หม่อ";
		$userdesp[3]="เฟรชชี่";
		$users[0] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',4)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[1] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',3)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[2] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',2)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[3] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',1)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		return View::make('home/dailyname')->with('day',$day)
										   ->with('weekday',$weekday[$tdate])
										   ->with('month',$month)
										   ->with('year',$year)
										   ->with('thmanday',$thmanday)
										   ->with('users',$users)
										   ->with('userdesp',$userdesp)
										   ->with('sort',$sort)
										   ->with('plud',$plud)
										   ->with('date',$date)
										   ->with('datelist',$datelist)
										   ->with('currentplud',$currentplud)
										   ->with('user_count',$user_count)
										   ->with('senior_count',$senior_count)
										   ->with('junior_count',$junior_count)
										   ->with('more_count',$more_count)
										   ->with('freshy_count',$freshy_count)
										   ->with('male_count',$male_count)
										   ->with('female_count',$female_count);

	}

	public static function sortbygender(){
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
		$sort = "gender";
		$today = Time::select('date')->first()->date;
		$currentplud = self::findcurrentplud($today);
		$date = $today;
		$plud = $currentplud;
		$datelist = self::countdatelist($plud,$today);
		$user_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->count();
		$female_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')->count();
		$male_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','M')->count();
		$senior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',4)->count();
		$junior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',3)->count();
		$more_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',2)->count();
		$freshy_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',1)->count();
		$userdesp[0]="ชาย";
		$userdesp[1]="หญิง";
		$users[0] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','M')
					  ->orderBy('year','DSC')
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[1] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')
					  ->orderBy('year','DSC')
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		return View::make('home/dailyname')->with('day',$day)
										   ->with('weekday',$weekday[$tdate])
										   ->with('month',$month)
										   ->with('year',$year)
										   ->with('thmanday',$thmanday)
										   ->with('users',$users)
										   ->with('userdesp',$userdesp)
										   ->with('sort',$sort)
										   ->with('plud',$plud)
										   ->with('date',$date)
										   ->with('datelist',$datelist)
										   ->with('currentplud',$currentplud)
										   ->with('user_count',$user_count)
										   ->with('senior_count',$senior_count)
										   ->with('junior_count',$junior_count)
										   ->with('more_count',$more_count)
										   ->with('freshy_count',$freshy_count)
										   ->with('male_count',$male_count)
										   ->with('female_count',$female_count);
	}

	public static function sortbyyearp($plud){
		$sort = "year";
		$today = Time::select('date')->first()->date;
		$currentplud = self::findcurrentplud($today);
		$date = self::firstdateofplud($plud);
		$datelist = self::countdatelist($plud,$today);
		$user_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->count();
		$female_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')->count();
		$male_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','M')->count();
		$senior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',4)->count();
		$junior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',3)->count();
		$more_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',2)->count();
		$freshy_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',1)->count();
		$userdesp[0]="ซีเนียร์";
		$userdesp[1]="จูเนียร์";
		$userdesp[2]="หม่อ";
		$userdesp[3]="เฟรชชี่";
		$users[0] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',4)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[1] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',3)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[2] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',2)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[3] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',1)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		return View::make('home/dailyname')->with('day',$day)
										   ->with('weekday',$weekday[$tdate])
										   ->with('month',$month)
										   ->with('year',$year)
										   ->with('thmanday',$thmanday)
										   ->with('users',$users)
										   ->with('userdesp',$userdesp)
										   ->with('sort',$sort)
										   ->with('plud',$plud)
										   ->with('date',$date)
										   ->with('datelist',$datelist)
										   ->with('currentplud',$currentplud)
										   ->with('user_count',$user_count)
										   ->with('senior_count',$senior_count)
										   ->with('junior_count',$junior_count)
										   ->with('more_count',$more_count)
										   ->with('freshy_count',$freshy_count)
										   ->with('male_count',$male_count)
										   ->with('female_count',$female_count);
	}

	public static function sortbygenderp($plud){
		$tddate = Time::select('date')->first()->date;
		$exdate = explode("-", $tddate);
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
		$sort = "gender";
		$today = Time::select('date')->first()->date;
		$currentplud = self::findcurrentplud($today);
		$date = self::firstdateofplud($plud);
		$datelist = self::countdatelist($plud,$today);
		$user_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->count();
		$female_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')->count();
		$male_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','M')->count();
		$senior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',4)->count();
		$junior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',3)->count();
		$more_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',2)->count();
		$freshy_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',1)->count();
		$userdesp[0]="ชาย";
		$userdesp[1]="หญิง";
		$users[0] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','M')
					  ->orderBy('year','DSC')
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[1] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')
					  ->orderBy('year','DSC')
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		return View::make('home/dailyname')->with('day',$day)
										   ->with('weekday',$weekday[$tdate])
										   ->with('month',$month)
										   ->with('year',$year)
										   ->with('thmanday',$thmanday)
										   ->with('users',$users)
										   ->with('userdesp',$userdesp)
										   ->with('sort',$sort)
										   ->with('plud',$plud)
										   ->with('date',$date)
										   ->with('datelist',$datelist)
										   ->with('currentplud',$currentplud)
										   ->with('user_count',$user_count)
										   ->with('senior_count',$senior_count)
										   ->with('junior_count',$junior_count)
										   ->with('more_count',$more_count)
										   ->with('freshy_count',$freshy_count)
										   ->with('male_count',$male_count)
										   ->with('female_count',$female_count);
	}

	public static function sortbyyearpd($plud,$date){		
		$tddate = Time::select('date')->first()->date;
		$exdate = explode("-", $tddate);
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
		$today = Time::select('date')->first()->date;
		$sort = "year";
		$currentplud = self::findcurrentplud($today);
		$datelist = self::countdatelist($plud,$today);
		$userdesp[0]="ซีเนียร์";
		$userdesp[1]="จูเนียร์";
		$userdesp[2]="หม่อ";
		$userdesp[3]="เฟรชชี่";
		$user_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->count();
		$female_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')->count();
		$male_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','M')->count();
		$senior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',4)->count();
		$junior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',3)->count();
		$more_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',2)->count();
		$freshy_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',1)->count();
		$users[0] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',4)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[1] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',3)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[2] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',2)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[3] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',1)
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		return View::make('home/dailyname')->with('day',$day)
										   ->with('weekday',$weekday[$tdate])
										   ->with('month',$month)
										   ->with('year',$year)
										   ->with('thmanday',$thmanday)
										   ->with('users',$users)
										   ->with('userdesp',$userdesp)
										   ->with('sort',$sort)
										   ->with('plud',$plud)
										   ->with('date',$date)
										   ->with('datelist',$datelist)
										   ->with('currentplud',$currentplud)
										   ->with('user_count',$user_count)
										   ->with('senior_count',$senior_count)
										   ->with('junior_count',$junior_count)
										   ->with('more_count',$more_count)
										   ->with('freshy_count',$freshy_count)
										   ->with('male_count',$male_count)
										   ->with('female_count',$female_count);
	}

	public static function sortbygenderpd($plud,$date){
		$tddate = Time::select('date')->first()->date;
		$exdate = explode("-", $tddate);
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
		$today = Time::select('date')->first()->date;
		$sort = "gender";
		$currentplud = self::findcurrentplud($today);
		$datelist = self::countdatelist($plud,$today);		
		$user_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->count();
		$female_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')->count();
		$male_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','M')->count();
		$senior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',4)->count();
		$junior_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',3)->count();
		$more_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',2)->count();
		$freshy_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.year','=',1)->count();
		$userdesp[0]="ชาย";
		$userdesp[1]="หญิง";
		$users[0] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','M')
					  ->orderBy('year','DSC')
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		$users[1] = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->where('person.gender','=','F')
					  ->orderBy('year','DSC')
					  ->get(array('person_id','first_name','last_name','nickname','year'));
		return View::make('home/dailyname')->with('day',$day)
										   ->with('weekday',$weekday[$tdate])
										   ->with('month',$month)
										   ->with('year',$year)
										   ->with('thmanday',$thmanday)
										   ->with('users',$users)
										   ->with('userdesp',$userdesp)
										   ->with('sort',$sort)
										   ->with('plud',$plud)
										   ->with('date',$date)
										   ->with('datelist',$datelist)
										   ->with('currentplud',$currentplud)
										   ->with('user_count',$user_count)
										   ->with('senior_count',$senior_count)
										   ->with('junior_count',$junior_count)
										   ->with('more_count',$more_count)
										   ->with('freshy_count',$freshy_count)
										   ->with('male_count',$male_count)
										   ->with('female_count',$female_count);

	}
}

?>