
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
				<div class="widget-simple text-center themed-background-emerald">


					<h2 class="widget-content-light edpensook">
						<i class="fa fa-briefcase" ></i> หน้าที่รายวัน<br>
						<h4 class="edpensook" style="color:white;">ผลัด {{$plud}} วัน {{$date}} ช่วง@if($time=='morning')เช้า@endif</h4>

					</h2>
					<div class="pull-right" style="margin-top:-30px">
						<div class="btn-group">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><strong>ผลัด</strong> <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								<li class="dropdown-header">เลือกผลัด</li>
								@for($i=0 ; $i<=$currentplud; $i++)
								<li><a href={{asset('dailyjob/'.$i)}}>{{$i}}</a></li>
								@endfor
							</ul>
						</div>
						<div class="btn-group">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><strong>วันที่</strong> <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								<li class="dropdown-header">เลือกวันที่</li>
								@foreach($datelist as $menudate)
								<li><a href={{asset('dailyjob/'.$plud.'/'.$menudate)}}>{{$menudate}}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="btn-group">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><strong>ช่วง</strong> <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								@foreach($timelist as $tl)
								<li><a href={{asset('dailyjob/'.$plud.'/'.$date.'/'.$tl)}}>@if($tl=='morning')เช้า@endif
									@if($tl=='afternoon')บ่าย@endif</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<!-- END Widget Header -->

					<!-- Widget Main -->
					<div class="widget-main">
						<div class="row">
							<div class="col-xs-3">
								<div class="list-group remove-margin">
									<a href="javascript:void(0)" class="list-group-item">
										<span class="pull-right"><strong>{{$user_count}}</strong></span>
										<h4 class="list-group-item-heading remove-margin"><i class="fa fa-users"></i>&nbsp;&nbsp; จำนวนคนทั้งหมด</h4>
									</a>
								</div>
							</div>
							<div class="col-xs-9">
								<div class="table-responsive">

									<table class="table table-vcenter table-striped table-bordered">
										<thead>
											<tr>
												<th class="text-center" width="50px">งาน</th>
												<th class="text-center" width="40px">จำนวน</th>
												<th class="text-center">รายชื่อ</th>
											</tr>

										</thead>
										<tbody>
											<?php $i = 0; ?>
											@foreach($works as $work)
											<tr>
												<td>
													{{$work->work_name}}
												</td>
												<td class="text-center">
													{{count($pplonwork[$i])}}
												</td>
												<td>
													@foreach($pplonwork[$i] as $ppow)
													<a href={{asset('person/'.$ppow->id)}}>{{$ppow->nickname}}{{'#'}}{{$ppow->year}}</a>
													@endforeach
												</td>

												<?php $i++; ?>
											</tr>
											@endforeach
										</tbody>
									</table>

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
	
	

	@stop