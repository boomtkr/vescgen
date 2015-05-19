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
	.form-group{
		margin-bottom: 0px;
	}
	.help-block{
		font-size: 8px;
	}

</style>
<div class="row edpensook">
	<div class="col-xs-12">
		<div class="widget">
			<div class="widget-advanced widget-advanced-alt">

				<!-- Widget Header -->
				<div class="widget-simple text-center themed-background-autumn">


					<h2 class="widget-content-light edpensook animation-pullDown">
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
				{{Form::open(array('url'=>'/addpeople/save','id'=>'form-validation','method'=>'post'))}}
				<!-- Widget Main -->
				<div class="widget-main">
					<div class="row">   
						<div class="col-xs-12" style="margin-bottom:10px">
							<button type="submit" class="btn btn-primary" style="float:right;margin-top: 4px;margin-bottom: 4px;"><i class="fa fa-angle-right"></i> ยืนยัน</button>
							<div class="col-xs-3" style="float:right;">
								<div class="list-group remove-margin">
							<a href="javascript:void(0)" class="list-group-item">
									<span class="pull-right" id="count-people"><strong>1</strong></span>
									<h4 class="list-group-item-heading remove-margin"><i class="gi gi-female"></i> จำนวนคน</h4>
									<p class="list-group-item-text"></p>
								</a>
								</div>
							</div>
							
						</div>
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
											<td class="text-right" width="100px"  style=" height: 53px; ">ชั้นปี</td>
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
											<td class="text-right" width="100px"  style=" height: 53px; ">ระดับถึก</td>
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
												<td>
													<div class="form-group">
														<div class="input-group">
															<input type="text" id="example-input1-group1" name="citizen_id[]" class="form-control"> 
														</div>	
													</div>
												</td>
											</tr>
											<tr>
												<td width="150px">
													<div class="form-group">
														<div class="input-group">
															<input type="text" id="example-input1-group1" class="form-control" name="first_name[]" />
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td width="150px">
													<div class="form-group">
													<div class="input-group">
														<input type="text" id="example-input1-group1" class="form-control" name="last_name[]" />
														</div>
													</div>
												</td>
											</tr>
											<tr >
												<td width="150px">
													<div class="form-group">
													<div class="input-group">
														<input type="text" id="example-input1-group1" class="form-control" name="nickname[]" />
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td width="150px">
													<div class="form-group">
														<select id="work-chosen" id="example-input1-group1" name="year[]" class="form-control" data-placeholder="งาน" style="width: 100%;" >
															<option value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select>
														
													</div>
												</td>
											</tr>
											<tr>
												<td width="150px">
													<select id="work-chosen" id="example-input1-group1" name="gender[]" class="form-control" data-placeholder="งาน" style="width: 100%;" >
														<option value="M">ช</option>
														<option value="F">ญ</option>
													</select>
													</td>
												</tr>
												<tr>
													<td width="150px">
														<div class="form-group">
														<div class="input-group">
															<input type="text" id="example-input1-group1" class="form-control" name="faculty[]" />
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td width="150px">
														<div class="form-group">
														<div class="input-group">
															<input type="text" id="example-input1-group1" class="form-control" name="dep[]" />
															</div>
														</div>
													</td>
												</tr>
												<tr >
													<td width="150px">
														<div class="form-group">
														<div class="input-group">
															<input type="text" id="example-input1-group1" class="form-control" name="student_id[]" />
															</div>
														</div>
													</td>
												</tr>
												<tr >
													<td width="150px">
														<div class="form-group">
														<div class="input-group">
															<input type="text" id="example-input1-group1" class="form-control" name="phone[]" />
															</div>
														</div>
													</td>
												</tr>
												
												<tr>
													<td width="150px"><select id="work-chosen" name="str_lvl[]" class="form-control" data-placeholder="งาน" style="width: 100%;" >
														<option value="2">หนัก</option>
														<option value="1">ธรรมดา</option>
													</select></td>
												</tr>
												<tr>
													<td width="150px">
														<div class="form-group">
														<div class="input-group">
															<input type="text" id="example-datepicker2" name="date_in[]" class="form-control input-datepicker input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" onchange="checkDate(this.value);">
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td width="150px">
														<div class="form-group">
														<div class="input-group">
															<input type="text" id="example-datepicker2" name="date_out[]" class="form-control input-datepicker input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" onchange="checkDate(this.value);">
															</div>
														</div>
													</td>
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
			var col = "<div class='table-responsive added-input-column' style='width:150px;float:left;display:inline;'><table class='table table-vcenter'><tbody><tr><td class='text-center'>"+count_col+"</td></tr><tr><td><div class='form-group'><div class='input-group'><input type='text' id='example-input1-group1' name='citizen_id[]' class='form-control'> </div</div></td></tr><tr><td width='150px'><div class='form-group'><div class='input-group'><input type='text' id='example-input1-group1' class='form-control' name='first_name[]' /></div></div></td></tr><tr><td width='150px'><div class='form-group'><div class='input-group'><input type='text' id='example-input1-group1' class='form-control' name='last_name[]' /></div></div></td></tr><tr ><td width='150px'><div class='form-group'><div class='input-group'><input type='text' id='example-input1-group1' class='form-control' name='nickname[]' /></div></div></td></tr><tr><td width='150px'><div class='form-group'><select id='work-chosen' id='example-input1-group1' name='year[]' class='form-control' data-placeholder='งาน' style='width: 100%;' ><option value='0'>0</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option></select></div></td></tr><tr><td width='150px'><select id='work-chosen' id='example-input1-group1' name='gender[]' class='form-control' data-placeholder='งาน' style='width: 100%;' ><option value='M'>ช</option><option value='F'>ญ</option></select></td></tr><tr><td width='150px'><div class='form-group'><div class='input-group'><input type='text' id='example-input1-group1' class='form-control' name='faculty[]' /></div></div></td></tr><tr><td width='150px'><div class='form-group'><div class='input-group'><input type='text' id='example-input1-group1' class='form-control' name='dep[]' /></div></div></td></tr><tr ><td width='150px'><div class='form-group'><div class='input-group'><input type='text' id='example-input1-group1' class='form-control' name='student_id[]' /></div></div></td></tr><tr ><td width='150px'><div class='form-group'><div class='input-group'><input type='text' id='example-input1-group1' class='form-control' name='phone[]' /></div></div></td></tr><tr><td width='150px'><select id='work-chosen' name='str_lvl[]' class='form-control' data-placeholder='งาน' style='width: 100%;' ><option value='2'>หนัก</option><option value='1'>ธรรมดา</option></select></td></tr><tr><td width='150px'><div class='form-group'><div class='input-group'><input type='text' id='example-datepicker2' name='date_in[]' class='form-control input-datepicker input-datepicker-close' data-date-format='yyyy-mm-dd' placeholder='yyyy-mm-dd' onchange='checkDate(this.value);'></div></div></td></tr><tr><td width='150px'><div class='form-group'><div class='input-group'><input type='text' id='example-datepicker2' name='date_out[]' class='form-control input-datepicker input-datepicker-close' data-date-format='yyyy-mm-dd' placeholder='yyyy-mm-dd' onchange='checkDate(this.value);'></div></div></td></tr></tbody></table></div>";
			var w = count_col*150;
		// alert(w);
		$('.input-column-responsive').attr('style','width:'+w+'px;');
		$('.input-column-responsive').append(col);
		$('#count-people').html(count_col);
		App.init();
		FormsValidation.init();
	});

