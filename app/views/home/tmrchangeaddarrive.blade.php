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

	<div class="row">
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
											&nbsp;<i class="gi gi-user_add"></i> คนขึ้น - {{$pplincount}} คน
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
				                                            	<input type="date" id="example-datepicker2" name="newdateout" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
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
															<a href={{asset('tmrchange/postpone/arrive/'.$ppl->id)}}><button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> เลื่อน</button></a>
														</td>
														<td>cancel</td>
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
											&nbsp;<i class="gi gi-user_remove"></i> คนลง - {{$pploutcount}} คน
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
														<a href={{asset('tmrchange/postpone/depart/'.$ppl->id)}}><button class="btn btn-primary btn-md"><i class="fa fa-angle-double-right"></i> เลื่อน</button></a>
														</td>
														<td>cancel</td>
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
	var peopleName = ["pook","mon"];
        $('.input-typeahead-test').typeahead({ source: peopleName });
</script>
	@stop
