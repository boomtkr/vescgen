@extends('home/main')

@section('content')
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
                                            <small>Mountain Trip</small>
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
                                            <small>Sales Today</small>
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
                                            <small>Support Center</small>
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
                                            <small>Gallery</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href={{asset('dailyname')}} class="widget widget-hover-effect1">
                                    <div class="widget-simple text-center">
                                        <div class="widget-icon themed-background-amethyst animation-fadeIn">
                                            <i class="hi hi-user"></i>
                                        </div>
                                        <h3 class="widget-content text-center animation-pullDown">
                                            รายชื่อรายวัน</strong>
                                            <small>Gallery</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href={{asset('allname')}} class="widget widget-hover-effect1">
                                    <div class="widget-simple text-center">
                                        <div class="widget-icon themed-background-amethyst animation-fadeIn">
                                            <i class="gi gi-list"></i>
                                        </div>
                                        <h3 class="widget-content text-center animation-pullDown">
                                           รายชื่อทั้งหมด</strong>
                                            <small>Gallery</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href={{asset('dailyjob')}} class="widget widget-hover-effect1">
                                    <div class="widget-simple text-center">
                                        <div class="widget-icon themed-background-amethyst animation-fadeIn">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                        <h3 class="widget-content text-center animation-pullDown">
                                            หน้าที่รายวัน</strong>
                                            <small>Gallery</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href={{asset('allwork')}} class="widget widget-hover-effect1">
                                    <div class="widget-simple text-center">
                                        <div class="widget-icon themed-background-amethyst animation-fadeIn">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                        <h3 class="widget-content text-center animation-pullDown">
                                            หน้าที่ทั้งหมด</strong>
                                            <small>Gallery</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                        </div>
                        <!-- END Mini Top Stats Row -->
                        @stop