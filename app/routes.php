<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/test', function(){
	return View::make('home/test');
});

Route::get('/testing','TestController@exportjson');

Route::get('/', function()
{
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
	$latestdate = Time::select('date')->first()->date;
	$latesttime = Time::select('time')->first()->time;
	$currentplud = self::findcurrentplud($latestdate);
	$user_count = DB::table('oncamp')->where('date','=',$date)
					  ->join('person','oncamp.person_id','=','person.id')
					  ->count();
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
	return View::make('home/home')->with('day',$day)
								  ->with('weekday',$weekday[$tdate])
								  ->with('month',$month)
								  ->with('year',$year)
								  ->with('thmanday',$thmanday)
								  ->with('currentplud',$currentplud)
								  ->with('user_count',$user_count)
					   		      ->with('senior_count',$senior_count)
								  ->with('junior_count',$junior_count)
								  ->with('more_count',$more_count)
								  ->with('freshy_count',$freshy_count);
});
Route::get('/workspace', function()
{
	return View::make('home/workspace');
});

Route::get('/addpeople','UpdatepeopleController@addpeople');
Route::post('/addpeople/save','UpdatepeopleController@saveadded');

Route::get('/jobtoday','JobtodayController@showdata');

Route::get('/jobmgt','JobmgtController@jobmgt');
Route::post('/jobmgt/datechosen','JobmgtController@datechosen');
Route::post('/jobmgt/workcreated','JobmgtController@workcreated');
Route::post('/jobmgt/workrandom','JobmgtController@workrandom');

//------edit result page ------------
Route::get('/jobmgt/editworkresult', function()
{
	return View::make('home/jobmgtrandomedit');
});

Route::get('/tmrchange','TmrchangeController@showdata');
Route::get('/tmrchange/add/depart','TmrchangeController@adddepart');
Route::get('/tmrchange/add/arrive','TmrchangeController@addarrive');
Route::post('/tmrchange/add/depart/update','TmrchangeController@updateadddepart');
Route::post('/tmrchange/add/arrive/update','TmrchangeController@updateaddarrive');
Route::post('/tmrchange/add/arrive/update/{id}/new','TmrchangeController@updateaddarrivenew');
Route::post('/tmrchange/add/arrive/update/{id}/edit','TmrchangeController@updateaddarriveedit');
Route::get('/tmrchange/postpone/depart/{id}','TmrchangeController@postponedepart');
Route::get('/tmrchange/postpone/arrive/{id}','TmrchangeController@postponearrive');
Route::post('/tmrchange/postpone/depart/{id}/update','TmrchangeController@updatepostponedepart');
Route::post('/tmrchange/postpone/arrive/{id}/update','TmrchangeController@updatepostponearrive');

Route::get('/person/{id}','PersonController@persondetails');
Route::post('/person/{id}/update','PersonController@updatedetails');

Route::get('/dailyname','DailynameController@sortbyyear');
Route::get('/dailyname/year','DailynameController@sortbyyear');
Route::get('/dailyname/gender','DailynameController@sortbygender');
Route::get('/dailyname/year/{plud}','DailynameController@sortbyyearp');
Route::get('/dailyname/gender/{plud}','DailynameController@sortbygenderp');
Route::get('/dailyname/year/{plud}/{date}','DailynameController@sortbyyearpd');
Route::get('/dailyname/gender/{plud}/{date}','DailynameController@sortbygenderpd');

Route::get('/allname','AllnameController@sortbyyear');
Route::get('/allname/year','AllnameController@sortbyyear');
Route::get('/allname/name','AllnameController@sortbyname');
Route::get('/allname/nickname','AllnameController@sortbynickname');


Route::get('/dailyjob','DailyjobController@dailyjob');
Route::get('/dailyjob/{plud}','DailyjobController@dailyjobp');
Route::get('/dailyjob/{plud}/{date}','DailyjobController@dailyjobpd');
Route::get('/dailyjob/{plud}/{date}/{time}','DailyjobController@dailyjobpdt');

Route::get('/allwork','AllworkController@allwork');
Route::post('/allwork/add','AllworkController@addwork');

Route::get('/a', function(){
	$user = DB::table('person')->where('year', '==', '3')->get();
	return $user;  
});
