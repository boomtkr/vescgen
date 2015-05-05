<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	{{ HTML::style('css/bootstrap.css'); }}
  	{{ HTML::script('js/jquery.min.js'); }}
  	{{ HTML::script('js/bootstrap.min.js');}}
	<style>
		td{
			padding-right: 20px;
		}
	</style>
</head>
<body>
	<h3><a href={{asset('/')}}>back</a></h3>
	<ul style="list-style: none;">
		<li style="display: inline; padding-right: 20px"><a href={{asset('namelist')}}>อัพเดทรายชื่อ</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('jobmgt')}}>แบ่งงาน</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('jobtoday')}}>กระดานหน้าที่วันนี้</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('tmrchange')}}>คนขึ้นลงพรุ่งนี้</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('dailyname')}}>รายชื่อรายวัน</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('allname')}}>รายชื่อทั้งหมด</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('dailyjob')}}>หน้าที่รายวัน</a></li>
		<li style="display: inline; padding-right: 20px"><a href={{asset('allwork')}}>หน้าที่ทั้งหมด</a></li>
	</ul>

	<h4>Today มีคน {{$ppltodaycount}} คน</h4>
	<h4>Today : {{$today}}</h4>
	<h4>Tomorrow : {{$tomorrow}}</h4>
	<?php 
		$pplincount = count($pplinlist);
		$pploutcount = count($pploutlist);
	?>
	<br>
	<h4>คนขึ้น - {{$pplincount}} คน</h4>
	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addArriveModal">เพิ่มคนขึ้น</button>
	@foreach($pplinlist as $ppl)
		<h4>
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#postponeModal">เลื่อน</button>
			<a href={{asset('person/'.$ppl->id)}}>{{$ppl->nickname}}{{'#'}}{{$ppl->year}}</a>
		</h4>
	@endforeach
	<br>
	<h4>คนลง - {{$pploutcount}} คน</h4>
	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addDepartModal">เพิ่มคนลง</button>
	@foreach($pploutlist as $ppl)
		<h4>
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#postponeModal">เลื่อน</button>
			<a href={{asset('person/'.$ppl->id)}}>{{$ppl->nickname}}{{'#'}}{{$ppl->year}}</a>
		</h4>
	@endforeach

	@foreach($pploncamp as $ppl)
		{{$ppl->nickname}}
	@endforeach

<div class="modal fade" id="postponeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h2>เลื่อน Form</h2>
            </div>
            <div class="modal-body">
                <form role="form" action="#" method="post">
				    <div class="form-group">
				        <label for="email">Email address</label>
				        <input type="email" class="form-control" id="email" 
				        placeholder="Enter email">
				    </div>
				    <div class="form-group">
				        <label for="password">New Date</label>
				        <input type="password" class="form-control" 
				        id="password" placeholder="Password">
				    </div>
				    <button type="submit" class="btn btn-default"> ยันยืน </button>
				</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addArriveModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h2>เพิ่มคนขึ้น Form</h2>
            </div>
            <div class="modal-body">
                <form role="form" action="#" method="post">
				    <div class="form-group">
				        <label for="email">Email address</label>
				        <input type="email" class="form-control" id="email" 
				        placeholder="Enter email">
				    </div>
				    <table>
				    	@foreach($pploutcamp as $ppl)
				    	<tr>
				    		<td>{{$ppl->nickname}}{{'#'}}{{$ppl->year}}</td>
				    	</tr>
				    	@endforeach
				    </table>
				    <button type="submit" class="btn btn-default"> ยันยืน </button>
				</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addDepartModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h2>เพิ่มคนลง Form</h2>
            </div>
            <div class="modal-body">
                <form role="form" action="#" method="post">
                	<div class="">
                	</div>
				    <div class="form-group">
				        <label for="email">Email address</label>
				        <input type="email" class="form-control" id="email" 
				        placeholder="Enter email">
				    </div>
				    <table>
				    	@foreach($pploncamp as $ppl)
				    	<tr>
				    		<td>{{$ppl->nickname}}{{'#'}}{{$ppl->year}}</td>
				    	</tr>
				    	@endforeach
				    </table>
				    <button type="submit" class="btn btn-default"> ยันยืน </button>
				</form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


</body>
</html>