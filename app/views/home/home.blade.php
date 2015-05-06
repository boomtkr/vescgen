@extends('home/main')

@section('content')
<div class="content-header content-header-media">
    <div class="header-section">
        <div class="row">
            <!-- Main Title (hidden on small devices for the statistics to fit) -->
            <div class="col-md-4 col-lg-4 hidden-xs hidden-sm">
                
                <h3 class="animation-hatch">
                    Welcome to <strong>VESC GEN</strong>erator.<br>
                    
                </h3>
                
            </div>
            <!-- END Main Title -->

            <!-- Top Stats -->
            <div class="col-md-8 col-lg-8">
                <div class="row text-center">
                    <div class="col-sm-1 hidden-xs">
                    </div>
                    <div class="col-sm-2 hidden-xs">
                        <h2 class="animation-hatch">
                            <strong>{{$senior_count}}</strong><br>
                            <small>Senior</small>
                        </h2>
                    </div>
                    <div class="col-sm-2 hidden-xs">
                        <h2 class="animation-hatch">
                            <strong>{{$junior_count}}</strong><br>
                            <small>Junior</small>
                        </h2>
                    </div>
                    <div class="col-sm-2 hidden-xs">
                        <h2 class="animation-hatch">
                            <strong>{{$more_count}}</strong><br>
                            <small>More</small>
                        </h2>
                    </div>
                    <!-- We hide the last stat to fit the other 3 on small devices -->
                    <div class="col-sm-2 hidden-xs">
                        <h2 class="animation-hatch">
                            <strong>{{$freshy_count}}</strong><br>
                            <small>Freshy</small>
                        </h2>
                    </div>
                    <div class="col-sm-3">
                        <h2 class="animation-hatch">
                            <strong>{{$user_count}}</strong><br>
                            <small><i class="fa fa-users"></i> Total</small>
                        </h2>
                    </div>
                </div>
            </div>
            <!-- END Top Stats -->
        </div>
    </div>
    <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
    {{-- <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow"> --}}
    {{ HTML::image('img/widget1_header.jpg', 'VESC Task Generator') }}
</div>
<!-- Mini Top Stats Row -->
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href={{asset('namelist')}} class="widget widget-hover-effect1">
            <div class="widget-simple text-center">
                <div class="widget-icon themed-background-autumn animation-fadeIn">
                    <i class="fa fa-download"></i>
                </div>
                <h3 class="widget-content text-center animation-pullDown">
                    อัพเดตรายชื่อ<br>
                    <small>Update List</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href={{asset('jobmgt')}} class="widget widget-hover-effect1">
            <div class="widget-simple text-center">
                <div class="widget-icon themed-background-spring animation-fadeIn">
                    <i class="gi gi-ax"></i>
                </div>
                <h3 class="widget-content text-center animation-pullDown">
                    แบ่งงาน<br>
                    <small>Generate Tasks</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href={{asset('jobtoday')}} class="widget widget-hover-effect1">
            <div class="widget-simple text-center">
                <div class="widget-icon themed-background-fire animation-fadeIn">
                    <i class="gi gi-imac"></i>
                </div>
                <h3 class="widget-content text-center animation-pullDown">
                    กระดานหน้าที่</strong>
                    <small>Task Board</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href={{asset('tmrchange')}} class="widget widget-hover-effect1">
            <div class="widget-simple text-center">
                <div class="widget-icon themed-background-amethyst animation-fadeIn">
                    <i class="gi gi-sorting"></i>
                </div>
                <h3 class="widget-content text-center animation-pullDown">
                    คนขึ้นลงพรุ่งนี้</strong>
                    <small>Tomorrow In and Out</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href={{asset('dailyname')}} class="widget widget-hover-effect1">
            <div class="widget-simple text-center">
                <div class="widget-icon themed-background-flatie animation-fadeIn">
                    <i class="hi hi-user"></i>
                </div>
                <h3 class="widget-content text-center animation-pullDown">
                    รายชื่อรายวัน</strong>
                    <small>Daily People List</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href={{asset('allname')}} class="widget widget-hover-effect1">
            <div class="widget-simple text-center">
                <div class="widget-icon themed-background-fancy animation-fadeIn">
                    <i class="gi gi-list"></i>
                </div>
                <h3 class="widget-content text-center animation-pullDown">
                 รายชื่อทั้งหมด</strong>
                 <small>People List</small>
             </h3>
         </div>
     </a>
     <!-- END Widget -->
 </div>
 <div class="col-sm-6 col-lg-3">
    <!-- Widget -->
    <a href={{asset('dailyjob')}} class="widget widget-hover-effect1">
        <div class="widget-simple text-center">
            <div class="widget-icon themed-background-coral animation-fadeIn">
                <i class="fa fa-briefcase"></i>
            </div>
            <h3 class="widget-content text-center animation-pullDown">
                หน้าที่รายวัน</strong>
                <small>Daily Task List</small>
            </h3>
        </div>
    </a>
    <!-- END Widget -->
</div>
<div class="col-sm-6 col-lg-3">
    <!-- Widget -->
    <a href={{asset('allwork')}} class="widget widget-hover-effect1">
        <div class="widget-simple text-center">
            <div class="widget-icon themed-background-default animation-fadeIn">
                <i class="fa fa-list-alt"></i>
            </div>
            <h3 class="widget-content text-center animation-pullDown">
                หน้าที่ทั้งหมด</strong>
                <small>Task List</small>
            </h3>
        </div>
    </a>
    <!-- END Widget -->
</div>
</div>
<!-- END Mini Top Stats Row -->
@stop