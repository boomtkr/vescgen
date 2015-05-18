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
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-xs-2">
							<button id="submit-button" type="button" name='submit' class="btn btn-lg btn-success col-xs-9"><i class="fa fa-angle-right"></i> ยืนยัน</button>	
							<a href="{{ URL::previous() }}"><button id="submit-button" type="button" name='submit' class="btn btn-lg btn-default col-xs-9"><i class="fa fa-angle-right"></i> กลับ</button>	</a>
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