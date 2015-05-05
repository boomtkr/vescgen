@extends('home/main')

@section('content')

<div class="row">
	<div class="col-xs-12">

		
			{{-- <div class="widget-simple">
				datepicker/plud dropdown/time
			</div> --}}
			<div class="block row">

					<form action="#" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
						<fieldset>
							<div class="form-group col-xs-4">
							<label class="col-xs-4 control-label" for="example-datepicker">Date</label>
								<div class="col-xs-8">
									<input type="text" id="example-datepicker2" name="example-datepicker2" class="form-control input-datepicker input-datepicker-close" data-date-format="dd/mm/yy" placeholder="dd/mm/yy">
								</div>
							</div>
							<div class="form-group col-xs-4">
                                            <label class="col-xs-4 control-label" for="example-select">Time period</label>
                                            <div class="col-xs-8">
                                                <select id="example-select" name="example-select" class="form-control" size="1">
                                                    <option value="0">Morning</option>
                                                    <option value="1">Afternoon</option>
                                                    <option value="2">All</option>
                                                  
                                                </select>
                                            </div>
                                        </div>
                            <div class="form-group col-xs-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Go</button>
                            </div>
						</fieldset>
					</form>
				
				
			</div>
	             
	</div>
	<div class="col-xs-12">
		<a href="#" class="widget" style="cursor:default;color:black">
			<div class="widget-simple">
				<h2 class="widget-content animation-pullDown text-center">
					วันอังคารที่ 5 พฤษภาคม 2558 {{$date}} ผลัด {{$plud}} {{$time}}
				</h2>
			</div>
		</a>              
	</div>
	<div class="col-xs-7">
		<!-- Your Plan Widget -->
		<div class="widget">
			<div class="widget-extra themed-background-emerald">

				<h3 class="widget-content-light">
					Tasks

				</h3>
			</div>
			<div class="widget-extra-full">

				<div class="table-responsive">
					<table class="table table-vcenter table-striped">
						<thead>
							<tr>
								<th style="width:80px">Work</th>
								<th style="width:50px">Amount</th>
								<th class="text-center">People</th>
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
					People

				</h3>
			</div>
			<div class="widget-extra-full">
				<div class="table-responsive">
					<table class="table table-vcenter table-striped table-bordered">
						<thead>
							<tr>
								<th style="width:30px">Year</th>
								<th>People</th>
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
								<td>TOTAL</td>
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


@stop