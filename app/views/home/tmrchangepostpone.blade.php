
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
						<h2 class="widget-content-light  animation-pullDown">
							<i class="gi gi-sorting"></i> คนขึ้นลงพรุ่งนี้<br>
							{{-- <h4 class="edpensook" style="color:white;"></h4> --}}		
							<h4 style="color:white;">&nbsp;</h4>
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
										@if($type == 'arrive')
										<div class="block" style="padding-bottom:50px">
													
											   		<h3 class="text-center" style=" margin-top: 0px; "><strong>เลื่อนวันขึ้น</strong></h3>
											   		<hr>
											   		{{Form::open(array('url'=>'tmrchange/postpone/arrive/'.$person->id.'/update','style'=>'margin-bottom:10px'))}}
									    		
									    			<div class="row" style=" margin-bottom: 10px; ">
									    				<div class="col-xs-4">
									    					<h4><strong>ชื่อ คณะ</strong></h4>
									    				</div>
									    				<div class="col-xs-8">
									    					<h4><strong>{{$person->nickname}}{{'#'}}{{$person->year}}</strong>{{' , '}}{{$person->first_name}}{{'  '}}{{$person->last_name}}{{' ,  '}}{{$person->faculty}}</h4>
									    				</div>
													    <div class="col-xs-4">
									    					<h4>กำหนดวันขึ้นเดิม</h4>
									    				</div>
									    				<div class="col-xs-8">
									    					<h4>{{$arrivedate}}</h4>
									    				</div>
									    				<div class="col-xs-4">
									    					<h4>กำหนดวันลงเดิม</h4>
									    				</div>
									    				<div  class="col-xs-8">
									    					<h4>{{$departdate}}</h4>
									    				</div>
															<div class="col-xs-4">
									    					<h4 for="newdate"><strong>วันขึ้นวันใหม่</strong></h4>
									    					</div>
															<div class="col-xs-6"><input type="text" id="example-datepicker2" name="newdate" class="form-control input-datepicker input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" onchange="checkDate(this.value);">
									    				</div>
									    			</div>
			                                        <div class="pull-right">
									   				<button class="btn btn-success" id="submit-button"  onclick="isSelect();" type="button" value="ยันยืน">ยืนยัน</button>
									   				<a href={{asset('tmrchange')}} ><button class="btn btn-default" type="button">ปิด</button></a>
									   				</div>
											    	{{Form::close()}}
											  
										</div>
										 @endif
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
											&nbsp;<i class="gi gi-user_add"></i> คนลง {{$pploutcount}} คน
										</h3>
										<div class="pull-right" style="margin-top:-50px">
											<div class="btn-group">
												<a href={{asset('tmrchange/add/depart')}} class="btn btn-default"><strong>เพิ่ม</strong></a>
											</div>
										</div>
									</div>
									<div class="widget-extra-full">
										@if($type == 'depart')
										<div class="block" style="padding-bottom:50px">
													
											   		<h3 class="text-center" style=" margin-top: 0px; "><strong>เลื่อนวันลง</strong></h3>
											   		<hr>
											   		{{Form::open(array('url'=>'tmrchange/postpone/depart/'.$person->id.'/update','style'=>'margin-bottom:10px'))}}
											   		
									    			<div class="row" style=" margin-bottom: 10px; ">
									    				<div class="col-xs-4">
									    					<h4><strong>ชื่อ คณะ</strong></h4>
									    				</div>
									    				<div class="col-xs-8">
									    					<h4><strong>{{$person->nickname}}{{'#'}}{{$person->year}}</strong>{{' , '}}{{$person->first_name}}{{'  '}}{{$person->last_name}}{{' ,  '}}{{$person->faculty}}</h4>
									    				</div>
													    <div class="col-xs-4">
									    					<h4>กำหนดวันขึ้นเดิม</h4>
									    				</div>
									    				<div class="col-xs-8">
									    					<h4>{{$arrivedate}}</h4>
									    				</div>
									    				<div class="col-xs-4">
									    					<h4>กำหนดวันลงเดิม</h4>
									    				</div>
									    				<div  class="col-xs-8">
									    					<h4>{{$departdate}}</h4>
									    				</div>
															<div class="col-xs-4">
									    					<h4 for="newdate"><strong>วันลงวันใหม่</strong></h4>
									    					</div>
															<div class="col-xs-8"><input type="text" id="example-datepicker2" name="newdate" class="form-control input-datepicker input-datepicker-close" data-date-format="dd/mm/yy" placeholder="dd/mm/yy" onchange="checkDate(this.value);">
									    				</div>
									    			</div>
			                                        <div class="pull-right">
									   				<button class="btn btn-success" id="submit-button" onclick="isSelect();" type="button" value="ยันยืน">ยืนยัน</button>
									   				<a href={{asset('tmrchange')}} ><button class="btn btn-default" type="button">ปิด</button></a>
									   				</div>
											    	{{Form::close()}}
											  
										</div>
										 @endif
										<div class="table-responsive">
											<table class="table table-vcenter table-striped ">
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
	var isSelected = 0;
	function isSelect(){
		var day = $('#example-datepicker2').val();
		// alert(name);
		if(day!='') isSelected=1;
		if(isSelected){
			$('#submit-button').attr('type','submit');
		} else {
			alert('เลือกวันที่ด้วยน้าาาาา ได้โปรดดด');
		}
	}
	</script>
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
