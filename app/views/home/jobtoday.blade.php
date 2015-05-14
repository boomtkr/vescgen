@extends('home/main')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="widget">
			<div class="widget-advanced widget-advanced-alt">

				<!-- Widget Header -->
				<div class="widget-simple text-center themed-background-fire">
					
					
					<h2 class="widget-content-light  edpensook">
						<i class="gi gi-imac sidebar-nav-icon"></i> กระดานหน้าที่วันนี้<br>
						<h4 class="edpensook" style="color:white;">ผลัด {{$plud}} วัน {{$date}} @if($time=='morning')ช่วงเช้า@endif
					@if($time=='afternoon')ช่วงบ่าย@endif
					@if($time=='all')ทั้งวัน@endif</h4>

					</h2>
					
					</div>
				</div>
				<!-- END Widget Header -->
				<div class="widget-main">
					<div class="row">
						<div class="col-xs-12">

					<form action="#" method="post" class="form-horizontal form-bordered" onsubmit="return false;" style=" margin-top: 0px; ">
						<fieldset>
							<div class="form-group col-xs-4">
							<label class="col-xs-4 control-label" for="example-datepicker">วันที่</label>
								<div class="col-xs-8">
									<input type="text" id="example-datepicker2" name="example-datepicker2" class="form-control input-datepicker input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
								</div>
							</div>
							<div class="form-group col-xs-4" style=" margin-top: 4px; ">
                                            <label class="col-xs-4 control-label" for="example-select">ช่วงเวลา</label>
                                            <div class="col-xs-8">
                                                <select id="example-select" name="example-select" class="form-control" size="1">
                                                    <option value="0">เช้า</option>
                                                    <option value="1">บ่าย</option>
                                                    <option value="2">ทั้งวัน</option>
                                                  
                                                </select>
                                            </div>
                                        </div>
                            <div class="form-group col-xs-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Go</button>
                            </div>
						</fieldset>
					</form>
				

	             
	</div>
	<div class="col-xs-7">
		<!-- Your Plan Widget -->
		<div class="widget">
			<div class="widget-extra themed-background-emerald">

				<h3 class="widget-content-light">
					กระดานหน้าที่
				</h3>
			</div>
			<div class="widget-extra-full">

				<div class="table-responsive">
					<table class="table table-vcenter table-striped">
						<thead>
							<tr>
								<th style="width:80px">งาน</th>
								<th style="width:50px">จำนวน</th>
								<th class="text-center">รายชื่อ</th>
							</tr>
						</thead>
						<tbody>
						<?php $i = 0; ?>
						@foreach($works as $work)
							<tr>
								<td class="text-center">{{$work->work_name}}</td>
								<td class="text-center">{{count($pplonwork[$i])}}</td>
								<td>
								@foreach($pplonwork[$i] as $ppow)
										<a href={{asset('person/'.$ppow->id)}}>{{$ppow->nickname}}{{'#'}}{{$ppow->year}}</a> | 
								@endforeach
								</td>
							</tr>
						<?php $i++; ?>
						@endforeach
						</tbody>
					</table>
				</div>

			</div>
		</div>
		<!-- END Your Plan Widget -->
	</div>
	<div class="col-xs-5">
		<!-- Your Plan Widget -->
		<div class="widget">
			<div class="widget-extra themed-background-coral">

				<h3 class="widget-content-light">
					รายชื่อคนบนค่าย
				</h3>
			</div>
			<div class="widget-extra-full">
				<div class="table-responsive">
					<table class="table table-vcenter table-striped table-bordered">
						<thead>
							<tr>
								<th style="width:30px">ชั้นปี</th>
								<th>รายชื่อ</th>
								<th style="width:40px">#</th>
								<th style="width:40px">MD</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>SENIOR</td>
								<td>ปุ๊ก ปุ๊ก ปุ๊ก</td>
								<td class="text-center">3</td>
								<td class="text-center">3</td>
							</tr>
							<tr>
								<td>JUNIOR</td>
								<td>ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก</td>
								<td class="text-center">3</td>
								<td class="text-center">3</td>
							</tr>
							<tr>
								<td>MORE</td>
								<td>ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก</td>
								<td class="text-center">3</td>
								<td class="text-center">3</td>
							</tr>
							<tr>
								<td>FRESHY</td>
								<td>ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก</td>
								<td class="text-center">3</td>
								<td class="text-center">3</td>
							</tr>
							<tr>
								<td><strong>รวม</strong></td>
								<td></td>
								<td class="text-center">12</td>
								<td class="text-center">3</td>
							</tr>
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


@stop