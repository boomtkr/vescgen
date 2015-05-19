<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	{{ HTML::style('css/bootstrap.css'); }}
  	{{ HTML::script('js/jquery.min.js'); }}
  	{{ HTML::script('js/bootstrap.min.js');}}
	<style>
		td{
			padding-right: 20px;
		}
	</style>
</head>

</html>
	@extends('home/main')

	@section('content')
	<style type="text/css">
		td{
			font-size: 16px;
		}
	</style>
	<div class="row edpensook">
		<div class="col-xs-12">
			<div class="widget">
				<div class="widget-advanced widget-advanced-alt">
					<!-- Widget Header -->
					<div class="widget-simple text-center themed-background-amethyst">
						<h2 class="widget-content-light  edpensook animation-pullDown">
							<i class="gi gi-sorting"></i> คนขึ้นลงพรุ่งนี้<br>
							{{-- <h4 class="edpensook" style="color:white;"></h4> --}}		
							<h4 class="edpensook" style="color:white;">&nbsp;</h4>
					</div>
					<!-- END Widget Header -->
					<div class="widget-main">
						<div class="row">
							<div class="col-xs-4" style="margin-bottom:15px">
								<div class="list-group remove-margin">
									<a href="javascript:void(0)" class="list-group-item">
										<span class="pull-right"><strong>{{$ppltodaycount}}</strong></span>
										<h4 class="list-group-item-heading remove-margin"><i class="fa fa-users"></i>&nbsp;&nbsp; จำนวนคนวันนี้</h4>
									</a>
								</div>
							</div>
							<div class="col-xs-4" style="margin-bottom:15px">
								<div class="list-group remove-margin">
									<a href="javascript:void(0)" class="list-group-item">
										<span class="pull-right"><strong>{{$today}}</strong></span>
										<h4 class="list-group-item-heading remove-margin"><i class="fa fa-users"></i>&nbsp;&nbsp; วันนี้</h4>
									</a>
								</div>
							</div>
							<div class="col-xs-4" style="margin-bottom:15px">
								<div class="list-group remove-margin">
									<a href="javascript:void(0)" class="list-group-item">
										<span class="pull-right"><strong>{{$tomorrow}}</strong></span>
										<h4 class="list-group-item-heading remove-margin"><i class="fa fa-users"></i>&nbsp;&nbsp; พรุ่งนี้</h4>
									</a>
								</div>
							</div>
							<?php 
								$pplincount = count($pplinlist);
								$pploutcount = count($pploutlist);
							?>
							<div class="col-xs-6">
								<!-- Your Plan Widget -->
								<div class="widget">
									<div class="widget-extra themed-background-default">
										<h3 class="widget-content-light">
											&nbsp;<i class="gi gi-user_add"></i> คนขึ้น {{$pplincount}} คน
										</h3>
										<div class="pull-right" style="margin-top:-50px">
											<div class="btn-group">
												<a href={{asset('tmrchange/add/arrive')}} class="btn btn-default"><strong>เพิ่ม</strong></a>
											</div>
										</div>
									</div>
									<div class="widget-extra-full">
										
										<div class="block" style="padding-bottom:50px">
													
											   		<h3 class="text-center" style=" margin-top: 0px; "><strong>เพิ่มคนขึ้น</strong></h3>

				                                    <div class="progress progress-striped active">
				                                        
				                                        <div class="progress-bar progress-bar-success edpensook" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">เลือกคน</div>
				                                        <div class="progress-bar progress-bar-warning edpensook" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">ยืนยันวันที่</div>
				                                    </div>
				                                    <h3>เลื่อนกำหนดการขึ้น-ลงของ <strong>{{$person->nickname}}{{"#"}}{{$person->year}}</strong></h3>
				                                    <hr>
				                                    <div class="row">
				                                    	@if($mancount != 0)
				                                    	<div class="col-xs-5">
																<h4><strong>วันขึ้น</strong> : {{$manhis->date_in}}</h4>
																<h4><strong>วันลง</strong> : {{$manhis->date_out}}</h4>
				                                    	</div>
				                                    	{{Form::open(array('url'=>'/tmrchange/add/arrive/update/'.$person->id.'/edit'))}}
				                                    	<div class="col-xs-5">
											    			<button class="btn btn-success" type="submit" value="ยืนยัน" style=" margin-top: 12px; ">เลื่อนวันขึ้นเป็นพรุ่งนี้</button>
				                                    	</div>
				                                    	
				                                    	{{Form::close()}}

											    			@endif
											    			@if($mancount == 0)
																<h5 class="text-center">-  ยังไม่มีกำหนดการขึ้นลงของครั้งต่อไป  -</h5>
															@endif
				                                    </div>
				                                    
													
									    			
													<br>
									    			<BR>
									    			{{Form::open(array('url'=>'/tmrchange/add/arrive/update/'.$person->id.'/new'))}}
									    			<h3>เพิ่มกำหนดการขึ้น-ลงของ <strong>{{$person->nickname}}{{"#"}}{{$person->year}}</strong></h3>
									    			<hr>
									    			<div class="row" style=" margin-bottom: 10px; ">
									    				<div class="form-group">
				                                            <label class="col-xs-3 control-label edpensook" for="example-text-input" style=" padding-top: 6px; font-size:16px">เลือกวันลง</label>
				                                            <div class="col-xs-5">
				                                           		{{-- <span class="help-block">กำหนดวันขึ้นเป็นวันพรุ่งนี้</span> --}}
				                                            	<input type="date" id="example-datepicker2" name="newdateout" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" onchange="checkDate(this.value);">
				                                            	<span class="help-block edpensook">*ต้องลงก่อนวันขึ้นของรอบถัดไป</span>
				                                                
				                                            </div>
				                                            <div class="col-xs-4">
				                                            	<button class="btn btn-success" type="submit" value="ยันยืน">ยืนยัน</button>
				                                            </div>
				                                            
			                                        	</div>
									    			</div>
									    			
									    			{{Form::close()}}

			                                        
									   				
									   				<a href={{asset('tmrchange')}} class="pull-right"><button class="btn btn-default" type="button">ปิด</button></a>
											    	
											  
										</div>
										 
										<div class="table-responsive">
											<table class="table table-vcenter table-striped">
												<tbody>
													<?php $i=1; ?>
													@foreach($pplinlist as $ppl)
													<tr>
														<td>{{$i}}</td>
														<td>
															<a href={{asset('person/'.$ppl->id)}}>{{$ppl->nickname}}{{'#'}}{{$ppl->year}}</a>
														</td>
														<td>
															<a href={{asset('tmrchange/postpone/arrive/'.$ppl->id)}}><button class="btn btn-warning btn-md"><i class="fa fa-angle-double-right"></i> เลื่อน</button></a>
														</td>
														
														<?php $i++; ?>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- END Your Plan Widget -->
							</div>
							<div class="col-xs-6">
								<!-- Your Plan Widget -->
								<div class="widget">
									<div class="widget-extra themed-background-night">
										<h3 class="widget-content-light">
											&nbsp;<i class="gi gi-user_remove"></i> คนลง {{$pploutcount}} คน
										</h3>
										<div class="pull-right" style="margin-top:-50px">
											<div class="btn-group">
												<a href={{asset('tmrchange/add/depart')}} class="btn btn-default"><strong>เพิ่ม</strong></a>
											</div>
										</div>
									</div>
									<div class="widget-extra-full">
										
										<div class="table-responsive">
											<table class="table table-vcenter table-striped">
												{{-- <thead>
													<tr>
														<th>#</th>
														<th style="width:80px">รายชื่อ</th>
														<th style="width:50px"></th>
														<th class="text-center"></th>
													</tr>
												</thead> --}}
												<tbody>
													<?php $i=1; ?>
													@foreach($pploutlist as $ppl)
													<tr>
														<td>{{$i}}</td>
														<td>
															<a href={{asset('person/'.$ppl->id)}}>{{$ppl->nickname}}{{'#'}}{{$ppl->year}}</a>
														</td>
														<td>
														<a href={{asset('tmrchange/postpone/depart/'.$ppl->id)}}><button class="btn btn-warning btn-md"><i class="fa fa-angle-double-right"></i> เลื่อน</button></a>
														</td>
														
													<?php $i++; ?>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- END Your Plan Widget -->
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>


	</div>

