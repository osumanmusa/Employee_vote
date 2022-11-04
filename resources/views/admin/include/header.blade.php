        <div class="main-header">
            <div class="logo">
                <img src="{{asset('assets/images/profiles/'.Auth::user()->image)}}" alt="">
            </div>

            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="d-flex align-items-center">
                <!-- Mega menu -->
                <div class=" mega-menu d-none d-md-block">
                    <a href="#" class="btn text-muted mr-3" id="dropdownMegaMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Election Time-Left :</a>
                   
                </div>
                <!-- / Mega menu -->
                <div class="card badge">
                   <h3 class="text-white"></h3>
                </div>
            </div>

            <div style="margin: auto"></div>

            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <!-- Grid menu Dropdown -->



                <!-- User avatar dropdown -->
                <div class="avatar-dropdown">
                            <div class="user col align-self-end">
                                <img src="{{asset('assets/images/profiles/'.Auth::user()->image)}}" id="userDropdown" alt="" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <div class="dropdown-header">
                                       <a class="dropdown-item"> <i class="i-Lock-User mr-1"></i> {{ Auth::user()->name }}</a>
                                    </div>
                                    <div class="dropdown-header">
                                      <a class="dropdown-item">  <i class="i-Mail-2 mr-1"></i> {{ Auth::user()->email }}</a>
                                    </div>
                                    <div class="dropdown-header">
                                       <a class="dropdown-item" href="{{url('/admin/edit-profile/'.Auth::user()->id )}}"> <i class="i-File-Pictures mr-1"></i> Account settings </a>
                                    </div>
                                    <div class="dropdown-header">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="i-Router mr-1"></i> Sign out</a>
                                                 </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>

        </div>