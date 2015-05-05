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


	<!-- ปุ่มเลือกผลัด -->
	<div class="dropdown" style="display: inline;">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Plud
	  	<span class="caret"></span></button>
	  	<ul class="dropdown-menu">
	  		@for($i=0 ; $i<=$currentplud; $i++)
	    		<li><a href={{asset('dailyname/'.$sort.'/'.$i)}}>{{$i}}</a></li>
	  		@endfor
	  	</ul>
	</div>


	<!-- ปุ่มเลือกวัน -->
	<div class="dropdown" style="display: inline;">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Date
	  	<span class="caret"></span></button>
	  	<ul class="dropdown-menu">
	  		@foreach($datelist as $menudate)
	    	<li><a href={{asset('dailyname/'.$sort.'/'.$currentplud.'/'.$menudate)}}>{{$menudate}}</a></li>
	    	@endforeach
	  	</ul>
	</div>


	<!-- ปุ่มเลือก sorting -->
	<div class="dropdown" style="display: inline;">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort By
	  	<span class="caret"></span></button>
	  	<ul class="dropdown-menu">
	    	<li><a href={{asset('dailyname/year/'.$plud.'/'.$date)}}>ชั้นปี</a></li>
	    	<li><a href={{asset('dailyname/gender/'.$plud.'/'.$date)}}>เพศ</a></li>
	  	</ul>
	</div>


	<!-- การแสดงผลข้อมูล -->
	<div style="margin-left: 20px; padding-bottom: 0px; margin-bottom: 0px;">
		<h3>Statistics</h3>
		<h5>plud: {{$plud}}</h5>
		<h5>date: {{$date}}</h5>
		<h5>people: {{$user_count}}</h5>
		<h5>man: {{$male_count}}    
			woman: {{$female_count}}</h5>
		<h5>senior: {{$senior_count}}
			junior: {{$junior_count}}
			more: {{$more_count}}
			freshy: {{$freshy_count}}</h5>
	</div>


	<table style="margin-left: 20px; margin-top: 0px;">
		<?php $i = 0; ?>
		@foreach($users as $user)
		<tr>
			<td>
				<h4>{{$userdesp[$i]}}</h4>
			</td>
			<br>
			@foreach($user as $u)
				<td>
					<a href={{asset('person/'.$u->person_id)}}>{{$u->nickname}}{{'#'}}{{$u->year}}</a>
				</td>
			@endforeach
			<?php $i++; ?>
		</tr>
		@endforeach
	</table>

</body>
</html>