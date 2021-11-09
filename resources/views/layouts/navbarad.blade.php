    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <div style="display: none">
        {{ $notification=DB::table('notifications')->where('isadmin',0)->orderBy('id', 'desc')
        ->paginate(4)
         }}
    
    </div>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="" class="brand-logo">
                <img class="logo-compact"  alt="" src="{{ asset('/images/logo-text.png') }}">
                <img  src="{{ asset('/images/logo-text.png') }}"  style="width: 80% "alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="/notifiactionad" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <ul class="list-unstyled">

                                        @foreach ($notification  as $noti)
                                        
                     
                                                                                <li class="media dropdown-item">
                                                                                    <span class="success"><i class="ti-user"></i></span>
                                                                                    <div class="media-body">
                                                                                        <a href="/demandes">
                                                                                            <p><strong>{{ $noti->titre }}</strong> {{ $noti->content }}

                                                                                            </p>
                                                                                        </a>
                                                                                    </div>
                                                                                    <span class="notify-time"> {{ $noti->created_at }} </span>
                                                                                </li>
                                        @endforeach                                  
                                    </ul>
                                    <a class="all-notification" href="/demandes">See all  <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <a href="{{ route('user.index', ['user' => Auth::user()->id]) }}" class="dropdown-item">
                                        
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>

                                    <a  class="dropdown-item"   href="{{ route('logout') }}" 
                                    
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();" > <i class="icon-key"></i>
                                     {{ __('Logout') }}
                                     
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form>
                              
                                   
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
    
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu </li>
                    <li><a   href="/admin-dashboard"><i class="ti-bar-chart-alt"> </i>dashboard</a></li>
                    
                    <li><a href="/employes"><i class="ti-id-badge"> </i>employes</a></li>
                    <li><a href="/demandes"> <i class="ti-briefcase"> </i>demandes de congés</a></li>
                    
                    
                </ul>
            </div>
        </div>
    </div>
    
        <!--**********************************
            Sidebar start
        ***********************************-->
       