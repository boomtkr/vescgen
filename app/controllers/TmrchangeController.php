<?php

class TmrchangeController extends BaseController {

	public static function getmonthname($m){
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
		return $month;
	}

	public static function getpludofdate($today){
		$currentpludarray = PludDate::where('date','=',$today)->get();
		foreach($currentpludarray as $cpa){
			$currentplud = $cpa->plud;
		}
		return $currentplud;
	}

	public static function showdata(){
		$changed = 0;
		$oldperson = 0;
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
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
										   ->with('changed',$changed)
										   ->with('oldperson',$oldperson);

	}


	public static function adddepart(){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));

		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
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

		$type = 'depart';
		$pploncamp = DB::table('oncamp')
					 ->select('person.id','person.nickname','person.year')
					 ->join('person','oncamp.person_id','=','person.id')
					 ->join('manday_history','oncamp.person_id','=','manday_history.person_id')
					 ->where('manday_history.date_out','!=',$today)
					 ->where('oncamp.date','=',$today)
					 ->orderBy('person.year','DSC')
					 ->get();

		return View::make('home/tmrchangeadd')->with('day',$day)
								 		   ->with('weekday',$weekday[$tdate])
								  		   ->with('month',$month)
								  		   ->with('year',$year)
								  		   ->with('thmanday',$thmanday)
								  		   ->with('today',$today)
										   ->with('tomorrow',$tomorrow)
										   ->with('pplinlist',$pplinlist)
										   ->with('pploutlist',$pploutlist)
										   ->with('ppltodaycount',$ppltodaycount)
										   ->with('ppltoaddlist',$pploncamp)
										   ->with('type',$type);

	}


	public static function addarrive(){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));

		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
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

		$type = 'arrive';
		$pploutcamp = DB::table('person')->get(); 
		$i = 0;
		foreach($pploutcamp as $ppl){
			$pcount = OnCamp::where('date','=',$today)->where('person_id','=',$ppl->id)->count();
			if($pcount == 1){
				unset($pploutcamp[$i]);
			}
			else{
				$pcount = MandayHistory::where('person_id','=',$ppl->id)
							->where('date_in','=',$tomorrow)->count();
				if($pcount == 1){
					unset($pploutcamp[$i]);
				}
			}
			$i++;
		}

		return View::make('home/tmrchangeadd')->with('day',$day)
								 		   ->with('weekday',$weekday[$tdate])
								  		   ->with('month',$month)
								  		   ->with('year',$year)
								  		   ->with('thmanday',$thmanday)
								  		   ->with('today',$today)
										   ->with('tomorrow',$tomorrow)
										   ->with('pplinlist',$pplinlist)
										   ->with('pploutlist',$pploutlist)
										   ->with('ppltodaycount',$ppltodaycount)
										   ->with('ppltoaddlist',$pploutcamp)
										   ->with('type',$type);


	}


	public static function postponedepart($id){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));

		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
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

		$type = 'depart';
		$departdate = $today;
		$person = Person::select('id','nickname','year','first_name','last_name','faculty')
						->where('id','=',$id)->first();
		$arrivedate = MandayHistory::where('person_id','=',$id)
					  ->where('date_out','=',$today)->first()->date_in;

		return View::make('home/tmrchangepostpone')->with('day',$day)
								 		   ->with('weekday',$weekday[$tdate])
								  		   ->with('month',$month)
								  		   ->with('year',$year)
								  		   ->with('thmanday',$thmanday)
								  		   ->with('today',$today)
										   ->with('tomorrow',$tomorrow)
										   ->with('pplinlist',$pplinlist)
										   ->with('pploutlist',$pploutlist)
										   ->with('ppltodaycount',$ppltodaycount)
										   ->with('type',$type)
										   ->with('arrivedate',$arrivedate)
										   ->with('departdate',$departdate)
										   ->with('person',$person);

	}


	public static function postponearrive($id){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
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

		$type = 'arrive';
		$arrivedate = $tomorrow;
		$person = Person::select('id','nickname','year','first_name','last_name','faculty')
						->where('id','=',$id)->first();
		$departdate = MandayHistory::where('person_id','=',$id)
					  ->where('date_in','=',$tomorrow)->first()->date_out;

		return View::make('home/tmrchangepostpone')->with('day',$day)
								 		   ->with('weekday',$weekday[$tdate])
								  		   ->with('month',$month)
								  		   ->with('year',$year)
								  		   ->with('thmanday',$thmanday)
								  		   ->with('today',$today)
										   ->with('tomorrow',$tomorrow)
										   ->with('pplinlist',$pplinlist)
										   ->with('pploutlist',$pploutlist)
										   ->with('ppltodaycount',$ppltodaycount)
										   ->with('type',$type)
										   ->with('arrivedate',$arrivedate)
										   ->with('departdate',$departdate)
										   ->with('person',$person);


	}

	public static function updatepostponedepart($id){
		$changed = 1;
		$oldname = Person::where('id','=',$id)->first()->nickname;
		$oldyear = Person::where('id','=',$id)->first()->year;
		$oldperson = $oldname.'#'.$oldyear;

		$today = Time::select('date')->first()->date;
		$newdate = Input::get('newdate');
		$manhis = MandayHistory::where('person_id','=',$id)
					->where('date_out','=',$today)->first();
		$manhis->date_out = $newdate;
		$manhis->save();

		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
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
										   ->with('changed',$changed)
										   ->with('oldperson',$oldperson);
	}


	public static function updatepostponearrive($id){
		$changed = 1;
		$oldname = Person::where('id','=',$id)->first()->nickname;
		$oldyear = Person::where('id','=',$id)->first()->year;
		$oldperson = $oldname.'#'.$oldyear;

		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));

		$newdate = Input::get('newdate');
		$manhis = MandayHistory::where('person_id','=',$id)
					->where('date_in','=',$tomorrow)->first();
		$manhis->date_in = $newdate;
		$manhis->save();

		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
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
										   ->with('changed',$changed)
										   ->with('oldperson',$oldperson);
	}


	public static function updateaddarrive(){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$pname = Input::get('pname');
		$pstring = explode('#',$pname);
		$name = $pstring[0];
		$tyear = $pstring[1];
		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
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


		$id = Person::where('nickname','=',$name)->where('year','=',$tyear)
				->first()->id;
		$person = Person::find($id);
		$manhis = MandayHistory::where('person_id','=',$id)
						->where('date_in','>',$tomorrow)->orderBy('date_in','ASC')->first();
		return View::make('home/tmrchangeaddarrive')->with('person',$person)
													->with('manhis',$manhis)
													->with('day',$day)
										 		    ->with('weekday',$weekday[$tdate])
										  		    ->with('month',$month)
										  		    ->with('year',$year)
										  	 	    ->with('today',$today)
												    ->with('tomorrow',$tomorrow)
										  		    ->with('thmanday',$thmanday)
												    ->with('pplinlist',$pplinlist)
												    ->with('pploutlist',$pploutlist)
												    ->with('ppltodaycount',$ppltodaycount);
	}


	public static function updateaddarriveedit($id){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
		$thmanday = PludDate::where('date','=',$date)->first()->id;
		$weekday = Array('Monday'=>'จันทร์', 'Tuesday'=>'อังคาร', 'Wednesday'=>'พุธ',
						 'Thursday'=>'พฤหัสบดี', 'Friday'=>'ศุกร์', 'Saturday'=>'เสาร์',
						 'Sunday'=>'อาทิตย์');
		$tdate = date("l",strtotime($date));
		$ppltodaycount = OnCamp::where('date','=',$today)->count();

		$manhis = MandayHistory::where('person_id','=',$id)
						->where('date_in','>',$tomorrow)->orderBy('date_in','ASC')->first();
		$manhis->date_in = $tomorrow;
		$manhis->save();

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

		$type = 'arrive';
		$pploutcamp = DB::table('person')->get(); 
		$i = 0;
		foreach($pploutcamp as $ppl){
			$pcount = OnCamp::where('date','=',$today)->where('person_id','=',$ppl->id)->count();
			if($pcount == 1){
				unset($pploutcamp[$i]);
			}
			else{
				$pcount = MandayHistory::where('person_id','=',$ppl->id)
							->where('date_in','=',$tomorrow)->count();
				if($pcount == 1){
					unset($pploutcamp[$i]);
				}
			}
			$i++;
		}

		return View::make('home/tmrchangeadd')->with('day',$day)
										 		   ->with('weekday',$weekday[$tdate])
										  		   ->with('month',$month)
										  		   ->with('year',$year)
										  		   ->with('thmanday',$thmanday)
										  		   ->with('today',$today)
												   ->with('tomorrow',$tomorrow)
												   ->with('pplinlist',$pplinlist)
												   ->with('pploutlist',$pploutlist)
												   ->with('ppltodaycount',$ppltodaycount)
												   ->with('ppltoaddlist',$pploutcamp)
												   ->with('type',$type);
	}

	public static function updateaddarrivenew($id){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
		$thmanday = PludDate::where('date','=',$date)->first()->id;
		$weekday = Array('Monday'=>'จันทร์', 'Tuesday'=>'อังคาร', 'Wednesday'=>'พุธ',
						 'Thursday'=>'พฤหัสบดี', 'Friday'=>'ศุกร์', 'Saturday'=>'เสาร์',
						 'Sunday'=>'อาทิตย์');
		$tdate = date("l",strtotime($date));
		$ppltodaycount = OnCamp::where('date','=',$today)->count();

		$newdateout = Input::get('newdateout');
		$manhis = new MandayHistory;
		$manhis->person_id = $id;
		$manhis->date_in = $tomorrow;
		$manhis->date_out = $newdateout;
		$manhis->plud = Self::getpludofdate($manhis->date_in);
		$manhis->save();

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

		$type = 'arrive';
		$pploutcamp = DB::table('person')->get(); 
		$i = 0;
		foreach($pploutcamp as $ppl){
			$pcount = OnCamp::where('date','=',$today)->where('person_id','=',$ppl->id)->count();
			if($pcount == 1){
				unset($pploutcamp[$i]);
			}
			else{
				$pcount = MandayHistory::where('person_id','=',$ppl->id)
							->where('date_in','=',$tomorrow)->count();
				if($pcount == 1){
					unset($pploutcamp[$i]);
				}
			}
			$i++;
		}

		return Redirect::action('TmrchangeController@updateaddarrive');
	}


	public static function updateadddepart(){
		$today = Time::select('date')->first()->date;
		$thistoday = str_replace('-', '/', $today);
		$tomorrow = date('Y-m-d',strtotime($thistoday . "+1 days"));
		$pname = Input::get('pname');
		$pstring = explode('#',$pname);
		$name = $pstring[0];
		$year = $pstring[1];
		$id = Person::where('nickname','=',$name)->where('year','=',$year)
				->first()->id;
		$manhis = MandayHistory::where('person_id','=',$id)->where('date_in','<',$today)
					->where('date_out','>',$today)->first(); 
		$manhis->date_out = $today;
		$manhis->save();

		$date = $today;
		$exdate = explode("-", $date);
		$year = (int)$exdate[0] + 543;
		$day = (int)$exdate[2];
		$month = Self::getmonthname((int)$exdate[1]);
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

		$type = 'depart';
		$pploncamp = DB::table('oncamp')
					 ->select('person.id','person.nickname','person.year')
					 ->join('person','oncamp.person_id','=','person.id')
					 ->join('manday_history','oncamp.person_id','=','manday_history.person_id')
					 ->where('manday_history.date_out','!=',$today)
					 ->where('oncamp.date','=',$today)
					 ->orderBy('person.year','DSC')
					 ->get();

		return View::make('home/tmrchangeadd')->with('day',$day)
								 		   ->with('weekday',$weekday[$tdate])
								  		   ->with('month',$month)
								  		   ->with('year',$year)
								  		   ->with('thmanday',$thmanday)
								  		   ->with('today',$today)
										   ->with('tomorrow',$tomorrow)
										   ->with('pplinlist',$pplinlist)
										   ->with('pploutlist',$pploutlist)
										   ->with('ppltodaycount',$ppltodaycount)
										   ->with('ppltoaddlist',$pploncamp)
										   ->with('type',$type);

	}
}

?>