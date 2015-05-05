<html>
<head>
	<meta charset="utf-8">
    {{ HTML::style('css/bootstrap.css'); }}
    {{ HTML::style('css/bootstrap.min.css'); }}
    {{ HTML::style('css/bootstrap-theme.css'); }}
    {{ HTML::style('css/bootstrap-theme.min.css'); }}
    {{ HTML::style('js/bootstrap.js');}}
    {{ HTML::script('js/bootstrap.min.js');}}
    <style>
    	td {
    		padding-right: 40px;
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

	<table style="margin-left:20px;">
		<tr>
			<td>{{"id"}}</td>
			<td>{{"work_name"}}</td>
			<td>{{'location'}}</td>
			<td>{{'work_lvl'}}</td>
			</tr>
		@foreach($works as $work)
			<tr>
				<td>{{$work->id}}</td>
				<td>{{$work->work_name}}</td>
				<td>{{$work->location}}</td>
				<td>{{$work->work_lvl}}</td>
			</tr>
		@endforeach
	</table>
</body>