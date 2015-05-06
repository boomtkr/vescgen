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

    {{ Form::open(array('url' => 'person/'.$person->id.'/update')) }}
		<input type="text" name="first_name" value={{$person->first_name}}><br>
		<input type="text" name="last_name" value={{$person->last_name}}><br>
		<input type="text" name="nickname" value={{$person->nickname}}><br>
		<input type="text" name="faculty" value={{$person->faculty}}><br>
		<input type="text" name="dep" value={{$person->dep}}><br>
		<input type="text" name="year" value={{$person->year}}><br>
		<input type="text" name="gender" value={{$person->gender}}><br>
		<input type="text" name="student_id" value={{$person->student_id}}><br>
		<input type="text" name="citizen_id" value={{$person->citizen_id}}><br>
		<input type="text" name="phone" value={{$person->phone}}><br>
		<input type="text" name="birthday" value={{$person->birthday}}><br>
		<input type="text" name="str_lvl" value={{$person->str_lvl}}><br>
	    <input type="submit" value="Change Submit">
	{{ Form::close() }}           

	<h4>หน้าที่ย้อนหลัง 5 วัน</h4>
	<?php $count = count($datehistory) ?>
	<table>
	@for($i=0; $i<$count; $i++)
		<tr>
			<td>{{$datehistory[$i]}}</td>
			<td>{{$timehistory[$i]}}</td>
			<td>{{$jobhistory[$i]}}</td>
		</tr>
	@endfor
	</table>	
</body>
</html>
