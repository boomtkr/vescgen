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

	<h4>กระดานหน้าทีล่าสุดเป็นของ  {{$latestdate}}  {{$latesttime}}</h4>
	<h4>เลือกวันที่และช่วงเวลาของการแบ่งงาน</h4>

	{{Form::open(array('url'=>'/jobmgt/datechosen'))}}
	<!-- ปุ่มเลือกวัน -->
	<select name="date">
	    <option value={{$today}}>{{$today}}</option>
	    <option value={{$tomorrow}}>{{$tomorrow}}</option>
	</select>

	<!-- ปุ่มเลือกเวลา -->
	<select name="time">
	    <option value="morning">morning</option>
	    <option value="afternoon">afternoon</option>
	    <option value="OT">OT</option>
	</select>

	<br><br>
	<input type="submit" name="submit" value="จะขอยืนยันยืนยัน ว่าจะรักเทอต่อไป">
	{{Form::close()}}

</body>
</html>