
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


					<h2 class="widget-content-light edpensook animation-pullDown">
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
									<?php $countwork=0; ?>
										@foreach($works as $work)
										<tr>
											<td class="text-center">{{++$countwork;}}</td>
											<td class="workname">{{$work->work_name}}</td>
											<td class="text-center">{{$work->location}}</td>
											<td class="text-center">{{$work->work_lvl}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>

							</div>
						</div>
						<div class="col-xs-8 col-xs-push-2">
							{{Form::open(array('url'=>'/allwork/add','id'=>'form-validation','method'=>'post','class'=>'form-horizontal form-bordered','onsubmit'=>'return false;'))}}
							<!-- <form url='/allwork/add' method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" > -->
                            <fieldset>
                                <legend>เพิ่มงาน</legend>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="user-settings-email">ชื่องาน</label>
                                    <div class="col-md-6">
                                        <input type="text" id="input-workname" name="work_name" class="form-control">
                                        
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-3 control-label" for="user-settings-email">สถานที่</label>
                                    <div class="col-md-6">
                                        <select id="example-select" name="location" class="form-control" size="1" style=" height: 34px; ">
                                                    <option value="site">site</option>
                                                    <option value="home">home</option>
                                                    
                                                </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-3 control-label" for="user-settings-email">ระดับงาน</label>
                                    <div class="col-md-6">
                                        <select id="example-select" name="work_lvl" class="form-control" size="1" style=" height: 34px; ">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    
                                                </select>
                                    </div>
                                </div>
                                <div class="form-group">
	                                <div class="col-xs-12 text-right">
	                                    
	                                    {{-- <input type="submit" value="ยืนยัน" /> --}}
	                                    <button id="addwork-button" type="button" onclick="checkWork();" class="btn btn-lg btn-primary">เพิ่มงาน</button>
	                                </div>
	                            </div>
                                </fieldset>
                                {{Form::close()}}
                                <!-- </form> -->
						</div>
					</div>

				</div>
				<!-- END Widget Main -->
			</div>
		</div>
		<!-- END Advanced Theme Color Widget Alternative -->
	</div>

</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

<script type="text/javascript">
	$('#input-workname').keypress(function(event){
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if(keycode == '13'){
	        checkWork();
	    }
	});

	function checkWork(){
		var duplicatework =0;
		$('.workname').each(function(){
			var workname = $(this).text();
			// alert($('#input-workname').val());
			if($('#input-workname').val()==workname){
				duplicatework =1;
			} 
		});
		if (duplicatework) {
			alert('ชื่องานซ้ำาาาา');
			$('form').attr('onsubmit','return false;');
		} else {
			$('form').removeAttr('onsubmit');
			$('#addwork-button').attr('type','submit');
		}

	}
</script>


@stop