<!DOCTYPE html>
<html  class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('home/img/fav.png')}}">
    <!-- Author Meta -->
    <meta name="author" content="">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>MGA Voting System</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700" rel="stylesheet">

    <!--
CSS
============================================= -->

    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('home/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css')}}">

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

</head>

<body class="loaded">

   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 {!! Toastr::message() !!}   

    <!-- Start header section -->
    <header class="header-area" id="header-area">
        <div class="dope-nav-container breakpoint-off">
            <div class="container">
                <div class="row">
                    <!-- dope Menu -->
                    <nav class="dope-navbar justify-content-between" id="dopeNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="/user/home">
                            <img src="{{ asset('home/img/mlogo.png')}}" alt="" style="  width: 70px;
  height: 70px;
  border-radius:50%;
  border: 2px solid ash;
  filter: drop-shadow(0 0 5px #b2beb5);">
                        </a>
                        
                           <div class="">
                                <h3 class="text-center">MGA Employee Election</h3>
                               
                            </div>

                        <!-- Navbar Toggler -->
                        <div class="dope-navbar-toggler">
                            <span class="navbarToggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>

                        <!-- Menu -->
                        <div class="dope-menu">

                            <!-- close btn -->
                            <div class="dopecloseIcon">
                                <div class="cross-wrap">
                                    <span class="top"></span>
                                    <span class="bottom"></span>
                                </div>
                            </div>

                            <!-- Nav Start -->
                            <div class="dopenav">
                                <ul id="nav">
                                @if (Route::has('login'))
     
            
                                @auth
 <div class="dropdown">
      <a href="#"class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
        <img src="{{asset('assets/images/profiles/'.Auth::user()->image)}}" style="  width: 50px;
  height: 50px;
  border-radius:50%;
  border: 2px solid ash;
  filter: drop-shadow(0 0 8px #b2beb5);">
      </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>
 Profile</a>
   
 
    <a class="dropdown-item" href="{{ route('logout') }}" style="text-decoration: none;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-user-o" aria-hidden="true"></i>

                                         Logout
                                     </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
  </div>
</div>
 


                                @else
                                    <li>
                                    <a class="primary-btn" href="{{ route('login') }}" style="color: azure;text-decoration: none;"><i class="ti ti-user" ></i> Login</a>
                                    </li>
                                    @if (Route::has('register'))
                           
                           
                                    <li>
                                     <a class="primary-btn" href="{{ route('register') }}" style="color: azure;text-decoration: none;"> <i class="ti ti-user-alt"></i> Register</a>
                                    </li>
                                    @endif
                                    @endauth
                                @endif
                                
                            
                                </ul>

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Start header section -->

    <!-- Start banner section -->

    <!-- End banner section -->

    <section class="feature-section section-gap-full" id="feature-section" >
        <div class="container">
            <div class="row align-items-center feature-wrap" >
                <div class="col-lg-4 header-left">
                   <div class=" pb-30">
                    <div class="single-service">
                        <div class="overlay-bg"></div>
                       <center> <img src="{{asset('assets/images/profiles/'.Auth::user()->image)}}" class="img-fluid" style="  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 5px;
  width: 280px;
  height: 300px;" ></center>
                        <h4 class="text-center">{{Auth::user()->name}}</h4>
                        <p class="text-center">
                           Department: {{Auth::user()->department_name}}
                       
                        <p class="text-center">
                         Role:  {{Auth::user()->role}}
                        </p>
                      
                       
                    </div>
                </div>
                </div>
                <div class="col-lg-8">
                    <div class="row card">
                        <div class="col-md-12">
                            <div class="single-feature">
                                <div class="overlay-bg"></div>
                                <span class="ti-comments-smiley"></span>
                                <h4 class="pt-3">Profile Edit</h4>
                                <hr>
                                           <form class="needs-validation" action="{{url('/user/update-profile/'. Auth::user()->id)}}" method="post" enctype="multipart/form-data" novalidate>
                                               @csrf
                                            <div class=" mb-3">
                                                <label>Name</label>
                                               <div class="input-group">
                                                <input type="text" class="form-control" value="{{Auth::user()->name}}" aria-label="comment" name="name">
                                            </div>
                                            </div>
                                            <div class=" mb-3">
                                                <label>Email</label>
                                               <div class="input-group">
                                                <input type="text" class="form-control" value="{{Auth::user()->email}}" aria-label="comment" name="email">
                                            </div>
                                            </div>
                                            <div class=" mb-3">
                                                <label>Password</label>
                                               <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter password" aria-label="comment" name="password" value="">
                                                </div>
                                            </div>
                                            
                                            <div class=" mb-3">
                                                
                                                <div class=" mx-4">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                           </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
JS
============================================= -->
    <script src="{{ asset('home/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{ asset('home/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('home/js/jquery.parallax-scroll.js')}}"></script>
    <script src="{{ asset('home/js/dopeNav.js')}}"></script>
    <script src="{{ asset('home/js/main.js')}}"></script>
</body>

</html>
        

