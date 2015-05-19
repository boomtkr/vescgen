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
					<form>
					<div class="row">
						<div class="col-xs-12">
							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
							</div>
							<h3><h3>เลือกวันที่และช่วงเวลา < กรอกงานและจำนวนคน < เลือกซีเนียร์รับผิดชอบแต่ละงาน < <strong>ผลการแบ่งงาน</strong></h3>
							<hr>
						</div>
						<div class="col-xs-12" style="margin-bottom:15px">
							<div class="list-group remove-margin col-xs-3">
								<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right" id="count-people"><strong>1</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="fa fa-briefcase"></i> จำนวนงาน</h4>
									<p class="list-group-item-text"></p>
								</a>
							</div>
							<div class="list-group remove-margin col-xs-3">
								<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right" id="count-people"><strong>1</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="gi gi-user"></i> จำนวนคนทั้งหมด</h4>
									<p class="list-group-item-text"></p>
								</a>
							</div>
							<div class="list-group remove-margin col-xs-3">
								<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right" id="count-people"><strong>1</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="gi gi-female"></i> จำนวนผู้หญิง</h4>
									<p class="list-group-item-text"></p>
								</a>
							</div>
							<div class="list-group remove-margin col-xs-3">
								<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right" id="count-people"><strong>1</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="gi gi-crown"></i> จำนวนซีเนียร์</h4>
									<p class="list-group-item-text"></p>
								</a>
							</div>
						</div>
						<div class="col-xs-10">
							<div class="table-responsive" style="padding-bottom:100px">

								<table class="table table-vcenter table-striped table-bordered" >
									<thead >
										<tr>
											<th width="10%">งาน</th>
											<th width="8%" class="text-center">คน</th>
											<th width="8%" class="text-center">ผญ</th>
											<th class="text-center">ซีเนียร์</th>
											<th class="text-center">น้องงงงงๆๆๆๆๆๆๆๆๆ</th>
										</tr>

									</thead>
									<tbody>
										<?php $i=0; ?>
										@for($i=0;$i<count($job);$i++)
										<tr>
											<td>{{$job[$i]}}</td>
											<td class="text-center">{{$user[$i]}}</td>
											<td class="text-center">{{$female[$i]}}</td>
											<td>
												@foreach($seniors[$i] as $senior)
												{{$senior->nickname}}{{'#'}}{{$senior->year}}{{' '}}
												@endforeach
											</td>
											<td>
												@foreach($nonseniors[$i] as $nonsenior)
												{{$nonsenior->nickname}}{{'#'}}{{$nonsenior->year}}{{' '}}
												@endforeach
											</td>
										</tr>
										@endfor
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-xs-2">
							<button id="submit-button" type="button" name='submit' class="btn btn-lg btn-success col-xs-9"><i class="fa fa-angle-right"></i> ยืนยัน</button>	
							{{-- <a href={{asset('/jobmgt/editworkresult')}}><button id="submit-button" type="button" name='submit' class="btn btn-lg btn-warning col-xs-9"><i class="fa fa-angle-right"></i> แก้ไข</button></a> --}}
							<a href="#"><button id="submit-button" type="button" name='submit' class="btn btn-lg btn-default col-xs-9"><i class="fa fa-angle-right"></i> แรนด้อมใหม่</button></a>

						</div>
					</div>
					</form>
					<!-- END Advanced Theme Color Widget Alternative -->
				</div>

			</div>
		</div>
	</div>
</div>
@stop