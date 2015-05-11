<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	{{ HTML::style('css/bootstrap.css'); }}
  	{{ HTML::script('js/jquery.min.js'); }}
  	{{ HTML::script('js/bootstrap.min.js');}}
	<style>
		td{
			padding-right: 12px;
		}
	</style>
	<script>
		$(document).ready(function () {
			$('#addButton').click(function(){
		    	$('.container').append('<input type="text" name="someName[]" value="someNumber" />');
		    });
		});
	</script>
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
	<h4>เลือกและสร้างจำนวนงานที่ต้องการ</h4>

	<?php 
		$userleft = $user_count;
		$femaleleft = $female_count;
		$jobcount = 1;
	?>

	<h5>จำนวนงานทั้งหมด {{$jobcount}} งาน   เหลือคน {{$userleft}}/{{$user_count}} คน     เหลือผู้หญิง {{$femaleleft}}/{{$female_count}} คน</h5>
	{{Form::open(array('url'=>'/jobmgt/datechosen'))}}

	<table>
		<tr>
			<td>
				ชื่องาน
			</td>
			<td>
				จำนวนคน
			</td>
			<td>
				จำนวนผู้หญิง
			</td>
		</tr>
		<tr>
			<td><input type="text" name="user[]" id="user" placeholder="ชื่องาน"></td>
			<td><input type="ีหำพ" name="job[]" id="job" placeholder="จำนวนคน"></td>
			<td><input type="text" name="female[]" id="female" placeholder="จำนวนสตรี"></td>
		</tr>
		<tr>
			<td><input type="text" name="user[]" id="user" placeholder="ชื่องาน"></td>
			<td><input type="ีหำพ" name="job[]" id="job" placeholder="จำนวนคน"></td>
			<td><input type="text" name="female[]" id="female" placeholder="จำนวนสตรี"></td>
		</tr>
		<tr>
			<td><input type="text" name="user[]" id="user" placeholder="ชื่องาน"></td>
			<td><input type="ีหำพ" name="job[]" id="job" placeholder="จำนวนคน"></td>
			<td><input type="text" name="female[]" id="female" placeholder="จำนวนสตรี"></td>
		</tr>
		<tr>
			<td><input type="text" name="user[]" id="user" placeholder="ชื่องาน"></td>
			<td><input type="ีหำพ" name="job[]" id="job" placeholder="จำนวนคน"></td>
			<td><input type="text" name="female[]" id="female" placeholder="จำนวนสตรี"></td>
		</tr>
	</table>

	<button id="addrow">เพิ่มงาน</button>

	<br><br>
	<input type="submit" name="submit" value="รีบๆทำให้เสดเรว ยืนยันๆๆ">
	{{Form::close()}}

</body>
</html>