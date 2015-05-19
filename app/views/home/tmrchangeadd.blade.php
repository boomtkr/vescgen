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
											@if($type == 'arrive')
											<div class="block">

												<h3 class="text-center" style=" margin-top: 0px; "><strong>เพิ่มคนขึ้น</strong></h3>
												<div class="progress progress-striped active">
													<div class="progress-bar progress-bar-warning edpensook" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">เลือกคน</div>

												</div>
												{{Form::open(array('url'=>'/tmrchange/add/arrive/update','style'=>'margin-bottom:10px'))}}
												<div class="row" style=" margin-bottom: 10px; ">
													<div class="form-group" style=" margin-bottom: 0px; ">
														<h5 class="col-md-2 control-label text-right"><strong>เลือกคน</strong></h5>
														<div class="col-md-6">
															<select id="chosen-arrive" name="pname" class="select-chosen" data-placeholder="ค้นหาชื่อ" style="width: 250px;">
                                                        <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                                        @foreach($ppltoaddlist as $ppl)
                                                        	<option value="{{$ppl->nickname}}{{'#'}}{{$ppl->year}}" >{{$ppl->nickname}}{{'#'}}{{$ppl->year}}</option>
                                                        	@endforeach
                                                        </select>

															{{-- <input type="text" id="example-typeahead-test" name="pname" class="form-control input-typeahead-test" autocomplete="off" placeholder="Search People.."> --}}
														</div>
													</div>
													<button id="submit-button" onclick="isSelect();" class="btn btn-primary" type="button" value="ยันยืน"><i class="fa fa-angle-right"></i> ต่อไป</button>
												<a href={{asset('tmrchange')}} ><button class="btn btn-default" type="button"> ปิด </button></a>
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
												&nbsp;<i class="gi gi-user_remove"></i> คนลง {{$pploutcount}} คน
											</h3>
											<div class="pull-right" style="margin-top:-50px">
												<div class="btn-group">
													<a href={{asset('tmrchange/add/depart')}} class="btn btn-default"><strong>เพิ่ม</strong></a>
												</div>
											</div>
										</div>
										<div class="widget-extra-full">
											@if($type == 'depart')
											<div class="block">

												<h3 class="text-center" style=" margin-top: 0px; "><strong>เพิ่มคนลง</strong></h3>
												{{Form::open(array('url'=>'/tmrchange/add/depart/update','style'=>'margin-bottom:10px'))}}
												<div class="row" style=" margin-bottom: 10px; ">
													<div class="form-group" style=" margin-bottom: 0px; ">
														<h5 class="col-md-2 control-label text-right" for="example-typeahead"><stong>เลือกคน</stong></h5>
														<div class="col-md-6">
															<select id="example-chosen" name="pname" class="select-chosen" data-placeholder="ค้นหาชื่อ" style="width: 250px;">
                                                        <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                                        @foreach($ppltoaddlist as $ppl)
                                                        	<option value="{{$ppl->nickname}}{{'#'}}{{$ppl->year}}" >{{$ppl->nickname}}{{'#'}}{{$ppl->year}}</option>
                                                        	@endforeach
                                                        </select>
															{{-- <input type="text" id="example-typeahead" name="pname" class="form-control input-typeahead-test" autocomplete="off" placeholder="Search People.."> --}}
														</div>
													</div>
													<button id="submit-button" onclick="isSelect();" class="btn btn-primary" type="button" value="ยันยืน"><i class="fa fa-angle-right"></i> ต่อไป</button>
												<a href={{asset('tmrchange')}} ><button class="btn btn-default" type="button"> ปิด </button></a>
												</div>
												

												
												{{Form::close()}}

											</div>
											@endif
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
	var isSelected = 0;
	function isSelect(){
		var name = $('a.chosen-single > span').text();
		// alert(name);
		if(name!='ค้นหาชื่อ') isSelected=1;
		if(isSelected){
			$('#submit-button').attr('type','submit');
		} else {
			alert('เลือกคนก่อนน้าาาาา ได้โปรดดด');
		}
	}
	</script>
	@stop
