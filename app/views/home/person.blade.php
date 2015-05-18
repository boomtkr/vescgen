
@extends('home/main')

@section('content')
<style type="text/css">
	label{
		font-size: 18px;
		padding-top: 4px;
	}
	input{
		font-size: 16px;
	}
</style>
<div class="row edpensook">
	<div class="col-xs-12">
		<div class="widget">
			<div class="widget-advanced widget-advanced-alt">

				<!-- Widget Header -->
				<div class="widget-simple text-center themed-background-blackberry">


					<h2 class="widget-content-light edpensook animation-pullDown">
						<i class="gi gi-vcard"></i> แก้ไขข้อมูลรายบุคคล<br>
						<h4 class="edpensook" style="color:white;">&nbsp;</h4>

					</h2>
					<div class="pull-left" style="margin-top:-30px">
						<div class="btn-group">
							<a href="{{ URL::previous() }}" class="btn btn-default"><i class="fa fa-angle-left"></i> <strong>กลับ</strong></span></a>
							
						</div>
					</div>
				</div>
				<!-- END Widget Header -->

				<!-- Widget Main -->
				<div class="widget-main">
					<div class="row">
						<div class="col-xs-7">
							{{ Form::open(array('url' => 'person/'.$person->id.'/update','class'=>'form-horizontal')) }}
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">ชื่อจริง</label>
								<div class="col-md-8">
									<input type="text" id="example-text-input" name="first_name" class="form-control" style="font-size:16px" value={{$person->first_name}} >
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">นามสกุล</label>
								<div class="col-md-8">
									<input type="text" id="example-text-input" name="last_name" class="form-control" style="font-size:16px" value={{$person->last_name}}>
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">ชื่อเล่น</label>
								<div class="col-md-8">
									<input type="text" id="example-text-input" name="nickname" class="form-control" style="font-size:16px" value={{$person->nickname}}>
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">คณะ</label>
								<div class="col-md-8">
									<input type="text" id="example-text-input" name="faculty" class="form-control" style="font-size:16px" value={{$person->faculty}}>
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">ภาค</label>
								<div class="col-md-8">
									<input type="text" id="example-text-input" name="dep" class="form-control" style="font-size:16px" value={{$person->dep}}>
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">ชั้นปี</label>
								<div class="col-md-8">
									<input type="text" id="example-text-input" name="year" class="form-control" style="font-size:16px" value={{$person->year}}>
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">เพศ</label>
								<div class="col-md-8">
									<label class="radio-inline" for="example-inline-radio1">
										<input type="radio" id="example-inline-radio1" name="gender" value="M" <?php if($person->gender=='M') echo 'checked="checked"'; ?> > ชาย
									</label>
									<label class="radio-inline" for="example-inline-radio2">
										<input type="radio" id="example-inline-radio2" name="gender" value="F" <?php if($person->gender=='F') echo 'checked="checked"';	 ?>> หญิง
									</label>
									
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">รหัสนิสิต</label>
								<div class="col-md-8">
									<input type="text" id="example-text-input" name="student_id" class="form-control" style="font-size:16px" value={{$person->student_id}}>
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">รหัสบัตรประชาชน</label>
								<div class="col-md-8">
									<input type="text" id="example-text-input" name="citizen_id" class="form-control" style="font-size:16px" value={{$person->citizen_id}}>
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">เบอร์โทร</label>
								<div class="col-md-8">
									<input type="text" id="example-text-input" name="phone" class="form-control" style="font-size:16px" value={{$person->phone}}>
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">วันเกิด</label>
								<div class="col-md-8">
									<input type="text" id="example-datepicker2" name="birthday" class="form-control input-datepicker" data-date-format="dd/mm/yy" style="font-size:16px" value={{$person->birthday}}>
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="example-text-input" style=" padding-top: 6px; ">ถึก</label>
								<div class="col-md-8">
									<input type="text" id="example-text-input" name="str_lvl" class="form-control" style="font-size:16px" value={{$person->str_lvl}}>
									{{-- <span class="help-block">This is a help text</span> --}}
								</div>
							</div>
							<div class="form-group form-actions">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" class="btn btn-sm btn-primary" style="font-size:16px" value="Change Submit"><i class="fa fa-angle-right"></i> ยืนยัน</button>
									
								</div>
							</div>
							
							{{ Form::close() }}   
						</div>
						<div class="col-xs-5">
							<!-- Your Plan Widget -->
							<div class="widget block">
								<div class="widget-extra themed-background-night">

									<h3 class="widget-content-light">
										&nbsp;<i class="fa fa-briefcase" ></i> งานย้อนหลัง 5 วัน
									</h3>
									
								</div>
								<div class="widget-extra-full">
									<div class="table-responsive">
										<table class="table table-vcenter table-striped">
											<thead>
												<tr>
													
													<th class="text-center">วันที่</th>
													<th class="text-center">ช่วงเวลา</th>
													<th class="text-center">งาน</th>
												</tr>
											</thead>
											<?php $count = count($datehistory) ?>
											<tbody>
												@for($i=0; $i<$count; $i++)
												<tr>
													<td class="text-center">{{$datehistory[$i]}}</td>
													<td class="text-center">{{$timehistory[$i]}}</td>
													<td class="text-center">{{$jobhistory[$i]}}</td>
												</tr>
												@endfor
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- END Your Plan Widget -->
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