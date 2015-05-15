
@extends('home/main')

@section('content')

<div class="row edpensook">
	<div class="col-xs-12">
		<div class="widget">
			<div class="widget-advanced widget-advanced-alt">

				<!-- Widget Header -->
				<div class="widget-simple text-center themed-background-emerald">


					<h2 class="widget-content-light edpensook">
						<i class="gi gi-ax"></i> แบ่งงาน<br>
						<small> &nbsp;</small>
					</h2>
					
				</div>
				<!-- END Widget Header -->

				<!-- Widget Main -->
				<div class="widget-main">
					<div class="row">

						<div class="col-xs-12">

							<div class="progress progress-striped active">
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%"></div>
							</div>
							<h3><strong>เลือกวันที่และช่วงเวลา</strong></h3> <h4>กระดานหน้าล่าสุด วันที่ {{$latestdate}} ช่วง {{$latesttime}}</h4>
							<hr>

						</div>

						<div class="col-xs-8">
							{{Form::open(array('url'=>'/jobmgt/datechosen','class'=>'form-horizontal'))}}
							<div class="form-group">
								<h4 class="col-md-3 control-label" for="example-select" style=" margin-top: 0px; ">วันที่</h4>
								<div class="col-xs-4" style=" padding-top: 4px; ">
									<select id="example-select" name="date" class="form-control" size="1" >
										<option value={{$today}}>{{$today}}</option>
										<option value={{$tomorrow}}>{{$tomorrow}}</option>
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<h4 class="col-md-3 control-label" for="example-select" style=" margin-top: 0px; ">ช่วงเวลา</h4>
								<div class="col-xs-4" style=" padding-top: 4px; ">
									<select id="example-select" name="time" class="form-control" size="1" >
										<option value='morning'>เช้า</option>
										<option value='afternoon'>บ่าย</option>
										<option value='OT'>โอที</option>
										
									</select>
								</div>
							</div>
							<div class="form-group form-actions">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-angle-right"></i> ต่อไป</button>
								</div>
							</div>
							{{Form::close()}}
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