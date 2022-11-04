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
                             
                            <div class="ul-widget__head-label">
                        
                         <button type="button" class="btn btn-raised ripple btn-raised-primary m-1 mb-3 pull-right" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-file-pdf-o"></i> New Election</button>
                      </div>

                
                    </div>

                
            </div>

            <div class="separator-breadcrumb border-top"></div>
            <div class="row mt-4 ">
              <!-- begin exclusive datatable plugin -->
              <div class="col-lg-12 col-xl-12">
                <div class="card">
                  <div class="card-body mb-3">
                    <div class="ul-widget__head v-margin">
                      
                      
                    
                    </div>

                    <div class="ul-widget-body">
                      <div class="ul-widget3">
                        <div class="table-responsive ">

                          <table  id="feature_disable_table" class="display table table-striped " >
                            <thead>
                              <tr class="">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Month</th>
                                <th scope="col">Year</th>
                                <th scope="col">Election Status</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($elections as $election)
                              <!-- start tr -->
                              <tr>
                                <th scope="row">
                                  <label class="checkbox checkbox-outline-info">
                                    <input type="checkbox" checked="" />

                                    <span class="checkmark"></span>
                                  </label>
                                </th>
                                <td>{{$election->election_name}}</td>
                                <td>
                                  <span class="p-2 m-1">{{$election->election_month}}</span>
                                </td>
                                <td>
                                  <span>{{$election->election_year}} </span>
                                </td>
                                <td>
                                  @if($election->vote_session == 0)
                                  <span class="badge badge-primary"> Session :: In-Active </span>
                                  @elseif($election->vote_session == 1)
                                  <span class="badge badge-success"> Session :: Active</span>
                                  @else
                                  <span class="badge badge-danger"> Election has ended</span>
                                  @endif

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
                                    <a class="dropdown-item ul-widget__link--font" href="{{url('/admin/elections-start/'.$election->id)}}">
                                      <i class="i-Bar-Chart-4"> </i>
                                      Start Election</a>
                                    <a class="dropdown-item ul-widget__link--font" href="{{url('/admin/elections-stop/'.$election->id)}}">
                                      <i class="i-Data-Save"> </i>
                                      End Election
                                    </a>
                                    <a class="dropdown-item ul-widget__link--font" href="#">
                                      <i class="i-Duplicate-Layer"></i>
                                      Delete</a>
                                  </div>
                                </td>
                              </tr>
                              <!-- end tr -->
                              @endforeach
                                                          </tbody>
                          </table>
                        </div>
                        <nav aria-label="Page navigation">
                          <ul class="pagination">

                            <li class="page-item justify-content-center">
                              {{ $elections->links() }}
                            </li>
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


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
          <form action="{{ route('admin.store-elections') }}" method="POST" enctype="multipart/form-data">
            @csrf
       
      <div class="modal-body">
     
            
         <div class="input-group mb-3">
              <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">Election Name</span>
              </div>
              <input type="text" class="form-control" name="name" placeholder="name"  aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Election Month</span>
              </div>
             <select name="month" class="form-control form-select" id="validationCustom01" >
                 <option>Select Month</option>
                 <option value="January">January</option>
                 <option value="February">February</option> 
                 <option value="March">March</option> 
                 <option value="April">April</option> 
                 <option value="May">May</option> 
                 <option value="June">June</option> 
                 <option value="July">July</option> 
                 <option value="August">August</option> 
                 <option value="September">September</option> 
                 <option value="October">October</option> 
                 <option value="November">November</option> 
                 <option value="December">December</option>   
             </select>
            </div>

      <!--   <div class="input-group mb-3">
              <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">Start At</span>
              </div>
              <input type="date" class="form-control" name="start_time"   aria-describedby="basic-addon1">
          </div>

         <div class="input-group mb-3">
              <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">End At</span>
              </div>
              <input type="date" class="form-control" name="end_time"   aria-describedby="basic-addon1">
          </div> -->
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