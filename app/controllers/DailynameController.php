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
		return View::make('home/dailyname')->with('users',$users)
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
		return View::make('home/dailyname')->with('users',$users)
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
		return View::make('home/dailyname')->with('users',$users)
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
		return View::make('home/dailyname')->with('users',$users)
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
		return View::make('home/dailyname')->with('users',$users)
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
		return View::make('home/dailyname')->with('users',$users)
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