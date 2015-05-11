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
                                            <label class="col-xs-4 control-label" for="example-select">Sort by</label>
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
		<div class="widget">
			<div class="widget-advanced widget-advanced-alt">
				<!-- Widget Header -->
				<div class="widget-header text-center themed-background-dark-flatie">
					
					<a href="page_ready_user_profile.html">
						<img src="img/placeholders/avatars/avatar15.jpg" alt="avatar" class="widget-image img-circle">
					</a>
					<h4 class="widget-content-light">
						<a href="page_ready_user_profile.html" class="themed-color-flatie">George Peterson</a><br>
						<small><i class="gi gi-pin"></i> New York</small>
					</h4>
				</div>
				<!-- END Widget Header -->

				<!-- Widget Main -->
				<div class="widget-main">
					<div class="row">
						<div class="col-xs-4">
							<div class="list-group remove-margin">
						<a href="javascript:void(0)" class="list-group-item">
							<span class="pull-right"><strong>160</strong></span>
							<h4 class="list-group-item-heading remove-margin"><i class="fa fa-file fa-fw"></i> Total People</h4>
						</a>
						<a href="javascript:void(0)" class="list-group-item">
							<span class="pull-right"><strong>90</strong></span>
							<h4 class="list-group-item-heading remove-margin"><i class="fa fa-briefcase fa-fw"></i> Man</h4>
							<p class="list-group-item-text"></p>
						</a>
						<a href="javascript:void(0)" class="list-group-item">
							<span class="pull-right"><strong>3.589</strong></span>
							<h4 class="list-group-item-heading remove-margin"><i class="fa fa-users fa-fw"></i> Woman</h4>
							<p class="list-group-item-text"></p>
						</a>
						<a href="javascript:void(0)" class="list-group-item">
							<span class="pull-right"><strong>15.325</strong></span>
							<h4 class="list-group-item-heading remove-margin"><i class="fa fa-heart fa-fw"></i> Senior</h4>
							<p class="list-group-item-text"></p>
						</a>
						<a href="javascript:void(0)" class="list-group-item">
							<span class="pull-right"><strong>15.325</strong></span>
							<h4 class="list-group-item-heading remove-margin"><i class="fa fa-heart fa-fw"></i> Junior</h4>
							<p class="list-group-item-text"></p>
						</a>
						<a href="javascript:void(0)" class="list-group-item">
							<span class="pull-right"><strong>15.325</strong></span>
							<h4 class="list-group-item-heading remove-margin"><i class="fa fa-heart fa-fw"></i> More</h4>
							<p class="list-group-item-text"></p>
						</a>
						<a href="javascript:void(0)" class="list-group-item">
							<span class="pull-right"><strong>15.325</strong></span>
							<h4 class="list-group-item-heading remove-margin"><i class="fa fa-heart fa-fw"></i> Freshy</h4>
							<p class="list-group-item-text"></p>
						</a>
					</div>
						</div>
						<div class="col-xs-8">
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
								<td><h4>SENIOR</h4></td>
								<td>ปุ๊ก ปุ๊ก ปุ๊ก</td>
								<td class="text-center">3</td>
								<td class="text-center">3</td>
							</tr>
							<tr>
								<td><h4>JUNIOR</h4></td>
								<td>ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก</td>
								<td class="text-center">3</td>
								<td class="text-center">3</td>
							</tr>
							<tr>
								<td><h4>MORE</h4></td>
								<td>ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก</td>
								<td class="text-center">3</td>
								<td class="text-center">3</td>
							</tr>
							<tr>
								<td><h4>FRESHY</h4></td>
								<td>ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก ปุ๊ก</td>
								<td class="text-center">3</td>
								<td class="text-center">3</td>
							</tr>
							<tr>
								<td><h4><strong>TOTAL</strong></h4></td>
								<td></td>
								<td class="text-center">12</td>
								<td class="text-center">3</td>
							</tr>
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
</div>


@stop