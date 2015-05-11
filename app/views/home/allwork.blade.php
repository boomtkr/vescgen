
@extends('home/main')

				@section('content')

				<div class="row edpensook">
					<div class="col-xs-12">
						<div class="widget">
							<div class="widget-advanced widget-advanced-alt">

								<!-- Widget Header -->
								<div class="widget-simple text-center themed-background-emerald">


									<h2 class="widget-content-light edpensook">
										<i class="fa fa-list-alt sidebar-nav-icon"></i> หน้าที่ทั้งหมด<br>
										<small> &nbsp;</small>
									</h2>
								
								</div>
								<!-- END Widget Header -->

								<!-- Widget Main -->
								<div class="widget-main">
									<div class="row">
										
										<div class="col-xs-8 col-xs-push-2">
											<div class="table-responsive">

												<table class="table table-vcenter table-striped table-bordered">
													<thead>
														<tr>
															<th class="text-center" width="20px">#</th>
															<th class="text-center" >งาน</th>
															<th class="text-center">สถานที่</th>
															<th class="text-center" width="80px">ระดับงาน</th>
														</tr>

													</thead>
													<tbody>
														@foreach($works as $work)
															<tr>
																<td class="text-center">{{$work->id}}</td>
																<td>{{$work->work_name}}</td>
																<td class="text-center">{{$work->location}}</td>
																<td class="text-center">{{$work->work_lvl}}</td>
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