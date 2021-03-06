

@extends('home/main')

@section('content')

<div class="row edpensook">
	<div class="col-xs-12">
		<div class="widget">
			<div class="widget-advanced widget-advanced-alt">

				<!-- Widget Header -->
				<div class="widget-simple text-center themed-background-coral">
					
					
					<h2 class="widget-content-light edpensook animation-pullDown">
						<i class="gi gi-list sidebar-nav-icon"></i> รายชื่อทั้งหมด
						<small>&nbsp;</small>
					</h2>
					<div class="pull-right" >
						
						<div class="btn-group">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><strong>เรียงตาม</strong> <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								<li><a href="{{asset('allname/year')}}">ชั้นปี</a></li>
								<li><a href="{{asset('allname/name')}}">ชื่อจริง</a></li>
								<li><a href="{{asset('allname/nickname')}}">ชื่อเล่น</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- END Widget Header -->

				<!-- Widget Main -->
				<div class="widget-main">
					<div class="row">
						<div class="col-xs-12" style="margin-bottom:15px">
							<div class="col-xs-3">
								<div class="list-group remove-margin">
									<a href="javascript:void(0)" class="list-group-item">
										<span class="pull-right"><strong>{{$user_count}}</strong></span>
										<h4 class="list-group-item-heading remove-margin"><i class="fa fa-users"></i>&nbsp;&nbsp; จำนวนคนทั้งหมด</h4>
									</a>
									<a href="javascript:void(0)" class="list-group-item">
										<span class="pull-right"><strong>{{$user_count}}</strong></span>
										<h4 class="list-group-item-heading remove-margin"><i class="fa fa-users"></i>&nbsp;&nbsp; แมนเดย์รวม</h4>
									</a>
								</div>
							</div>
							<div class="col-xs-3">
								<div class="list-group remove-margin">
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
								</div>
							</div>
							<div class="col-xs-6">
								<div class="col-xs-6" style=" padding-right: 0px; ">
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
								</div>
								<div class="col-xs-6" style=" padding-left: 0px; ">
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
						</div>
						
						<div class="col-xs-12">
							<div class="table-responsive">
								<table class="table table-vcenter table-striped table-bordered">
									<thead>
										<tr>
											<th class="text-center">แก้ไข</th>
											<th class="text-center">#</th>
											<th class="text-center">ชื่อ</th>
											<th class="text-center">นามสกุล</th>
											<th class="text-center">ชื่อเล่น</th>
											<th class="text-center">คณะ</th>
											<th class="text-center">ภาค</th>
											<th class="text-center">ปี</th>
											<th class="text-center">เพศ</th>
											<th class="text-center">รหัสนิสิต</th>
											<th class="text-center">รหัสปชช</th>
											<th class="text-center">โทร.</th>
											
											<th class="text-center">ถึก</th>
											<th class="text-center">แมนเดย์</th>
										</tr>

									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach ($users as $user)
										<tr>
											<td class="text-center"><a data-toggle="tooltip" title data-original-title="แก้ไขข้อมูล" href={{asset('person/'.$user->id)}} ><i class="gi gi-pencil"></i></a></td>
											<td class="text-center">{{$i}}</td>
											<td>{{$user->first_name}}</td>
											<td>{{$user->last_name}}</td>
											<td>{{$user->nickname}}</td>
											<td>{{$user->faculty}}</td>
											<td>{{$user->dep}}</td>
											<td class="text-center">{{$user->year}}</td>
											<td class="text-center">{{$user->gender}}</td>
											<td>{{$user->student_id}}</td>
											<td>{{$user->citizen_id}}</td>
											<td>{{$user->phone}}</td>
										
											<td class="text-center">{{$user->str_lvl}}</td>
											<td class="text-center">{{$user->total_manday}}</td>
										</tr>
										<?php $i++; ?>
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