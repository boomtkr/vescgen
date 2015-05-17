<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	{{ HTML::style('css/bootstrap.css'); }}
  	{{ HTML::script('js/jquery.min.js'); }}
  	{{ HTML::script('js/bootstrap.min.js');}}
	<style>
		td{
			padding-right: 12px;
		}
	</style>
</head>

</html>

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


					<h2 class="widget-content-light edpensook">
						<i class="fa fa-list-alt sidebar-nav-icon"></i> อัพเดตรายชื่อ<br>
						
					</h2>
					<div class="pull-right" style="margin-top:-30px">
						<div>
									<button type="button" class="btn btn-primary input-add" style="border-radius:25px"><strong>+</strong></button>
									<button type="button" class="btn btn-danger input-remove" style="border-radius:25px"><strong>-</strong></button>
								</div>
					</div>
				</div>
				<!-- END Widget Header -->
				{{Form::open(array('url'=>'/addpeople/save'))}}
				<!-- Widget Main -->
				<div class="widget-main">
					<div class="row">
						<div class="col-xs-12" style="margin-bottom:10px"><button type="submit" class="btn btn-primary" style="float:right;"><i class="fa fa-angle-right"></i> ยืนยัน</button></div>
						<div class="col-xs-2">
							<div class="table-responsive">
								<table class="table table-vcenter">
									<tbody>
										<tr>
											<td class="text-right">#</td>
										</tr>
										<tr>
											<td class="text-right" width="100px"  style=" height: 53px; ">รหัสประชาชน</td>
										</tr>
										<tr>
											<td class="text-right" width="100px"  style=" height: 53px; ">ชื่อจริง</td>
										</tr>
										<tr>
											<td class="text-right" width="100px"  style=" height: 53px; ">นามสกุล</td>
										</tr>
										<tr >
											<td class="text-right" width="100px"  style=" height: 53px; ">ชื่อเล่น</td>
										</tr>
										<tr>
											<td class="text-right" width="100px"  style=" height: 53px; ">เบอร์โทรติดต่อ</td>
										</tr>
										<tr >
											<td class="text-right" width="100px"  style=" height: 53px; ">เพศ</td>
										</tr>
										<tr >
											<td class="text-right" width="100px"  style=" height: 53px; ">คณะ</td>
										</tr>
										<tr >
											<td class="text-right" width="100px"  style=" height: 53px; ">ภาค</td>
										</tr>
										<tr >
											<td class="text-right" width="100px"  style=" height: 53px; ">รหัสนิสิต</td>
										</tr>
										<tr>
											<td class="text-right" width="100px"  style=" height: 53px; ">เบอร์โทร</td>
										</tr>
										<tr>
											<td class="text-right" width="100px"  style=" height: 53px; ">วันเกิด</td>
										</tr>
										<tr>
											<td class="text-right" width="100px"  style=" height: 53px; ">ชอบทำงาน</td>
										</tr>
										<tr>
											<td class="text-right" width="100px"  style=" height: 53px; ">วันขึ้น</td>
										</tr>
										<tr>
											<td class="text-right" width="100px"  style=" height: 53px; ">วันลง</td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
						<div class="col-xs-10" style="overflow-x:auto">
							<div class="input-column-responsive" style=" width: 150px;">
								<div class="table-responsive input-column" style="width:150px;float:left;display:inline;">
									<table class="table table-vcenter">
										<tbody>
											<tr>
												<td class="text-center">1</td>
											</tr>
											<tr>
												<td width="150px"><input type="text" class="form-control" name="citizen_id[]" /></td>
											</tr>
											<tr>
												<td width="150px"><input type="text" class="form-control" name="first_name[]" /></td>
											</tr>
											<tr>
												<td width="150px"><input type="text" class="form-control" name="last_name[]" /></td>
											</tr>
											<tr >
												<td width="150px"><input type="text" class="form-control" name="nickname[]" /></td>
											</tr>
											<tr>
												<td width="150px"><input type="text" class="form-control" name="year[]" /></td>
											</tr>
											<tr>
												<td width="150px">
												<select id="work-chosen" name="gender[]" class="form-control" data-placeholder="งาน" style="width: 100%;" >
													<option value="ช">ช</option>
													<option value="ญ">ญ</option>
												</select></td>
											</tr>
											<tr>
												<td width="150px"><input type="text" class="form-control" name="faculty[]" /></td>
											</tr>
											<tr>
												<td width="150px"><input type="text" class="form-control" name="dep[]" /></td>
											</tr>
											<tr >
												<td width="150px"><input type="text" class="form-control" name="student_id[]" /></td>
											</tr>
											<tr >
												<td width="150px"><input type="text" class="form-control" name="phone[]" /></td>
											</tr>
											<tr>
												<td width="150px"><input type="text" id="example-datepicker2" name="birthday[]" class="form-control input-datepicker input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"></td>
											</tr>
											<tr>
												<td width="150px"><select id="work-chosen" name="str_lvl[]" class="form-control" data-placeholder="งาน" style="width: 100%;" >
													<option value="1">หนัก</option>
													<option value="2">หนักมาก</option>
												</select></td>
											</tr>
											<tr>
												<td width="150px">
												<input type="text" id="example-datepicker2" name="date_in[]" class="form-control input-datepicker input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"></td>
											</tr>
											<tr>
												<td width="150px"><input type="text" id="example-datepicker2" name="date_out[]" class="form-control input-datepicker input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"></td>
											</tr>
										</tbody>
									</table>

								</div>
							
							</div>

						</div>

					</div>

				</div>
				<!-- END Widget Main -->
				{{Form::close()}}
			</div>
		</div>
		<!-- END Advanced Theme Color Widget Alternative -->
	</div>

