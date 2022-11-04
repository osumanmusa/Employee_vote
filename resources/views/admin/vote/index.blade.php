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
                    <h1>{{$election->election_name}}</h1>
                    <ul>
                        <li><a href="">Employee Of the Month</a></li>
                        <li>{{$election->election_month}}</li>

                    </ul>

                </div>
                <div class="col-5 text-right pull-right">
                    <div class="mb-0 ">
                   <span> {{$election->election_year}}</span>

                </div>
                 </div>
</div>

<div class="separator-breadcrumb border-top"></div>
                 <div class="row">
                     @if($v_employees->isEmpty())
                  <center> <h4> Your votes will appear here</h4></center>  
                     @else

                    @foreach($v_employees as $v_employee)
                 <!-- email -->

                        <div class="col-lg-3 col-xl-3 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-profile mb-4">
                                        <div class="ul-widget-card__user-info">
                                            <img class="profile-picture avatar-lg mb-2"  src="{{asset('assets/images/profiles/'.$v_employee->image)}}"  alt="">
                                            <p class="m-0 text-24">{{$v_employee->name}}</p>
                                            <p class="text-muted m-0"></p>
                                            <p class="text-muted m-0">{{$v_employee->role}}</p>
                                        </div>
                                    </div>
                                    <div class="  mt-2">
                                      <center>  <button type="button" class="btn btn-success btn-md m-1"> Great <i class="fa fa-thumbs-up"></i></button></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                   
                    @endif



                       

                    






                    </div>








                <div class="separator-breadcrumb border-top"></div>

                <!-- content goes here -->
<div class="row col-12">
    <div class="breadcrumb col-7">
                    <h1>{{$election->election_name}}</h1>
                    <ul>
                        <li><a href="">Employee Of the Month</a></li>
                        <li>{{$election->election_month}}</li>

                    </ul>

                </div>
                <div class="col-5 text-right pull-right">
                    <div class="mb-0 ">
                   <span> {{$election->election_year}}</span>

                </div>
                 </div>
</div>

<div class="separator-breadcrumb border-top"></div>
                 <div class="row">

                    @foreach($employees as $employee)
                 <!-- email -->

                        <div class="col-lg-3 col-xl-3 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-profile mb-4">
                                        <div class="ul-widget-card__user-info">
                                            <img class="profile-picture avatar-lg mb-2"  src="{{asset('assets/images/profiles/'.$employee->image)}}"  alt="">
                                            <p class="m-0 text-24">{{$employee->name}}</p>
                                            <p class="text-muted m-0"></p>
                                            <p class="text-muted m-0">{{$employee->role}}</p>
                                        </div>
                                    </div>
                                    <div class="  mt-2">
                                      <center>  <button type="submit" class="btn btn-primary btn-md m-1"  onclick="window.location.href='{{url('/admin/vote-store/'.$employee->id)}}'">Vote <i class="fa fa-thumbs-up"></i></button></center>
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