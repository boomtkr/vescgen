@extends('home/main')

@section('content')
<style type="text/css">
	td a , td {
		font-size: 18px;
	}
</style>
<div class="row edpensook">
	<div class="col-xs-12">
		<div class="widget">
			<div class="widget-advanced widget-advanced-alt">

				<!-- Widget Header -->
				<div class="widget-simple text-center themed-background-coral">
					
					
					<h2 class="widget-content-light  edpensook animation-pullDown">
						<i class="hi hi-user sidebar-nav-icon" ></i> รายชื่อรายวัน<br>
						<h4 class="edpensook" style="color:white;">ผลัด {{$plud}} วัน {{$date}}</h4>

					</h2>
					<div class="pull-right" style="margin-top:-30px">
						<div class="btn-group">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><strong>ผลัด</strong> <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								<li class="dropdown-header">เลือกผลัด</li>
								@for($i=0 ; $i<=$currentplud; $i++)
								<li><a href={{asset('dailyname/'.$sort.'/'.$i)}}>{{$i}}</a></li>
								@endfor
							</ul>
						</div>
						<div class="btn-group">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><strong>วันที่</strong> <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								<li class="dropdown-header">เลือกวันที่</li>
								@foreach($datelist as $menudate)
								<li><a href={{asset('dailyname/'.$sort.'/'.$currentplud.'/'.$menudate)}}>{{$menudate}}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="btn-group">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><strong>เรียงตาม</strong> <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">

								<li><a href={{asset('dailyname/year/'.$plud.'/'.$date)}}>ชั้นปี</a></li>
								<li><a href={{asset('dailyname/gender/'.$plud.'/'.$date)}}>เพศ</a></li>
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
								<br>
								<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right"><strong>{{$male_count}}</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="gi gi-male"></i>&nbsp;&nbsp; ชาย</h4>
									<p class="list-group-item-text"></p>
								</a>
								<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right"><strong>{{$female_count}}</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="gi gi-female"></i>&nbsp;&nbsp; หญิง</h4>
									<p class="list-group-item-text"></p>
								</a>
								<br>
								<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right"><strong>{{$senior_count}}</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="gi gi-crown"></i>&nbsp;&nbsp; Senior</h4>
									<p class="list-group-item-text"></p>
								</a>
								<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right"><strong>{{$junior_count}}</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="gi gi-sheriffs_star"></i>&nbsp;&nbsp; Junior</h4>
									<p class="list-group-item-text"></p>
								</a>
								<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right"><strong>{{$more_count}}</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="gi gi-star"></i>&nbsp;&nbsp; More</h4>
									<p class="list-group-item-text"></p>
								</a>
								<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right"><strong>{{$freshy_count}}</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="gi gi-spade"></i>&nbsp;&nbsp; Freshy</h4>
									<p class="list-group-item-text"></p>
								</a>
							</div>
						</div>
						<div class="col-xs-9">
							<div class="table-responsive">
								@if($sort=='year')
								<table class="table table-vcenter table-striped table-bordered">
									<thead >
										<tr >
											<th style="width:50px">ชั้นปี</th>
											<th>รายชื่อ</th>
											<th style="width:40px">จำนวน</th>

										</tr>

									</thead>
									<tbody>
										<?php $i = 0; 
										$sum=0;
										?>
										@foreach($users as $user)
										<tr>
											<td>
												<h4>@if($i==0) SENIOR @endif
													@if($i==1) JUNIOR @endif
													@if($i==2) MORE @endif
													@if($i==3) FRESHY @endif
												</h4>
											</td>

											<td>
												<?php $sumeachrow=0; ?>
												@foreach($user as $u)

												<a href={{asset('person/'.$u->person_id)}}>{{$u->nickname}}</a>

												<?php $sumeachrow++;
												$sum++; ?>
												@endforeach
											</td>
											<td class="text-center">{{$sumeachrow}}</td>

											<?php $i++; ?>
										</tr>
										@endforeach

										<tr>
											<td><h4><strong>รวม</strong></h4></td>
											<td></td>
											<td class="text-center">{{$sum}}</td>

										</tr>
									</tbody>
								</table>
								@endif
								@if($sort=='gender')
								<table class="table table-vcenter table-striped table-bordered">
									<thead>
										<tr>
											<th style="width:30px">เพศ</th>
											<th>รายชื่อ</th>
											<th style="width:40px">จำนวน</th>

										</tr>

									</thead>
									<tbody>
										<?php $i = 0; 
										$sum=0;
										?>
										@foreach($users as $user)
										<tr>
											<td class="text-center">
												<h4>@if($i==0) ช @endif
													@if($i==1) ญ @endif

												</h4>
											</td>

											<td>
												<?php $sumeachrow=0; ?>
												@foreach($user as $u)

												<a href={{asset('person/'.$u->person_id)}}>{{$u->nickname}}{{'#'}}{{$u->year}}</a>

												<?php $sumeachrow++;
												$sum++; ?>
												@endforeach
											</td>
											<td class="text-center">{{$sumeachrow}}</td>

											<?php $i++; ?>
										</tr>
										@endforeach

										<tr>
											<td><h4><strong>รวม</strong></h4></td>
											<td></td>
											<td class="text-center">{{$sum}}</td>

										</tr>
									</tbody>
								</table>
								@endif
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