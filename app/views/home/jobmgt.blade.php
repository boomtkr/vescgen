
@extends('home/main')

@section('content')

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
								<div class="col-xs-4">
									<select id="date-select" onchange="selectDate(this.value);" name="date" class="form-control" size="1" style=" height: 34px; ">
										<option>เลือกวันที่</option>
										<option value={{$today}}>{{$today}}</option>
										<option value={{$tomorrow}}>{{$tomorrow}}</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<h4 class="col-md-3 control-label" for="example-select" style=" margin-top: 0px; ">ช่วงเวลา</h4>
								<div class="col-xs-4">
									<select id="time-select" onchange="selectTime(this.value);" name="time" class="form-control time-select" size="1" style=" height: 34px; ">
										<option>เลือกช่วงเวลา</option>
										<option value='morning'>เช้า</option>
										<option value='afternoon'>บ่าย</option>
										<option value='OT'>โอที</option>
									</select>
								</div>
							</div>
							<div class="form-group form-actions">
								<div class="col-md-9 col-md-offset-3">
									<button type="button" onclick="valid();" class="btn btn-lg btn-primary"><i class="fa fa-angle-right"></i> ต่อไป</button>
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
	<input id="today" type="hidden" value={{$today}}>
	<input id="tomorrow" type="hidden" value={{$tomorrow}}>
	<input id="latestdate" type="hidden" value={{$latestdate}}>
	<input id="latesttime" type="hidden" value={{$latesttime}}>
</div>

<script type="text/javascript">
	// var today = <?php echo $today; ?>;
	// var tomorrow = <?php echo $tomorrow; ?>;
	// var lastdate = <?php echo $latestdate; ?>;
	// var lasttime = '<?php echo $latesttime; ?>';

	// alert(today + " " + lastdate + ' ' + lasttime);
	// $(('select')).hide();
	
	// if(lastdate == today){
	// 	// alert();
	// 	alert($('h2').text());
	// 	if(lasttime=='morning'){
	// 		alert($('h2').text());
	// 		var optionhtml = '<option value="afternoon">บ่าย</option><option value="OT">โอที</option>';
			
	// 	}
	// }

	function selectDate(date){
		var todayvalue = <?php echo $today; ?>;
		var today = $('#today').val();
		var tomorrow = $('#tomorrow').val();
		var lastdate = $('#latestdate').val();
		var lasttime = $('#latesttime').val();
		// var lasttime = 'OT';
		// alert(lastdate+' '+tomorrow);
		// var lasttime = 'OT';
			if(date==lastdate){
				if(lasttime=='morning'){
					// alert();
					$('#time-select option[value="morning"]').remove();
				} 
				if(lasttime=='afternoon'){
					$('#time-select option[value="morning"]').remove();
					$('#time-select option[value="afternoon"]').remove();
				}
				if(lasttime=='OT'){
					$('#time-select option[value="morning"]').remove();
					$('#time-select option[value="afternoon"]').remove();
					$('#time-select option[value="OT"]').remove();
				}
			} 
			if(date==tomorrow) { // choose tomorrow
					$('#time-select option').each(function(){
						$(this).remove();
					});

					$('#time-select').append("<option>เลือกช่วงเวลา</option><option value='morning'>เช้า</option><option value='afternoon'>บ่าย</option><option value='OT'>โอที</option>");

			}
		
	}
	function valid(){
		var getdate = $('#date-select').val();
		var gettime = $('#time-select').val();
		// alert(getdate+' '+gettime);
		if(getdate !='เลือกวันที่' && gettime !='เลือกช่วงเวลา'){
			$(".btn").attr('type','submit');
		} else {
			alert('เลือกวันที่และช่วงเวลาด้วยจ้าา');
		}
	}
	// var x = $('button').text();
	// alert(x);
	
</script>


@stop