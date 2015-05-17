
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
	.alert #isEmpty,#isFemale,#isNumeric,#isDuplicate{
		font-size: 16px;
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
								<a href="#" class="widget widget-hover-effect1 block" style=" padding-right: 0px; padding-top: 0px; padding-left: 0px; ">
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
											<small>จำนวนน้องผู้หญิง</small>
										</h3>
									</div>
								</a>
								<!-- END Widget -->
							</div>	
						</div>
						<div class="col-xs-6 input-container">
							<div class="row">
								<div class="col-xs-4">
									<h4 class="text-center">งาน</h4>
								</div>
								<div class="col-xs-4">
									<h4 class="text-center">จำนวนคน</h4>
								</div>
								<div class="col-xs-4">
									<h4 class="text-center">จำนวนน้องผู้หญิง</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<div class="form-group">
										<div class="col-xs-12">
											<select id="work-chosen" name="job[]" class="form-control select-work" data-placeholder="งาน" style="width: 250px;" >
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
													<input type="text" id="example-input1-group1" name="user[]" class="form-control count-user" value="1">
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<div class="form-group">
											<div class="col-xs-12">
												<div class="input-group">
													<span class="input-group-addon" style="padding-right: 6px; padding-left: 6px;"><i class="gi gi-woman"></i></span>
													<input type="text" id="example-input1-group1" name="female[]" class="form-control count-female" value="0">
												</div>
											</div>
										</div>
									</div>
									
								</div>

							</div>
							<div class="col-xs-3">
								<div class="alert alert-warning alert-dismissable">
                                        {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> --}}
                                        <h4><i class="fa fa-exclamation-circle"></i> Warning</h4>
                                    </div>
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
									<button id="submit-button" type="button" name='submit' onclick="isCal();" class="btn btn-lg btn-primary"><i class="fa fa-angle-right"></i> ต่อไป</button>			
								</div>
								<div class="col-xs-12">
									<span style="color:red">*กด Calculate ทุกครั้งก่อนกดปุ่มต่อไป</span>
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
		var cal = 0;
		var work = [];
		var user = [];
		var female = [];
		$('.alert').hide();
		$('#isEmpty').hide();
		$('#isNumeric').hide();
		$('#isFemale').hide();
		$('#isDuplicate').hide();
		function isCal(){
			if(!cal){
				alert('กด Calculate เซ็คจำนวนคนก่อนน้าาาาา');
			} 

		}
		function calculate(){
			var duplicatework = 0;
			var empty = 0;
			var err_numeric = 0;
			var err_female =0;
			var work = [];
			var user = [];
			var female = [];
			var i =0;
			$('.count-user').each(function(){
		user[i] = $(this).val(); // get value form each user input.
		i++;

		//check each is empty.
		if($(this).val()==null || $(this).val() ==''){
			empty=1;
		}
		//check each is numeric.
		if(isNaN($(this).val())){
			err_numeric=1;
		}
	});
			i=0;
			$('.count-female').each(function(){
		female[i] = $(this).val(); // get value from each female input.
		i++;

		//check each is empty.
		if($(this).val()==null || $(this).val() ==''){
			empty=1;
		}
		//check each is numeric.
		if(isNaN($(this).val())){
			err_numeric=1;
		}
	});

	//check each row, number of female must be equal to and less than number of user.
	for(i=0;i<user.length;i++){
		if(user[i]<female[i]) err_female=1;
	}

	i=0;
	//check duplicate work
	$('.select-work').each(function(){
		work[i] = $(this).val();
			// alert(work[i]+' '+$(this).val()+' '+i);
			i++;
		});

	for(i=0;i<work.length;i++){
		for(j=i;j<work.length;j++){
			if(work[i]===work[j] && i!=j){
				duplicatework=1;
					// alert(work[i]+' = '+work[j]);
				}
			}
		}
		
		if(empty||err_numeric||err_female||duplicatework){
			$('.alert').show();
			// $('br').remove();
		}
		if(empty){
			$('#isEmpty').show();
			if(!$('.alert').find('#isEmpty').length) $('.alert').append('<p id="isEmpty">- กรอกทุกช่องให้ครบด้วย</p>');
		} else {
			$('#isEmpty').hide();
		}
		if(err_numeric){
			$('#isNumeric').show();
			if(!$('.alert').find('#isNumeric').length) $('.alert').append('<p id="isNumeric">- ใส่ตัวเลขขขขขขขขขขข</p>');
		} else {
			$('#isNumeric').hide();
		}
		if(err_female){
			$('#isFemale').show();
			if(!$('.alert').find('#isFemale').length) $('.alert').append('<p id="isFemale">- จำนวนผู้หญิงต้องน้อยกว่าหรือเท่ากับจำนวนคนในแต่ละงาน</p>');
		} else {
			$('#isFemale').hide();
		}
		if (duplicatework) {
			$('#isDuplicate').show();
			if(!$('.alert').find('#isDuplicate').length) $('.alert').append('<p id="isDuplicate">- งานซ้ำ!!!!</p>');
		} else {
			$('#isDuplicate').hide();
		}
		if(!empty && !err_numeric && !duplicatework && !err_female){
			sum();
			cal=1;
			
			$('.alert').hide();
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

		
		if(user < 0) {
			$('#remaining-user').attr('style','color:red');
			$('#remaining-user').html(user);
		} else {
			$('#remaining-user').removeAttr('style');
			$('#remaining-user').html(user);
		}
		if(female < 0) {
			$('#remaining-female').attr('style','color:red');
			$('#remaining-female').html(female);	
		} else {
			$('#remaining-female').removeAttr('style');
			$('#remaining-female').html(female);
		}
		if(user > 0 && female >=0 ){
			$("#submit-button").attr("type","submit");

		}
	}

	var test = "<div class='row added-row'><div class='col-xs-4'><div class='form-group'><div class='col-xs-12'><select id='work-chosen' name='job[]' class='form-control select-work' data-placeholder='งาน' style='width: 250px;' >@foreach($worklist as $work)<option value={{$work->work_name}} >{{$work->work_name}}</option>@endforeach</select></div></div></div><div class='col-xs-4'><div class='form-group'><div class='col-xs-12'><div class='input-group'><span class='input-group-addon' style='padding-right: 6px; padding-left: 6px;'><i class='gi gi-group'></i></span><input type='text' id='example-input1-group1' name='user[]' class='form-control count-user' value='1'></div></div></div></div><div class='col-xs-4'><div class='form-group'><div class='col-xs-12'><div class='input-group'><span class='input-group-addon' style='padding-right: 6px; padding-left: 6px;'><i class='gi gi-woman'></i></span><input type='text' id='example-input1-group1' name='female[]' class='form-control count-female' value='0'></div></div></div></div><div class='col-xs-3'></div></div>";
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
		if(jobcount >1){
			$(".added-row:last").remove();
			jobcount = jobcount-1;
			$('#remaining-job').html(jobcount);
		}
	});
	</script>
<!-- Load and execute javascript code used only in this page -->
{{ HTML::script('proui/js/pages/formsValidation.js'); }}

<script>$(function(){ FormsValidation.init(); });</script>

@stop