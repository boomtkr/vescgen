<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>VESC GEN</title>

        <meta name="description" content="">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        {{-- <link rel="stylesheet" href="css/bootstrap.min.css"> --}}
        {{ HTML::style('proui/css/bootstrap.min.css'); }}

        <!-- Related styles of various icon packs and plugins -->
        {{-- <link rel="stylesheet" href="css/plugins.css"> --}}
        {{ HTML::style('proui/css/plugins.css'); }}

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        {{-- <link rel="stylesheet" href="css/main.css"> --}}
        {{ HTML::style('proui/css/main.css'); }}

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        {{-- <link rel="stylesheet" href="css/themes.css"> --}}
        {{ HTML::style('proui/css/themes.css'); }}
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (enables responsive CSS code on browsers that don't support it, eg IE8) -->
        {{ HTML::script('proui/js/vendor/modernizr-respond.min.js'); }}
    </head>
    <body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>VESC GEN</strong>erator</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
                </div>
            </div>
            <!-- END Preloader -->

            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
                
                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Brand -->
                            {{-- <a href="#" class="sidebar-brand">
                                <i class="fa fa-cogs"></i><span class="sidebar-nav-mini-hide"><strong>VESC</strong> GEN</span>
                            </a> --}}
                            <!-- END Brand -->

                            <!-- User Info -->
                            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                                <div class="sidebar-user-avatar">
                                    <a href="/">
                                        {{ HTML::image('img/logo1.png', 'VESC43') }}
                                    </a>
                                </div>
                                <div class="sidebar-user-name"><a href="/" style="color:#ffffff;text-decoration:none">V E S C <strong>G&nbsp; E&nbsp; N</strong></a></div>
                            </div>
                            <div class="sidebar-section clearfix sidebar-nav-mini-hide">
                                {{-- <div style="font-size:20px"><small>{{$day}} {{$month}} {{$year}}<br>Manday {{$thmanday}}</small></div> --}}
                            </div>
                            <!-- END User Info -->

                            

                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav edpensook">
                                <li class="sidebar-header">
                                    <span class="sidebar-header-options clearfix"><a href="javascript:void(0)"><i class="gi gi-settings"></i></a><a href="javascript:void(0)" ><i class="gi gi-lightbulb"></i></a></span>
                                    <span class="sidebar-header-title">Main Menu</span>
                                </li>
                                <li>
                                    <a href="/" class="{{ Route::getCurrentRoute()->getPath()=='/' ? 'active' : ''}}"><i class="fa fa-th-large sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">หน้าแรก</span></a>
                                </li>
                                <li>

                                    <a href={{asset('addpeople')}}  class="{{ strpos(Route::getCurrentRoute()->getPath(), 'addpeople') !== false ? 'active' : ''}}"><i class="fa fa-download sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">อัพเดตรายชื่อ</span></a>
                                </li>
                                <li>
                                    <a href={{asset('jobmgt')}}  class="{{ strpos(Route::getCurrentRoute()->getPath(), 'jobmgt') !== false ? 'active' : ''}}"><i class="gi gi-ax sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">แบ่งงาน</span></a>
                                </li>
                                <li>
                                    <a href={{asset('jobtoday')}} class="{{ strpos(Route::getCurrentRoute()->getPath(), 'jobtoday') !== false ? 'active' : ''}}"><i class="gi gi-imac sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">กระดานหน้าที่วันนี้</span></a>
                                    
                                </li>
                                <li>
                                    <a href={{asset('tmrchange')}}  class="{{ strpos(Route::getCurrentRoute()->getPath(), 'tmrchange') !== false ? 'active' : ''}}"><i class="gi gi-sorting sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">คนขึ้นลงพรุ่งนี้</span></a>
                                </li>
                                <li>
                                    <a href={{asset('dailyname')}} class="{{ strpos(Route::getCurrentRoute()->getPath(), 'dailyname') !== false ? 'active' : ''}}"><i class="hi hi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">รายชื่อรายวัน</span></a>
                                </li>
                                <li>
                                    <a href={{asset('allname')}} class="{{ strpos(Route::getCurrentRoute()->getPath(), 'allname') !== false ? 'active' : ''}}"><i class="gi gi-list sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">รายชื่อทั้งหมด</span></a>
                                </li>
                                <li>
                                    <a href={{asset('dailyjob')}}  class="{{ strpos(Route::getCurrentRoute()->getPath(), 'dailyjob') !== false ? 'active' : ''}}"><i class="fa fa-briefcase sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">หน้าที่รายวัน</span></a>
                                </li>
                                <li>
                                    <a href={{asset('allwork')}}  class="{{ strpos(Route::getCurrentRoute()->getPath(), 'allwork') !== false ? 'active' : ''}}"><i class="fa fa-list-alt sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">หน้าที่ทั้งหมด</span></a>
                                </li>
                                
                            </ul>
                            <!-- END Sidebar Navigation -->

                            
                     
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
                        
                        <!-- END Dashboard Header -->

                        @yield('content')

                        
                    </div>
                    <!-- END Page Content -->

                    <!-- Footer -->
                    <footer class="clearfix">
                        <div class="pull-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://vesc.eng.chula.ac.th" target="_blank">SENIORS</a>
                        </div>
                        <div class="pull-left">
                            <span id="year-copy"></span> &copy; <a href="http://vesc.eng.chula.ac.th" target="_blank">VESC 43</a>
                        </div>
                    </footer>
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
        <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
                    </div>
                    <!-- END Modal Header -->

                    
                </div>
            </div>
        </div>
        <!-- END User Settings -->

        <!-- Remember to include excanvas for IE8 chart support -->
        <!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.2.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
         {{-- <script src="js/vendor/bootstrap.min.js"></script>
        // <script src="js/plugins.js"></script>
        // <script src="js/app.js"></script> --}}
        {{ HTML::script('proui/js/vendor/bootstrap.min.js'); }}
        {{ HTML::script('proui/js/plugins.js'); }}
        {{ HTML::script('proui/js/app.js'); }}


        <!-- Load and execute javascript code used only in this page -->
        {{-- // <script src="js/pages/index.js"></script> --}}
        {{ HTML::script('proui/js/pages/index.js'); }}
        <script>$(function(){ Index.init(); });</script>
        <script type="text/javascript">
        $('.test li').click(function(){
            alert();
        });
        </script>
    </body>
</html> 