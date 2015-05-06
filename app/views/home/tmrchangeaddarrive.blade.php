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

	<h4>Today มีคน {{$ppltodaycount}} คน</h4>
	<h4>Today : {{$today}}</h4>
	<h4>Tomorrow : {{$tomorrow}}</h4>
	<?php 
		$pplincount = count($pplinlist);
		$pploutcount = count($pploutlist);
	?>
	<br>

	<table>
		<tr>
			<td>
				<h4>คนขึ้น - {{$pplincount}} คน</h4>
				<a href={{asset('tmrchange/add/arrive')}}><button class="btn btn-primary btn-lg">เพิ่มคนขึ้น</button></a>
				@foreach($pplinlist as $ppl)
					<h4>
						<a href={{asset('tmrchange/postpone/arrive/'.$ppl->id)}}><button class="btn btn-primary btn-lg">เลื่อน</button></a>
						<a href={{asset('person/'.$ppl->id)}}>{{$ppl->nickname}}{{'#'}}{{$ppl->year}}</a>
					</h4>
				@endforeach
				<br>
				<h4>คนลง - {{$pploutcount}} คน</h4>
				<a href={{asset('tmrchange/add/depart')}}><button class="btn btn-primary btn-lg">เพิ่มคนลง</button></a>
				@foreach($pploutlist as $ppl)
					<h4>
						<a href={{asset('tmrchange/postpone/depart/'.$ppl->id)}}><button class="btn btn-primary btn-lg">เลื่อน</button></a>
						<a href={{asset('person/'.$ppl->id)}}>{{$ppl->nickname}}{{'#'}}{{$ppl->year}}</a>
					</h4>
				@endforeach
			</td>
			<td>
				<div>
					<h3>กำหนดการขึ้น-ลงถัดไปของ {{$person->nickame}}{{"#"}}{{$person->year}}</h3>
					<h5>วันขึ้น : {{$manhis->date_in}}</h5>
					<h5>วันลง : {{$manhis->date_out}}</h5>

	    			{{Form::open(array('url'=>'/tmrchange/add/arrive/update/'.$person->id.'/edit'))}}
	    			<h4>แก้ไขจากวันขึ้นถัดไปเป็นวันพรุ่งนี้</h4>
		   			<input type="submit" value="ยันยืน">
	    			{{Form::close()}}

	    			{{Form::open(array('url'=>'/tmrchange/add/arrive/update/'.$person->id.'/new'))}}
	    			<h4>เพิ่มวันขึ้น-ลงรอบใหม่ (ต้องลงก่อนวันขึ้นของรอบถัดไป)</h4>
	    			<h5>ใส่วันลงตรงนี้</h5> <input type="date" name="newdateout">
		   			<input type="submit" value="ยันยืน">
	    			{{Form::close()}}
				</div>
				<div>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>