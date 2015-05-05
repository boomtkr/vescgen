<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	{{ HTML::style('css/bootstrap.css'); }}
  	{{ HTML::script('js/jquery.min.js'); }}
  	{{ HTML::script('js/bootstrap.min.js');}}
	<style>
		td{
			padding-right: 20px;
		}
	</style>
</head>
<body>
	<h3><a href={{asset('/')}}>back</a></h3>
	<ul style="list-style: none;">
		<li style="display: inline; padding-right: 20px"><a href={{asset('namelist')}}>อัพเดทรายชื่อ</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('jobmgt')}}>แบ่งงาน</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('jobtoday')}}>กระดานหน้าที่วันนี้</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('tmrchange')}}>คนขึ้นลงพรุ่งนี้</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('dailyname')}}>รายชื่อรายวัน</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('allname')}}>รายชื่อทั้งหมด</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('dailyjob')}}>หน้าที่รายวัน</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('allwork')}}>หน้าที่ทั้งหมด</a></li>
	</ul>


	<div style="margin-left: 20px">
		<h2>Statistics</h2>
		<h5>people: {{$user_count}}</h5>
		<h5>man: {{$male_count}}    
			woman: {{$female_count}}</h5>
		<h5>senior: {{$senior_count}}
			junior: {{$junior_count}}
			more: {{$more_count}}
			freshy: {{$freshy_count}}</h5>
		<h5>totalmanday: </h5>		
	</div>

	<div class="dropdown">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort By
	  	<span class="caret"></span></button>
	  	<ul class="dropdown-menu">
	    	<li><a href="{{asset('allname/year')}}">ชั้นปี</a></li>
	    	<li><a href="{{asset('allname/name')}}">ชื่อจริง</a></li>
	    	<li><a href="{{asset('allname/nickname')}}">ชื่อเล่น</a></li>
	  	</ul>
	</div>

	<table style="margin-left: 10px"> 
		@foreach ($users as $user)
			<tr>
				<td>{{$user->first_name}}</td>
				<td>{{$user->last_name}}</td>
				<td>{{$user->nickname}}</td>
				<td>{{$user->faculty}}</td>
				<td>{{$user->dep}}</td>
				<td>{{$user->year}}</td>
				<td>{{$user->gender}}</td>
				<td>{{$user->student_id}}</td>
				<td>{{$user->citizen_id}}</td>
				<td>{{$user->phone}}</td>
				<td>{{$user->birthday}}</td>
				<td>{{$user->str_lvl}}</td>
				<td>{{$user->total_manday}}</td>
			</tr>
		@endforeach
	</table>
</body>