$('.input-remove').click(function(){
		// alert();
		if(count_col>1){
			$('.added-input-column:last').remove();

			count_col--;
	$('#count-people').html(count_col);
		}
	});
</script>
<!-- Load and execute javascript code used only in this page -->
{{ HTML::script('proui/js/pages/formsValidation.js'); }}
<script>$(function(){ FormsValidation.init(); });</script>
<script type="text/javascript">
	function checkDate(date){
			var year = parseInt(date.substring(0,4))+543;
			var month = parseInt(date.substring(5,7));
			var day = parseInt(date.substring(8,10));

			var currentyear = <?php echo $year; ?>;
			var currentday = <?php echo $day; ?>;
			var currentmonth = <?php 
				switch ($month) {
				    case 'มกราคม':
				        echo 1;
				        break;
				    case 'กุมภาพันธ์':
				        echo 2;
				        break;
				    case 'มีนาคม':
				        echo 3;
				        break;
				    case 'เมษายน':
				        echo 4;
				        break;
				    case 'พฤษภาคม':
				        echo 5;
				        break;
				    case 'มิถุนายน':
				        echo 6;
				        break;
				    case 'กรกฎาคม':
				        echo 7;
				        break;
				    case 'สิงหาคม':
				        echo 8;
				        break;
				    case 'กันยายน':
				        echo 9;
				        break;
				    case 'ตุลาคม':
				        echo 10;
				        break;
				    case 'พฤศจิกายน':
				        echo 11;
				        break;
				    case 'ธันวาคม':
				        echo 12;
				        break;
				}
			 ?>;
			 // var checkdayin = 0;
			if( year < currentyear ||(year==currentyear &&month < currentmonth)||(year == currentyear && month == currentmonth && day < currentday )){
				// checkdayin = 1;
				alert('เลือกวันที่ผิด มันผ่านไปแล้วโว้ยยย');
			}
		}
</script>

@stop