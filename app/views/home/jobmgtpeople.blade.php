<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	{{ HTML::style('css/bootstrap.css'); }}
  	{{ HTML::script('js/jquery.min.js'); }}
  	{{ HTML::script('js/bootstrap.min.js');}}
	<style>
		td{
			border: solid green 1px;
			padding: 5px 20px 5px 20px;
		}
	</style>
</head>
<body style="padding-left: 20px;">
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


	<h4>แบ่งหน้าที่ของวันที่  {{$timerecord->date}}  ช่วงเวลา {{$timerecord->time}}</h4>



	<?php 
		$userleft = $user_count;
		$seniorleft= $senior_count;
		$jobcount = 1;
	?>

	<h5>จำนวนงานทั้งหมด {{$jobcount}} งาน   เหลือซีเนียร์ {{$seniorleft}}/{{$senior_count}} คน</h5>

	{{Form::open(array('url'=>'/jobmgt/workcreated'))}}
	<table>
		<tr>
			<td>งาน</td>
			<td>จำนวนคน</td>
			<td>จำนวนผู้หญิง</td>
			<td>คน</td>
		</tr>
		@for($i=0; $i<3; $i++)
		<tr>
			<td>{{$job[$i]}}</td>	
			<td>{{$user[$i]}}</td>	
			<td>{{$female[$i]}}</td>	
		</tr>
		@endfor
	</table>

	<br><br>
	<input type="submit" name="submit" value="ยืนยัน">

	{{Form::close()}}


</body>
</html>