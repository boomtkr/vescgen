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
		<li style="display: inline; padding-right: 20px"><a href={{asset('updatepeople')}}>อัพเดทรายชื่อ</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('jobmgt')}}>แบ่งงาน</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('jobtoday')}}>กระดานหน้าที่วันนี้</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('tmrchange')}}>คนขึ้นลงพรุ่งนี้</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('dailyname')}}>รายชื่อรายวัน</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('allname')}}>รายชื่อทั้งหมด</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('dailyjob')}}>หน้าที่รายวัน</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('allwork')}}>หน้าที่ทั้งหมด</a></li>
	</ul>

	{{Form::open(array('url'=>'/addpeople/save'))}}
	<table>
		<tr>
			<td>รหัสประชาชน</td>
			<td>ชื่อจริง</td>
			<td>นามสกุล</td>
			<td>ชื่อเล่น</td>
			<td>ชั้นปี</td>
			<td>เพศ</td>
			<td>คณะ</td>
			<td>ภาค</td>
			<td>รหัสนิสิต</td>
			<td>เบอร์โทรติดต่อ</td>
			<td>วันเกิด</td>
			<td>str_lvl</td>
			<td>วันขึ้น</td>
			<td>วันลง</td>
		</tr>
		<tr>
			<td><input name="citizen_id" /></td>
			<td><input name="first_name" /></td>
			<td><input name="last_name" /></td>
			<td><input name="nickname" /></td>
			<td><input name="year" /></td>
			<td><input name="gender" /></td>
			<td><input name="faculty" /></td>
			<td><input name="dep" /></td>
			<td><input name="student_id" /></td>
			<td><input name="phone" /></td>
			<td><input name="birthday" /></td>
			<td><input name="str_lvl" /></td>
			<td><input name="date_in" /></td>
			<td><input name="date_out" /></td>
		</tr>
	</table>
	<input type="submit" name="submit" value="ยืนยัน"></input>
	{{Form::close()}}

</body>
</html>