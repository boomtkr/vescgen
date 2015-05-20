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
					การแบ่งงานเสร็จสมบูรณ์
					<a href={{asset('jobtoday')}}>คลิ๊ก เพื่อไปสู่กระดานหน้าที่</a>
					<!-- END Advanced Theme Color Widget Alternative -->
				</div>

			</div>
		</div>
	</div>
</div>
@stop