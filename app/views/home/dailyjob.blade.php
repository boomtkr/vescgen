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
	    		<li><a href={{asset('dailyjob/'.$i)}}>{{$i}}</a></li>
	  		@endfor
	  	</ul>
	</div>


	<!-- ปุ่มเลือกวัน -->
	<div class="dropdown" style="display: inline;">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Date
	  	<span class="caret"></span></button>
	  	<ul class="dropdown-menu">
	  		@foreach($datelist as $menudate)
	    	<li><a href={{asset('dailyjob/'.$plud.'/'.$menudate)}}>{{$menudate}}</a></li>
	    	@endforeach
	  	</ul>
	</div>


	<!-- ปุ่มเลือกเวลา -->
	<div class="dropdown" style="display: inline;">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Time
	  	<span class="caret"></span></button>
	  	<ul class="dropdown-menu">
	  		@foreach($timelist as $tl)
	    	<li><a href={{asset('dailyjob/'.$plud.'/'.$date.'/'.$tl)}}>{{$tl}}</a></li>
	    	@endforeach
	  	</ul>
	</div>


	<!-- การแสดงผลข้อมูล -->
	<div style="margin-left: 20px; padding-bottom: 0px; margin-bottom: 0px;">
		<h3>Statistics</h3>
		<h5>plud: {{$plud}}</h5>
		<h5>date: {{$date}}</h5>
		<h5>time: {{$time}}</h5>
		<h5>total people: {{$user_count}}</h5>
	</div>


	<table style="margin-left: 20px; margin-top: 0px;">
		<?php $i = 0; ?>
		@foreach($works as $work)
		<tr>
			<td>
				<h4>{{$work->work_name}}</h4>
			</td>
			<td>
				<h4>{{count($pplonwork[$i])}}</h4>
			</td>
			@foreach($pplonwork[$i] as $ppow)
				<td>
					<h4><a href={{asset('person/'.$ppow->id)}}>{{$ppow->nickname}}{{'#'}}{{$ppow->year}}</a></h4>
				</td>
			@endforeach
			<br>
			<?php $i++; ?>
		</tr>
		@endforeach
	</table>


</body>
</html>