
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	{{ HTML::style('css/bootstrap.css'); }}
	{{ HTML::script('js/jquery.min.js'); }}
	{{ HTML::script('js/bootstrap.min.js');}}
	
</head>

</html>
@extends('home/main')

@section('content')
<style type="text/css">
	.form-group{
		padding:0px;
	}
	.col-xs-4{
		padding-right: 0px; padding-left: 0px;
	}
	.chosen-container{
		border-radius:0px 5px 0px 0px;
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
							<h3>เลือกวันที่และช่วงเวลา < <strong>กรอกงานและจำนวนคน</strong> <div class="btn-group">
								<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-angle-left"></i> <strong>กลับ</strong></span></a>
								
							</div></h3> {{-- <h4>กระดานหน้าล่าสุด วันที่ {{$latestdate}} ช่วง {{$latesttime}}</h4> --}}
							<hr>
							<h4 style="margin-left:20px">แบ่งหน้าที่ของวันที่  {{$timerecord->date}}  ช่วงเวลา {{$timerecord->time}}</h4>
							<?php 
							$userleft = $user_count;
							$femaleleft = $female_count;
							$jobcount = 1;
							?>
						</div>
						{{Form::open(array('url'=>'/jobmgt/workcreated','id'=>'form-validation','method'=>'post'))}}
						
						<div class="col-xs-3">
							<div class="col-xs-12">
								<!-- Widget -->
								<a href="page_ready_article.html" class="widget widget-hover-effect1 block" style=" padding-right: 0px; padding-top: 0px; padding-left: 0px; ">
									<div class="widget-simple" style=" padding-bottom: 0px; padding-top: 10px; ">
										<div class="widget-icon pull-left themed-background-default animation-fadeIn" style=" margin-top: 8px; ">
											<i class="fa fa-list-alt"></i>
										</div>
										<h3 class="widget-content text-right animation-pullDown" style="font-size:40px;margin-top: 0px;">
											<strong id="remaining-job">{{$jobcount}}</strong><br>
											<small id="all-job">{{--$jobcount--}}5</small>
											<small>จำนวนงานทั้งหมด</small>
										</h3>
									</div>
								</a>
								<!-- END Widget -->
								
							</div>	
							<div class="col-xs-12">
								<!-- Widget -->
								<a href="#" class="widget widget-hover-effect1 block" style=" padding-right: 0px; padding-top: 0px; padding-left: 0px; ">
									<div class="widget-simple" style=" padding-bottom: 0px; padding-top: 10px; ">
										<div class="widget-icon pull-left themed-background-flatie animation-fadeIn" style=" margin-top: 8px; ">
											<i class="gi gi-group"></i>
										</div>
										<h3 class="widget-content text-right animation-pullDown" style="font-size:40px;margin-top: 0px;">
											<strong id="remaining-user">{{$userleft}}</strong><br>
											<small id="all-user">{{$user_count}}</small>
											<small>จำนวนคน</small>
										</h3>
									</div>
								</a>
								<!-- END Widget -->
								
							</div>	
							<div class="col-xs-12">
								<!-- Widget -->
								<a href="#" class="widget widget-hover-effect1 block" style=" padding-right: 0px; padding-top: 0px; padding-left: 0px; ">
									<div class="widget-simple" style=" padding-bottom: 0px; padding-top: 10px; ">
										<div class="widget-icon pull-left themed-background-coral animation-fadeIn" style=" margin-top: 8px; ">
											<i class="gi gi-woman"></i>
										</div>
										<h3 class="widget-content text-right animation-pullDown" style="font-size:40px;margin-top: 0px;">
											<strong id="remaining-female">{{$femaleleft}}</strong><br>
											<small id="all-female">{{$female_count}}</small>
											<small>จำนวนผู้หญิง</small>
										</h3>
									</div>
								</a>
								<!-- END Widget -->
							</div>	
						</div>
						<div class="col-xs-6 input-container">
							<div class="row">
								<div class="col-xs-4">
									<div class="form-group">
										<div class="col-xs-12">
											<select id="example-chosen" name="job[]" class="form-control select-work" data-placeholder="งาน" style="width: 250px;" >
												@foreach($worklist as $work)
												<option value={{$work->work_name}} >{{$work->work_name}}</option >
													@endforeach
												</select>
												
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<div class="form-group">
											<div class="col-xs-12">
												<div class="input-group">
													<span class="input-group-addon" style="padding-right: 6px; padding-left: 6px;"><i class="gi gi-group"></i></span>
													<input type="text" id="example-input1-group1" name="user[]" class="form-control count-user" placeholder="จำนวนคน">
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<div class="form-group">
											<div class="col-xs-12">
												<div class="input-group">
													<span class="input-group-addon" style="padding-right: 6px; padding-left: 6px;"><i class="gi gi-woman"></i></span>
													<input type="text" id="example-input1-group1" name="female[]" class="form-control count-female" placeholder="จำนวนผู้หญิง">
												</div>
											</div>
										</div>
									</div>
									
								</div>

							</div>
							<div class="col-xs-3">
								<div class="col-xs-12" style="margin-bottom:10px">
									<button type="button" class="btn btn-primary input-add" style="border-radius:25px"><strong>+</strong></button>
									<button type="button" class="btn btn-danger input-remove" style="border-radius:25px"><strong>-</strong></button>
								</div>
								<div class="col-xs-12" style="margin-bottom:10px">
									<button class="btn btn-lg btn-default" onclick="calculate();" type="button">Calculate</button>
								</div>
								<div class="col-xs-12" style="margin-bottom:10px">
									<button class="btn btn-lg btn-warning" onclick="reset();" type="reset">Reset</button>
								</div>
								<div class="col-xs-12" style="margin-bottom:10px">
									<button type="submit" name='submit' class="btn btn-lg btn-primary"><i class="fa fa-angle-right"></i> ต่อไป</button>			
								</div>
							</div>
							<input type='hidden' name='timerecord' value={{json_encode($timerecord)}}></input> 
							<input type='hidden' name='jobhis' value={{json_encode($jobhis)}}></input> 
							{{Form::close()}}
							
						</div>
					</div>
					<!-- END Widget Main -->
				</div>
			</div>
			<!-- END Advanced Theme Color Widget Alternative -->
		</div>

	</div>

	<script type="text/javascript">
		

function calculate(){
	var empty = 0;
	var err_numeric = 0;
	$('.count-user').each(function(){
		if($(this).val()==null || $(this).val() ==''){
			empty=1;
		}
		if(isNaN($(this).val())){
			err_numeric=1;
		}
	});
	$('.count-female').each(function(){
		if($(this).val()==null || $(this).val() ==''){
			empty=1;
		}
		if(isNaN($(this).val())){
			err_numeric=1;
		}
	});
	if(empty){
		alert('ใส่จำนวนคนกับผู้หญิงให้ครบๆทุกช่องได้ม้ะ');
	} else {
		if(err_numeric==0){
			sum();
		} else {
			alert('ใส่ตัวเลขสิเฟ่ย');
		}
	}
}

function sum(){
	var sum_user=0;
	var sum_female =0;
	$('.count-user').each(function(){
		sum_user = sum_user + parseInt($(this).val());
	});
	$('.count-female').each(function(){
		sum_female= sum_female + parseInt($(this).val());
	});

	var user = parseInt($('#all-user').text());
	var female = parseInt($('#all-female').text());

	user = user - sum_user;
	female = female - sum_female;

	$('#remaining-user').html(user);
	$('#remaining-female').html(female);
}

var test = "<div class='row added-row'><div class='col-xs-4'><div class='form-group'><div class='col-xs-12'><select id='example-chosen' name='job[]' class='form-control select-work' data-placeholder='งาน' style='width: 250px;' >@foreach($worklist as $work)<option value={{$work->work_name}} >{{$work->work_name}}</option>@endforeach</select></div></div></div><div class='col-xs-4'><div class='form-group'><div class='col-xs-12'><div class='input-group'><span class='input-group-addon' style='padding-right: 6px; padding-left: 6px;'><i class='gi gi-group'></i></span><input type='text' id='example-input1-group1' name='user[]' class='form-control count-user' placeholder='จำนวนคน'></div></div></div></div><div class='col-xs-4'><div class='form-group'><div class='col-xs-12'><div class='input-group'><span class='input-group-addon' style='padding-right: 6px; padding-left: 6px;'><i class='gi gi-woman'></i></span><input type='text' id='example-input1-group1' name='female[]' class='form-control count-female' placeholder='จำนวนผู้หญิง'></div></div></div></div><div class='col-xs-3'></div></div>";
$(".input-add").click(function(){
	var jobcount = parseInt($("#remaining-job").text());
	if(jobcount < parseInt($("#all-job").text())){
		$(".input-container").append(test);
		// alert(jobcount);
		jobcount = jobcount+1;
		$('#remaining-job').html(jobcount);
	}
});
$(".input-remove").click(function(){
		var jobcount = parseInt($("#remaining-job").text());
		$(".added-row:last").remove();
		jobcount = jobcount-1;
		$('#remaining-job').html(jobcount);
});



</script>
<!-- Load and execute javascript code used only in this page -->
{{ HTML::script('proui/js/pages/formsValidation.js'); }}

<script>$(function(){ FormsValidation.init(); });</script>

@stop