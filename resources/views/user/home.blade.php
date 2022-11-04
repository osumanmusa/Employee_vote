@extends('user.layouts.app')

  

@section('content')

@include('user.include.header')

     @include('user.include.sidebar')

        <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">

            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="statistics-card">
                  
                        <!-- Medal Card -->

                    <!-- Line Chart Card -->
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header align-items-start pb-0">
                                    <div>
                                        <h2 class="fw-bolder">78.9k</h2>
                                        <p class="card-text">clients</p>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <div class="avatar-content">
                                            <i data-feather="monitor" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                                <div id="line-area-chart-1"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header align-items-start pb-0">
                                    <div>
                                        <h2 class="fw-bolder">659.8k</h2>
                                        <p class="card-text">Training register</p>
                                    </div>
                                    <div class="avatar bg-light-success p-50">
                                        <div class="avatar-content">
                                            <i data-feather="user-check" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                                <div id="line-area-chart-2"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header align-items-start pb-0">
                                    <div>
                                        <h2 class="fw-bolder">28.7k</h2>
                                        <p class="card-text">Insurance clients</p>
                                    </div>
                                    <div class="avatar bg-light-warning p-50">
                                        <div class="avatar-content">
                                            <i data-feather="mail" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                                <div id="line-area-chart-3"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Line Chart Card -->
                        <!--/ Medal Card -->

              
                <!-- Knowledge base -->
                <section id="knowledge-base-content">
                    <div class="row kb-search-content-info match-height">
                        <!-- sales card -->
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="page-kb-category.html">
                                    <img src="{{ asset('udash/app-assets/images/illustration/personalization.svg')}}" class="card-img-top" alt="knowledge-base-image" />

                                    <div class="card-body text-center">
                                        <h4>Data Import</h4>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- marketing -->
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="page-kb-category.html">
                                    <img src="{{ asset('udash/app-assets/images/illustration/api.svg')}}" class="card-img-top" alt="knowledge-base-image" />
                                    <div class="card-body text-center">
                                        <h4>Data Export</h4>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- api -->
                        <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="page-kb-category.html">
                                    <img src="{{ asset('udash/app-assets/images/illustration/email.svg')}}" class="card-img-top" alt="knowledge-base-image" />
                                    <div class="card-body text-center">
                                        <h4>Data Entry</h4>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- Knowledge base ends -->
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection