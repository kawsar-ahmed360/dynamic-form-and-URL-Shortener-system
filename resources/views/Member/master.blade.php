<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from gymove.dexignzone.com/laravel/demo/index by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Apr 2023 05:59:18 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="LYADwiJvkdOVkRVMVOmVyIeokZ7MGs5WHd1GYYRf">
    <title>Member | Dashboard</title>
	
	<meta name="description" content="Some description for the page"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/images/favicon.png')}}">
  <link href="{{asset('Member/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{asset('Member/vendor/chartist/css/chartist.min.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{asset('Member/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{asset('Member/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{asset('Member/css/style.css')}}" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet" type="text/css"/>
				


</head>

<body>

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

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{route('home')}}" class="brand-logo" style="border-bottom:1px solid silver">
						
				<img class="logo-compact" src="{{asset('logo01 (2).png')}}" alt="">
                <img style="min-width: 181px !important;" class="brand-title" src="{{asset('logo01 (2).png')}}" alt="">
				
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
        


<!--**********************************
  Header start
***********************************-->
<div class="header">
  <div class="header-content">
    <nav class="navbar navbar-expand">
      <div class="collapse navbar-collapse justify-content-between">
        <div class="header-left">
          <div class="dashboard_bar">
           Hi,{{Auth::user()->name}}           </div>
        </div>
        <ul class="navbar-nav header-right">
          <li class="nav-item">
            <div class="input-group search-area d-xl-inline-flex d-none">
              <div class="input-group-append">
                <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
              </div>
              <input type="text" class="form-control" placeholder="Search here...">
            </div>
          </li>
         
          <li class="nav-item dropdown header-profile">
            <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
              <img src="{{asset('Member/images/profile/17.jpg')}}" width="20" alt=""/>
              <div class="header-info">
                <span class="text-black"><strong>{{Auth::user()->name}}</strong></span>
                <p class="fs-12 mb-0">Member</p>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="app-profile.html" class="dropdown-item ai-icon">
                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <span class="ml-2">Profile </span>
              </a>
             
              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">
                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                <span class="ml-2">Logout </span>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
              </a>
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
		
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <!--**********************************
  Sidebar start
***********************************-->
<div class="deznav">
  <div class="deznav-scroll">
    <ul class="metismenu" id="menu">
      <li><a class="ai-icon" href="{{route('home')}}" aria-expanded="false">
        <i class="flaticon-381-networking"></i>
        <span class="nav-text">Dashboard</span>
      </a>
      
      </li>
     
      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-television"></i>
        <span class="nav-text">My Event Category</span>
      </a>
      <ul aria-expanded="false">
     
        <li><a href="{{route('MyEventList')}}">Category List</a></li>
       
      </ul>
      </li>


      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-television"></i>
        <span class="nav-text">URL Shortener </span>
      </a>
      <ul aria-expanded="false">
     
        <li><a href="{{route('UrlList')}}">URLShortener List</a></li>
       
      </ul>
      </li>
  
        
      </ul>
      </li>
    </ul>
    <div class="add-menu-sidebar">
      <img src="{{asset('Member/images/calendar.png')}}" alt="" class="mr-3">
      <p class="	font-w500 mb-0">Create Workout Plan Now</p>
    </div>
    <div class="copyright">
      <p><strong> Admin Dashboard</strong> © {{date('Y')}} All Rights Reserved</p>
      <p>Design <span class="heart"></span></p>
    </div>
  </div>
</div>
<!--**********************************
  Sidebar end
***********************************-->        <!--**********************************
            Sidebar end
        ***********************************-->

		
		
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
        <!-- row -->
          
           @yield('content')

        </div>

    </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        
		<!--**********************************
    Footer start
***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; by {{date('Y')}}</p>
    </div>
</div>
<!--**********************************
    Footer end
***********************************-->		
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
	<script src="{{asset('Member/vendor/global/global.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('Member/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('Member/vendor/chart.js/Chart.bundle.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('Member/vendor/owl-carousel/owl.carousel.js')}}" type="text/javascript"></script>

    
<script src="{{asset('Member/vendor/datatables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('Member/js/plugins-init/datatables.init.js')}}" type="text/javascript"></script>

    <script src="{{asset('Member/vendor/peity/jquery.peity.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('Member/vendor/apexchart/apexchart.js')}}" type="text/javascript"></script>
	<script src="{{asset('Member/js/dashboard/dashboard-1.js')}}" type="text/javascript"></script>
	<script src="{{asset('Member/js/custom.js')}}" type="text/javascript"></script>
	<script src="{{asset('Member/js/deznav-init.js')}}" type="text/javascript"></script>
	
<script id="DZScript" src="../../../dzassets.s3.amazonaws.com/w3-global8bb6.js?btn_dir=right"></script>

</body>

<!-- Mirrored from gymove.dexignzone.com/laravel/demo/index by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Apr 2023 05:59:47 GMT -->
</html>