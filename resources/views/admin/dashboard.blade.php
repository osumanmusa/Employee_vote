@extends('admin.layouts.adminapp')

  

@section('content')






    <div class="app-admin-wrap layout-sidebar-large clearfix">
@include('admin.include.header')

@include('admin.include.sidebar')

       <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
            <hr>

                <div class="separator-breadcrumb border-top"></div>

                <!-- content goes here -->
<div class="row col-12">
    <div class="breadcrumb col-7">
                    <h1>MGA Voting System</h1>
                    <ul>
                        <li><a href="">Employee Of the Month</a></li>
                        <li>Poll Statistics</li>

                    </ul>

                </div>
                <div class="col-5 text-right pull-right">
                    <div class="mb-0 ">
                   <span> {{ now()->year }}</span>

                </div>
                 </div>
</div>

<div class="separator-breadcrumb border-top"></div>
                 <div class="row">
                 <!-- email -->
@foreach($elects as $elect)
                        <div class="col-md-4 col-lg-4">
                            <div class="card mb-2  o-hidden">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <h5 class="t-font-bolder">Congrats</h5>
                                            <div>
                                                <div class="p-3 d-flex align-items-center border-bottom online contact">
                                                <img src="{{asset('assets/images/profiles/'.$elect->image)}}" class="avatar-sm rounded-circle mr-3" alt="">
                                            <div>
                                             <h6 class="m-0">{{$elect->name}}</h6>
                                                         <span class="text-muted text-small">{{$elect->role}}</span>
                                             </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h3 class="t-font-boldest">{{$elect->votes}}</h3>
                                            <small class="text-muted">votes</small>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress mt-3">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


@endforeach

                       

                    






                    </div>



                </section>
                <!-- end::section 4 -->


                </div>
                <!-- end of main content -->

                
                </div>
                <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    </div>
    <!--=============== End app-admin-wrap ================-->

@endsection