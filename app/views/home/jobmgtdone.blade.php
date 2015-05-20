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
					<div class="row">
					<!-- Success Alert Content -->
                                    <div class="alert alert-success alert-dismissable col-xs-6 col-xs-offset-3">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="fa fa-check-circle"></i> Success</h4> <br><h4 class="text-center"><strong>การแบ่งงานเสร็จสมบูรณ์ !</strong></h4><br>
                                    </div>
                                    <!-- END Success Alert Content -->	
                                    </div>
                                 
					{{-- <h3><a href={{asset('jobtoday')}}>คลิ๊ก เพื่อไปสู่กระดานหน้าที่</a></h3> --}}
					<!-- END Advanced Theme Color Widget Alternative -->
				</div>
				
				
        	
   
			</div>
		</div>
	</div>

	<div class="col-xs-3 col-xs-push-4">
        <!-- Widget -->
        <a href={{asset('jobtoday')}} class="widget widget-hover-effect1">
            <div class="widget-simple text-center">
                <div class="widget-icon themed-background-fire animation-fadeIn pull-right">
                    <i class="gi gi-imac"></i>
                </div>
                <h3 class="widget-content text-left animation-pullDown">
                    > กระดานหน้าที่</strong>
                    <small>Task Board</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
       </div>
</div>
@stop