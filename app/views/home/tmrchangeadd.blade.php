	@extends('home/main')

	@section('content')

	<div class="row">
		<div class="col-xs-12">
			<div class="widget">
				<div class="widget-advanced widget-advanced-alt">
					<!-- Widget Header -->
					<div class="widget-simple text-center themed-background-amethyst">
						<h2 class="widget-content-light  edpensook">
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
											คนขึ้น - {{$pplincount}} คน
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
													
											   		<h3 style=" margin-top: 0px; "><strong>เพิ่มคนขึ้น</strong></h3>
									    			{{Form::open(array('url'=>'/tmrchange/add/arrive/update','style'=>'margin-bottom:10px'))}}
									    			<div class="row" style=" margin-bottom: 10px; ">
									    				<div class="form-group">
				                                            <h5 class="col-md-4 control-label" for="example-typeahead">Search</h5>
				                                            <div class="col-md-6">
				                                                <input type="text" id="example-typeahead" name="example-typeahead" class="form-control input-typeahead-test" autocomplete="off" placeholder="Search People..">
				                                            </div>
			                                        	</div>
									    			</div>
									    			<div class="row" style=" margin-left: 0px; margin-right: 0px; ">
									    				<div class="table-responsive">
												    <table class="table table-vcenter table-striped">
												    	@foreach($ppltoaddlist as $ppl)
												    	<tr>
												    		<td class="text-center">
												    			<input type="checkbox" name="newsletter[]" value="newsletter">
												    		</td>
												    		<td>
												    			{{$ppl->nickname}}{{'#'}}{{$ppl->year}}
												    		</td>
												    	</tr>
												    	@endforeach
												    </table>
												    </div>
									    			</div>
			                                        
									   				<button class="btn btn-success" type="submit" value="ยันยืน">ยืนยัน</button>
									   				<a href={{asset('tmrchange')}} ><button class="btn btn-default" type="button">ยกเลิก</button></a>
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
											คนลง - {{$pploutcount}} คน
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
													
											   		<h3 style=" margin-top: 0px; "><strong>เพิ่มคนลง</strong></h3>
											   		{{Form::open(array('url'=>'/tmrchange/add/depart/update','style'=>'margin-bottom:10px'))}}
									    			<div class="row" style=" margin-bottom: 10px; ">
									    				<div class="form-group">
				                                            <h5 class="col-md-4 control-label" for="example-typeahead">Search</h5>
				                                            <div class="col-md-6">
				                                                <input type="text" id="example-typeahead" name="example-typeahead" class="form-control input-typeahead-test" autocomplete="off" placeholder="Search People..">
				                                            </div>
			                                        	</div>
									    			</div>
									    			<div class="row" style=" margin-left: 0px; margin-right: 0px; ">
									    				<div class="table-responsive">
												    <table class="table table-vcenter table-striped">
												    	@foreach($ppltoaddlist as $ppl)
												    	<tr>
												    		<td class="text-center">
												    			<input type="checkbox" name="newsletter[]" value="newsletter">
												    		</td>
												    		<td>
												    			{{$ppl->nickname}}{{'#'}}{{$ppl->year}}
												    		</td>
												    	</tr>
												    	@endforeach
												    </table>
												    </div>
									    			</div>
			                                        
									   				<button class="btn btn-success" type="submit" value="ยันยืน">ยืนยัน</button>
									   				<a href={{asset('tmrchange')}} ><button class="btn btn-default" type="button">ยกเลิก</button></a>
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
	$(function(){
		var peopleName = ["pook","boom","lek","mon"];
		$('.input-typeahead-test').typeahead({ source: peopleName });
	});
</script>
	@stop
