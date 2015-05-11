
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
							@if($changed == 1)
							<h3 class="edpensook" style="color:white;">เลื่อนสำเร็จ !</h3>@endif
							<h4 class="edpensook" style="color:white;">&nbsp;@if($changed == 1) {{$oldperson}} ถูกเลื่อนแล้ว@endif&nbsp;</h4>
								
							

					
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


	@stop