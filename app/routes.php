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

Route::get('/', function()
{
	return View::make('home/home');
});

Route::get('/jobtoday','JobtodayController@showdata');

Route::get('/tmrchange','TmrchangeController@showdata');

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

Route::get('/a', function(){
	$user = DB::table('person')->where('year', '==', '3')->get();
	return $user;  
});
