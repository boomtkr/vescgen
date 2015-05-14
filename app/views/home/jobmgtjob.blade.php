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
	{{Form::open(array('url'=>'/jobmgt/workcreated'))}}

	<table id="inputTable">
	  <tbody>
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
			<td><input type="text" name="job[]" id="job" placeholder="ชื่องาน"></td>
			<td><input type="text" name="user[]" id="user" placeholder="จำนวนคน"></td>
			<td><input type="text" name="female[]" id="female" placeholder="จำนวนสตรี"></td>
		</tr>
		<tr>
			<td><input type="text" name="job[]" id="job" placeholder="ชื่องาน"></td>
			<td><input type="text" name="user[]" id="user" placeholder="จำนวนคน"></td>
			<td><input type="text" name="female[]" id="female" placeholder="จำนวนสตรี"></td>
		</tr>
		<tr>
			<td><input type="text" name="job[]" id="job" placeholder="ชื่องาน"></td>
			<td><input type="text" name="user[]" id="user" placeholder="จำนวนคน"></td>
			<td><input type="text" name="female[]" id="female" placeholder="จำนวนสตรี"></td>
		</tr>
		<tr>
			<td><input type="text" name="job[]" id="job" placeholder="ชื่องาน"></td>
			<td><input type="text" name="user[]" id="user" placeholder="จำนวนคน"></td>
			<td><input type="text" name="female[]" id="female" placeholder="จำนวนสตรี"></td>
		</tr>
	  </tbody>
	</table>

	<div onclick="addRow()" style="width: 100px; height: 30px; background:red;">เพิ่มงาน</div>


	<input type='hidden' name='timerecord' value={{json_encode($timerecord)}}></input> 
	<input type='hidden' name='jobhis' value={{json_encode($jobhis)}}></input> 

	<br><br>
	<input type="submit" name="submit" value="รีบๆทำให้เสดเรว ยืนยันๆๆ">
	{{Form::close()}}

</body>
</html>
@extends('home/main')

				@section('content')
<style type="text/css">
	.form-group{
		padding:0px;
	}
	.col-xs-3{
		padding-right: 0px; padding-left: 0px;
	}
</style>
				<div class="row edpensook">
					<div class="col-xs-12">
						<div class="widget">
							<div class="widget-advanced widget-advanced-alt">

								<!-- Widget Header -->
								<div class="widget-simple text-center themed-background-emerald">


									<h2 class="widget-content-light edpensook">
										<i class="gi gi-ax"></i> แบ่งงาน<br>
										<small> &nbsp;</small>
									</h2>
								
								</div>
								<!-- END Widget Header -->

								<!-- Widget Main -->
								<div class="widget-main">
									<div class="row">

										<div class="col-xs-12">

											<div class="progress progress-striped active">
                                        		<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%"></div>
                                    		</div>
											<h3><strong>กรอกงานและจำนวนคน</strong></h3> {{-- <h4>กระดานหน้าล่าสุด วันที่ {{$latestdate}} ช่วง {{$latesttime}}</h4> --}}
											<hr>

										</div>
										<div class="col-xs-9 input-container">
											
											<div class="col-xs-3">
												<div class="form-group">
                                            		<div class="col-xs-12">
                                                		<div class="input-group">
                                                    		<span class="input-group-addon" style="padding-right: 6px; padding-left: 6px;"><i class="gi gi-ax"></i></span>
                                                    		<input type="text" id="example-input1-group1" name="job[]" class="form-control" placeholder="งาน">
                                                		</div>
                                            		</div>
                                        		</div>
											</div>
											<div class="col-xs-3">
												<div class="form-group">
                                            		<div class="col-xs-12">
                                                		<div class="input-group">
                                                    		<span class="input-group-addon" style="padding-right: 6px; padding-left: 6px;"><i class="gi gi-group"></i></span>
                                                    		<input type="text" id="example-input1-group1" name="user[]" class="form-control" placeholder="จำนวนคน">
                                                		</div>
                                            		</div>
                                        		</div>
											</div>
											<div class="col-xs-3">
												<div class="form-group">
                                            		<div class="col-xs-12">
                                                		<div class="input-group">
                                                    		<span class="input-group-addon" style="padding-right: 6px; padding-left: 6px;"><i class="gi gi-woman"></i></span>
                                                    		<input type="text" id="example-input1-group1" name="female[]" class="form-control" placeholder="จำนวนผู้หญิง">
                                                		</div>
                                            		</div>
                                        		</div>
											</div>
											<div class="col-xs-3">
												<button class="btn btn-primary input-add" style="border-radius:25px"><strong>+</strong></button>
											</div>
										</div>
										<div class="col-xs-3">
											<div class="col-xs-1">
												
											</div>
											<div class="col-xs-11">
												<p>sdsd</p>
											</div>
										</div>
									</div>
								</div>
								<!-- END Widget Main -->
							</div>
						</div>
						<!-- END Advanced Theme Color Widget Alternative -->
					</div>

				</div>
	<script type="text/javascript">
		var test = "<div class='col-xs-3'><div class='form-group'><div class='col-xs-12'><div class='input-group'><span class='input-group-addon' style='padding-right: 6px; padding-left: 6px;'><i class='gi gi-ax'></i></span><input type='text' id='example-input1-group1' name='job[]' class='form-control' placeholder='งาน'></div></div></div></div><div class='col-xs-3'><div class='form-group'><div class='col-xs-12'><div class='input-group'><span class='input-group-addon' style='padding-right: 6px; padding-left: 6px;'><i class='gi gi-group'></i></span><input type='text' id='example-input1-group1' name='user[]' class='form-control' placeholder='จำนวนคน'></div></div></div></div><div class='col-xs-3'><div class='form-group'><div class='col-xs-12'><div class='input-group'><span class='input-group-addon' style='padding-right: 6px; padding-left: 6px;'><i class='gi gi-woman'></i></span><input type='text' id='example-input1-group1' name='female[]' class='form-control' placeholder='จำนวนผู้หญิง'></div></div></div></div>";
		$(".input-add").click(function(){
			
		    $(".input-container").append(test);
		});
	</script>


			@stop