@extends('admin.layouts.adminapp')

  

@section('content')






    <div class="app-admin-wrap layout-sidebar-large clearfix">
@include('admin.include.header')

@include('admin.include.sidebar')

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            


 

     <!-- ============ Body content start ============= -->
           


            <div class="card user-profile o-hidden mb-4">
                <div class="header-cover" style="background-image: url('{{asset('assets/images/profiles/'.$user->image)}}')"></div>
                <div class="user-info">
                    <img class="profile-picture avatar-lg mb-2" src="{{asset('assets/images/profiles/'.$user->image)}}" alt="">
                    <p class="m-0 text-24">{{$user->name}}</p>
                    <p class="text-muted m-0">{{$user->role}}</p>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="friends-tab" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false">Users</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="profileTabContent">
                        <div class="tab-pane fade active show" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">


                            <ul class="timeline clearfix">
                                <li class="timeline-line"></li>
                                <li class="timeline-item">
                                    <div class="timeline-badge">
                                        <i class="badge-icon bg-danger text-white i-Love-User"></i>
                                    </div>
                                    <div class="timeline-card card">
                                        <div class="card-body">
                                            <div class="mb-1">
                                                <strong class="mr-1">Name</strong>
                                                <p class="text-muted"><a href="#">{{$user->name}}</a></p>
                                            </div>
                                            <div class="mb-1">
                                                <strong class="mr-1">Email</strong>
                                                <p class="text-muted"><a href="#">{{$user->email}}</a></p>
                                            </div>

                                            
                                            
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-badge">
                                        <i class="badge-icon bg-primary text-white i-Cloud-Picture"></i>
                                    </div>
                                    <div class="timeline-card card">
                                        <div class="card-body">
                                            <div class="mb-1">
                                               
                                                
                                            </div>
                                           <form class="needs-validation" action="{{url('/admin/update-profile/'. $user->id)}}" method="post" enctype="multipart/form-data" novalidate>
                                               @csrf
                                            <div class="form-row mb-3">
                                                <label>Name</label>
                                               <div class="input-group">
                                                <input type="text" class="form-control" value="{{$user->name}}" aria-label="comment" name="name">
                                            </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                <label>Email</label>
                                               <div class="input-group">
                                                <input type="text" class="form-control" value="{{$user->email}}" aria-label="comment" name="email">
                                            </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                <label>Password</label>
                                               <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter password" aria-label="comment" name="password" value="">
                                                </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                <label>Profile Picture</label>
                                               <div class="input-group">
                                                <input type="file" class="form-control" value="{{$user->image}}" aria-label="comment" name="image" >
                                            </div>
                                            </div>
                                            <div class="form-row mb-3">
                                                
                                                <div class=" mx-4">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                           </form>
                                            
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="timeline clearfix">
                                <li class="timeline-line"></li>
                                <li class="timeline-group text-center">
                                    <button class="btn btn-icon-text btn-warning"><i class="i-Calendar-4"></i> Joined in {{$user->created_at->year}}</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <h4>Personal Information</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, commodi quam! Provident quis voluptate asperiores ullam, quidem odio pariatur. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem, nulla eos?
                                Cum non ex voluptate corporis id asperiores doloribus dignissimos blanditiis iusto qui repellendus deleniti aliquam, vel quae eligendi explicabo.
                            </p>
                            
                         
                        </div>

                        <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">

                        </div>

                    </div>
                </div>
            </div>

        <!-- ============ Body content End ============= -->





        </div>





        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

@endsection