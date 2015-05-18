
@extends('home/main')
@section('content')

<style type="text/css">
	td{
		font-size: 18px;
	}
</style>
<div class="row edpensook">
	<div class="col-xs-12">
		<div class="widget">
			<div class="widget-advanced widget-advanced-alt">

				<!-- Widget Header -->
				<div class="widget-simple text-center themed-background-emerald">

					<h2 class="widget-content-light edpensook animation-pullDown">
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
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%"></div>
							</div>
											<h3>เลือกวันที่และช่วงเวลา < กรอกงานและจำนวนคน < <strong>เลือกซีเนียร์รับผิดชอบแต่ละงาน</strong> {{-- <div class="btn-group">
											<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-angle-left"></i> <strong>กลับ</strong></span></a>
											
										</div> --}}</h3>  {{-- <h4>กระดานหน้าล่าสุด วันที่ {{$latestdate}} ช่วง {{$latesttime}}</h4> --}}
										<hr>
										<h4 style="margin-left:20px">แบ่งหน้าที่ของวันที่  {{$timerecord->date}}  ช่วงเวลา {{$timerecord->time}}</h4>
										<?php 
										$userleft = $user_count;
										$seniorleft= $senior_count;
										$jobcount = 1;
										?>
									</div>
									{{Form::open(array('url'=>'/jobmgt/workrandom','id'=>'form-validation','method'=>'post'))}}
									
									<div class="col-xs-3">
										<div class="col-xs-12">
											<!-- Widget -->
											<a href="#" class="widget widget-hover-effect1 block" style=" padding-right: 0px; padding-top: 0px; padding-left: 0px; ">
												<div class="widget-simple" style=" padding-bottom: 0px; padding-top: 10px; ">
													<div class="widget-icon pull-left themed-background-default animation-fadeIn" style=" margin-top: 8px; ">
														<i class="fa fa-list-alt"></i>
													</div>
													<h3 class="widget-content text-right animation-pullDown" style="font-size:40px;margin-top: 0px;">
														<strong id="remaining-user">{{count($job)}}</strong><br>
														<small>{{$jobcount}}</small>
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
														<i class="gi gi-crown"></i>
													</div>
													<h3 class="widget-content text-right animation-pullDown" style="font-size:40px;margin-top: 0px;">
														<strong id="remaining-senior">{{$seniorleft}}</strong><br>
														<small id="all-senior">{{$senior_count}}</small>
														<small>จำนวนซีเนียร​์</small>
													</h3>
												</div>
											</a>
											<!-- END Widget -->
											
										</div>	
										
									</div>
									<div class="col-xs-7">
										<div class="table-responsive" style="padding-bottom:100px">
											
											<table class="table table-vcenter table-striped table-bordered" >
												<thead >
													<tr>
														<th width="13%">งาน</th>
														<th width="8%" class="text-center">คน</th>
														<th width="8%" class="text-center">ผญ</th>
														<th>เลือกซีเนียร์เข้าใจปะ</th>
														<th>อยากเลือกน้องคนไหนก็เลือกเลย</th>
													</tr>

												</thead>
												<tbody>
													@for($i=0; $i<count($job); $i++)
													<tr>
														<td>{{$job[$i]}}</td>	
														<td class="text-center">{{$user[$i]}}</td>	
														<td class="text-center">{{$female[$i]}}</td>
														<td>
															<select id="select-senior" name='senior_namelist[]' class="select-chosen " data-placeholder="จิ้มเลือกซีเนียร์มาสักคน" style="width: 250px;" multiple>
																@foreach($senior as $person)
																	<option value='{{$person->id}}{{'.'}}{{$i}}'>{{$person->nickname.'#'.$person->year}}</option>
																@endforeach
															</select>
														</td>
														<td>
															<select id="example-chosen-multiple" name="nonsenior_namelist[]" class="select-chosen" data-placeholder="จิ้มเลือกน้องมาสักคนดิ" style="width: 250px;" multiple>
																@foreach($nonsenior as $person)
																	<option value='{{$person->id}}{{'.'}}{{$i}}'>{{$person->nickname.'#'.$person->year}}</option>
																@endforeach
															</select>
														</td>
													</tr>
													@endfor
													
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-xs-2">
										<div class="col-xs-12" style="margin-bottom:10px">
											<button type="button" name='submit' onclick="countSenior();" class="btn btn-lg btn-default">Calculate</button>			
										</div>
										<div class="col-xs-12" style="margin-bottom:10px">
											<button id="submit-button" onclick="isCal();" type="button" name='submit' class="btn btn-lg btn-primary"><i class="fa fa-angle-right"></i> ต่อไป</button>			
										</div>
									</div>
									<input type='hidden' name='user' value={{json_encode($user)}}></input> 
									<input type='hidden' name='job' value={{json_encode($job)}}></input> 
									<input type='hidden' name='female' value={{json_encode($female)}}></input> 
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
	function isCal(){
		if(cal){
			$('#submit-button').attr('type','submit');
		} else {
			// alert('s');
		}
	}
	function countSenior(){
		var count_senior = 0;
		var all_senior = parseInt($('#all-senior').text());
		$('.search-choice').each(function(){
			
			var nameyear = $(this).find('span').text();
			var year = nameyear.substring(nameyear.length-1);
			if(year=='4'){
				count_senior = count_senior +1;
			}
		});
		// alert(count_senior)
		var remaining_senior = all_senior - count_senior;
		if(remaining_senior>=0){
			if(remaining_senior==0){
				$('#remaining-senior').removeAttr('style');
				$('#remaining-senior').html(remaining_senior);
				cal=1;
			} else {
				$('#remaining-senior').removeAttr('style');
				$('#remaining-senior').html(remaining_senior);
				alert('ยังเหลือซีเนียร์ที่ยังไม่ได้เลือกงาน');
			}
		} else {
			$('#remaining-senior').attr('style','color:red');
			$('#remaining-senior').html(remaining_senior);
		}
		
	}
	

	
</script>
			@stop
