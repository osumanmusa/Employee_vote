@extends('admin.layouts.adminapp')

  

@section('content')






    <div class="app-admin-wrap layout-sidebar-large clearfix">
@include('admin.include.header')

@include('admin.include.sidebar')

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">

            <hr>
            <div class="breadcrumb row col-lg-12">
                <div class="col-md-6">
                <ul>
                    <li><a href="">Employee Election</a></li>
                    <li>{{ now()->year }}</li>
                </ul>
                </div>
                <div class="col-md-2"></div>
          <div class="col-md-4" role="group" aria-label="Basic example" style="">
                            <button type="button" class="btn btn-raised ripple btn-raised-primary m-1 mb-3 pull-right" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-plus"></i> New Task</button>
                            </div>

                
            </div>

            <div class="separator-breadcrumb border-top"></div>
            <div class="row mt-4">
              <!-- begin exclusive datatable plugin -->
              <div class="col-lg-12 col-xl-12">
                <div class="card">
                  <div class="card-body">
                    <div class="ul-widget__head v-margin">
                      <div class="ul-widget__head-label">
                        <h3 class="ul-widget__head-title">

                        </h3>
                      </div>
                      
                    
                    </div>

                    <div class="ul-widget-body">
                      <div class="ul-widget3">
                        <div class="table">
                          <table id="feature_disable_table" class="display table table-striped " style="width: 100%;">
                            <thead>
                              <tr class="ul-widget6__tr--sticky-th">
                                <th scope="col">#</th>
                                <th scope="col">Department Name</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                              <!-- start tr -->
                              <tr>
                                <th scope="row">
                                  <label class="checkbox checkbox-outline-info">
                                    <input type="checkbox" checked="" />

                                    <span class="checkmark"></span>
                                  </label>
                                </th>
                                <td>{{$department->department_name}}</td>
                                <td>
                                  <span class=" p-2 m-1">{{$department->created_at}}</span>
                                </td>
                                <td>
                                  <button type="button" class="btn bg-white _r_btn border-0" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="_dot _inline-dot bg-primary"></span>
                                    <span class="_dot _inline-dot bg-primary"></span>
                                    <span class="_dot _inline-dot bg-primary"></span>
                                  </button>
                                  <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; transform: translate3d(0px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item ul-widget__link--font" href="#">
                                      <i class="i-Bar-Chart-4"> </i>
                                      Export</a>
                                    <a class="dropdown-item ul-widget__link--font" href="#">
                                      <i class="i-Data-Save"> </i>
                                      Save
                                    </a>
                                    <a class="dropdown-item ul-widget__link--font" href="#">
                                      <i class="i-Duplicate-Layer"></i>
                                      Import</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item ul-widget__link--font" href="#">
                                      <i class="i-Folder-Download"></i>
                                      Update</a>
                                    <a class="dropdown-item ul-widget__link--font" href="#">
                                      <i class="i-Gears-2"></i>
                                      Customize</a>
                                  </div>
                                </td>
                              </tr>
                              <!-- end tr -->
                              @endforeach
                                                          </tbody>
                          </table>
                        </div>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <li class="page-item">{{$departments->links()}}</li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end::exclusive datatable plugin  -->




          </div>






        </div>





        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
          <form action="{{ route('admin.department.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
       
      <div class="modal-body">
     
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
              <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="department Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append ">
                         <span class="input-group-text" id="basic-addon2"><i class="fab fa-user mr-1"></i></span>
                    </div>
              </div>
              
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>
    
@endsection