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
	<a href={{asset('addpeople')}}>เพิ่มคน</a>

</body>
</html>

@extends('home/main')

@section('content')
<style type="text/css">
	td{
		font-size: 16px;
	}
	.form-group{
		margin-bottom: 0px;
	}
	.help-block{
		font-size: 8px;
	}
	
</style>
<div class="row edpensook">
	<div class="col-xs-12">
		<div class="widget">
			<div class="widget-advanced widget-advanced-alt">

				<!-- Widget Header -->
				<div class="widget-simple text-center themed-background-autumn">


					<h2 class="widget-content-light edpensook animation-pullDown">
						<i class="fa fa-list-alt sidebar-nav-icon"></i> อัพเดตรายชื่อ<br>
						
					</h2>
					
				</div>
				<!-- END Widget Header -->
				
				<!-- Widget Main -->
				<div class="widget-main">
					<div class="row">   
						

						

					</div>
					<!-- END Widget Main -->
					
				</div>
			</div>
			<!-- END Advanced Theme Color Widget Alternative -->
		</div>

	</div>
	

@stop