</div>
<script type="text/javascript">
	var count_col = 1;
	$('.input-add').click(function(){
		count_col++;
		var col = "<div class='table-responsive added-input-column' style='width:150px;float:left;display:inline;'><table class='table table-vcenter'><tbody><tr><td class='text-center'>"+count_col+"</td></tr><tr><td width='150px'><input type='text' class='form-control' name='citizen_id[]' /></td></tr><tr><td width='150px'><input type='text' class='form-control' name='first_name[]' /></td></tr><tr><td width='150px'><input type='text' class='form-control' name='last_name[]' /></td></tr><tr ><td width='150px'><input type='text' class='form-control' name='nickname[]' /></td></tr><tr><td width='150px'><input type='text' class='form-control' name='year[]' /></td></tr><tr><td width='150px'><select id='work-chosen' name='gender[]' class='form-control' data-placeholder='งาน' style='width: 100%;' ><option value='ช'>ช</option><option value='ญ'>ญ</option></select></td></tr><tr><td width='150px'><input type='text' class='form-control' name='faculty[]' /></td></tr><tr><td width='150px'><input type='text' class='form-control' name='dep[]' /></td></tr><tr ><td width='150px'><input type='text' class='form-control' name='student_id[]' /></td></tr><tr ><td width='150px'><input type='text' class='form-control' name='phone[]' /></td></tr><tr><td width='150px'><input type='text' id='example-datepicker2' name='birthday[]' class='form-control input-datepicker input-datepicker-close' data-date-format='yyyy-mm-dd' placeholder='yyyy-mm-dd'></td></tr><tr><td width='150px'><select id='work-chosen' name='str_lvl[]' class='form-control' data-placeholder='งาน' style='width: 100%;' ><option value='1'>หนัก</option><option value='2'>หนักมาก</option></select></td></tr><tr><td width='150px'><input type='text' id='example-datepicker2' name='date_in[]' class='form-control input-datepicker input-datepicker-close' data-date-format='yyyy-mm-dd' placeholder='yyyy-mm-dd'></td></tr><tr><td width='150px'><input type='text' id='example-datepicker2' name='date_out[]' class='form-control input-datepicker input-datepicker-close' data-date-format='yyyy-mm-dd' placeholder='yyyy-mm-dd'></td></tr></tbody></table></div>";
		var w = count_col*150;
		// alert(w);
		$('.input-column-responsive').attr('style','width:'+w+'px;');
		$('.input-column-responsive').append(col);
	});

	$('.input-remove').click(function(){
		// alert();
		if(count_col>1){
		$('.added-input-column:last').remove();
		count_col--;
	}
	});
</script>


@stop