<script type="text/javascript">
	function checkDate(date){
			var year = parseInt(date.substring(0,4))+543;
			var month = parseInt(date.substring(5,7));
			var day = parseInt(date.substring(8,10));

			var currentyear = <?php echo $year; ?>;
			var currentday = <?php echo $day; ?>;
			var currentmonth = <?php 
				switch ($month) {
				    case 'มกราคม':
				        echo 1;
				        break;
				    case 'กุมภาพันธ์':
				        echo 2;
				        break;
				    case 'มีนาคม':
				        echo 3;
				        break;
				    case 'เมษายน':
				        echo 4;
				        break;
				    case 'พฤษภาคม':
				        echo 5;
				        break;
				    case 'มิถุนายน':
				        echo 6;
				        break;
				    case 'กรกฎาคม':
				        echo 7;
				        break;
				    case 'สิงหาคม':
				        echo 8;
				        break;
				    case 'กันยายน':
				        echo 9;
				        break;
				    case 'ตุลาคม':
				        echo 10;
				        break;
				    case 'พฤศจิกายน':
				        echo 11;
				        break;
				    case 'ธันวาคม':
				        echo 12;
				        break;
				}
			 ?>;
			 // var checkdayin = 0;
			if( year < currentyear ||(year==currentyear &&month < currentmonth)||(year == currentyear && month == currentmonth && day < currentday )){
				// checkdayin = 1;
				alert('เลือกวันที่ผิด มันผ่านไปแล้วโว้ยยย');
			}
		}
</script>
	@stop
