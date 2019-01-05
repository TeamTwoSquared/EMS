@php
use App\Http\Controllers\svp\SVPsController;
if(!(SVPsController::checkLogged(0))){
header("Location: /svp/login");
die();
}
$svp=SVPsController::getSVP();                   
@endphp
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <!-- Required meta tags-->         
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <meta name="description" content="This is an Web Based Event Management System"> 
        <meta name="author" content="TeamTwoSquared"> 
        <meta name="keywords" content="ems event management template"> 
        <!-- CSRF Token -->         
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        <!-- Title Page-->         
        <title>{{ config('app.name', 'Laravel') }}</title>         
        <!-- Fontfaces CSS-->         
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
       <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link href="/svp/css/font-face.css" rel="stylesheet" media="all"> 
        <link href="/svp/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all"> 
        <link href="/svp/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all"> 
        <link href="/svp/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all"> 
        <!-- Bootstrap core CSS -->         
        <link href="/svp/bootstrap/css/bootstrap.css" rel="stylesheet"> 
        <!-- Custom styles for this template -->         
        <link href="/svp/style.css" rel="stylesheet">
        <!-- Bootstrap CSS-->         
        <link href="/svp/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all"> 
        <!-- Vendor CSS-->         
        <link href="/svp/vendor/animsition/animsition.min.css" rel="stylesheet" media="all"> 
        <link href="/svp/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all"> 
        <link href="/svp/vendor/wow/animate.css" rel="stylesheet" media="all"> 
        <link href="/svp/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all"> 
        <link href="/svp/vendor/slick/slick.css" rel="stylesheet" media="all"> 
        <link href="/svp/vendor/select2/select2.min.css" rel="stylesheet" media="all"> 
        <link href="/svp/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all"> 
        <link href="/svp/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all"> 
        <!-- Main CSS-->         
        <link href="/svp/css/theme.css" rel="stylesheet" media="all"> 
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <!-- External Styles -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <!-- External Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

        <!-- flora editer -->
        @stack('styles')
    </head>     
    <body class="animsition">
        <!-- MODALS -->
            @include('inc.modals')
        <!-- END MODALS -->
        <div class="page-wrapper" data-pg-collapsed> 
            <!-- MENU SIDEBAR-->     
            <aside class="menu-sidebar2"> 
                <div class="logo bg-ems-admin border-ems-admin"> 
                    <a href="/svp/dash"> 
                        <img src="/svp/images/icon/logo.png" alt="SVPDash" class="ems-admin-logo"/> 
                    </a>             
                </div>         
                <div class="menu-sidebar2__content js-scrollbar1"> 
                    <div class="account2"> 
                        <div class="image img-cir img-120"> 
                            <img src="/storage/images/profile/{{$svp->profilepic}}" alt="{{$svp->name}}"/> 
                        </div>
                        <h4 class="name">{{$svp->name}}</h4>
                        <p>@if($svp->level == 0) (New)
                            @elseif($svp->level == 3) (Top Rated)
                            @else 
                            (Level {{$svp->level}})
                            @endif
                        </p> 
                        <p class="card-text text-sm-center">
                            @for ($i = 0; $i < $svp->star; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                            {{$svp->star}}.0
                        </p>                 
                        <a href="/svp/logout">Sign out</a> 
                    </div>             
                    <nav class="navbar-sidebar2"> 
                        <ul class="list-unstyled navbar__list"> 
                            <li class="active has-sub"> 
                                <a class="js-arrow" href="/svp/dash"> <i class="fas fa-tachometer-alt"></i>Dashboard </a> 
                            </li>                                         
                            
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-shopping-basket"></i>Service
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="/svp/service">
                                            <i class="far fa-check-square"></i>Single Service</a>
                                    </li>
                                    <li>
                                        <a href="/svp/packageService">
                                            <i class="far fa-check-square"></i>Service Packages</a>
                                    </li>
                                </ul>
                            </li>
                            <li> 
                                <a href="/svp/client"> <i class="fas fa fa-user"></i>Clients</a> 
                            </li>                     
                            <li> 
                                <a href="/svp/booking"> <i class="fas fa fa-book"></i>Bookings</a> 
                            </li>
                            <li> 
                                <a href="/svp/support"> <i class="fa-support fa"></i>Support Center</a> 
                                    <span class="inbox-num">3</span> 
                                </li>                      
                        </ul>                 
                    </nav>             
                </div>         
            </aside>     
            <!-- END MENU SIDEBAR-->     
            <!-- PAGE CONTAINER-->     
            <div class="page-container2"> 
                <!-- HEADER DESKTOP-->         
                <header class="header-desktop2 bg-ems-admin border-ems-admin"> 
                    <div class="section__content section__content--p30"> 
                        <div class="container-fluid"> 
                            <div class="header-wrap2"> 
                                <div class="logo d-block d-lg-none"> 
                                    <a href="/svp/dash"> 
                                        <img src="/svp/images/icon/logo.png" alt="SVPDash"/> 
                                    </a>                             
                                </div>                         
                                <div class="header-button2"> 
                                    <div class="header-button-item js-item-menu"> 
                                        <i class="zmdi zmdi-search"></i> 
                                        <div class="search-dropdown js-dropdown"> 
                                            <form action=""> 
                                                <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..."/> 
                                                <span class="search-dropdown__icon"> <i class="zmdi zmdi-search"></i> </span> 
                                            </form>                                     
                                        </div>                                 
                                    </div>                             
                                    <div class="header-button-item has-noti js-item-menu"> 
                                        <i class="zmdi zmdi-notifications"></i> 
                                        <div class="notifi-dropdown js-dropdown"> 
                                            <div class="notifi__title"> 
                                                <p>You have 3 Notifications</p> 
                                            </div>                                     
                                            <div class="notifi__item"> 
                                                <div class="bg-c1 img-cir img-40"> 
                                                    <i class="zmdi zmdi-email-open"></i> 
                                                </div>                                         
                                                <div class="content"> 
                                                    <p>You got a email notification</p> 
                                                    <span class="date">April 12, 2018 06:50</span> 
                                                </div>                                         
                                            </div>                                     
                                            <div class="notifi__item"> 
                                                <div class="bg-c2 img-cir img-40"> 
                                                    <i class="zmdi zmdi-account-box"></i> 
                                                </div>                                         
                                                <div class="content"> 
                                                    <p>Your account has been blocked</p> 
                                                    <span class="date">April 12, 2018 06:50</span> 
                                                </div>                                         
                                            </div>                                     
                                            <div class="notifi__item"> 
                                                <div class="bg-c3 img-cir img-40"> 
                                                    <i class="zmdi zmdi-file-text"></i> 
                                                </div>                                         
                                                <div class="content"> 
                                                    <p>You got a new file</p> 
                                                    <span class="date">April 12, 2018 06:50</span> 
                                                </div>                                         
                                            </div>                                     
                                            <div class="notifi__footer"> 
                                                <a href="#">All notifications</a> 
                                            </div>                                     
                                        </div>                                 
                                    </div>                             
                                    <div class="header-button-item mr-0 js-sidebar-btn"> 
                                        <i class="zmdi zmdi-menu"></i> 
                                    </div>                             
                                    <div class="setting-menu js-right-sidebar d-none d-lg-block"> 
                                        <div class="account-dropdown__body"> 
                                            <div class="account-dropdown__item"> 
                                                <a href="/svp/profile"> <i class="zmdi zmdi-account"></i>Account</a> 
                                            </div>                                     
                                            <div class="account-dropdown__item"> 
                                                <a href="/svp/settings"> <i class="zmdi zmdi-settings"></i>Setting</a> 
                                            </div>                                     
                                            <div class="account-dropdown__item"> 
                                                <a href="/svp/billing"> <i class="zmdi zmdi-money-box"></i>Billing</a> 
                                            </div>
                                            <div class="account-dropdown__item"> 
                                                <a href="/svp/ads"> <i class="fab fa-buysellads"></i>Advertisements</a> 
                                            </div>                                     
                                            <div class="account-dropdown__item"> 
                                                <a href="/svp/support"> <i class="fa-support fa"></i>Support Center</a> 
                                            </div>                                     
                                            <div class="account-dropdown__item"> 
                                                <a href="/svp/logout"> <i class="zmdi zmdi-power"></i>Logout</a> 
                                            </div>                                     
                                        </div>                                 
                                    </div>                             
                                </div>                         
                            </div>                     
                        </div>                 
                    </div>             
                </header>         
                <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none"> 
                    <div class="logo bg-ems-admin"> 
                        <a href="/svp/dash"> 
                            <img src="/svp/images/icon/logo.png" alt="SVPDash"/> 
                        </a>                 
                    </div>             
                    <div class="menu-sidebar2__content js-scrollbar2"> 
                        <div class="account2"> 
                            <div class="image img-cir img-120"> 
                                <img src="/storage/images/profile/{{$svp->profilepic}}" alt="{{$svp->name}}"/> 
                            </div>                     
                            <h4 class="name">{{$svp->name}}</h4>
                            <p>@if($svp->level == 0) (New)
                                @elseif($svp->level == 3) (Top Rated)
                                @else 
                                (Level {{$svp->level}})
                                @endif
                            </p> 
                            <p class="card-text text-sm-center">
                                @for ($i = 0; $i < $svp->star; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                                {{$svp->star}}.0
                            </p>                 
                            <a href="/svp/logout">Sign out</a> 
                        </div>                 
                        <nav class="navbar-sidebar2"> 
                            <ul class="list-unstyled navbar__list"> 
                                <li class="active has-sub"> 
                                    <a class="js-arrow" href="/svp/dash"> <i class="fas fa-tachometer-alt"></i>Dashboard </a> 
                                </li>                         
                                <li> 
                                    <a href="svp/inbox"> <i class="fas fa-chart-bar"></i>Inbox</a> 
                                    <span class="inbox-num">3</span> 
                                </li> 
                                
                                <li> 
                                    <a href="/svp/service">Service</a> 
                                </li>
                                
                    
                                <li> 
                                    <a href="/svp/client"> <i class="fas fa fa-user"></i>Clients </a> 
                                </li>                         
                                <li> 
                                    <a href="/svp/booking"> <i class="fas fa fa-book"></i>Bookings </a> 
                                </li>                         
                            </ul>                     
                        </nav>                 
                    </div>             
                </aside>         
                <!-- END HEADER DESKTOP-->         
                                    
                                   
                <!-- BREADCRUMB-->                 
                <section class="statistic"> 
                    <div class="container-fluid"> 
                        <br>
                        @include('inc.messages')
                    </div>                    
                </section>                 
    <!-- END BREADCRUMB-->  
                @yield('content')     
                <section> 
                    <div class="container-fluid"> 
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="copyright"> 
                                    <p>Copyright © 2018 EMS. All rights reserved.</p> 
                                </div>                         
                            </div>                     
                        </div>                 
                    </div>             
                </section>         
                <!-- END PAGE CONTAINER-->         
            </div>     
        </div>         
        <!-- Jquery JS-->         
        <script src="/svp/vendor/jquery-3.2.1.min.js"></script>    
        <!-- Bootstrap JS-->         
        <script src="/svp/vendor/bootstrap-4.1/popper.min.js"></script>         
        <script src="/svp/vendor/bootstrap-4.1/bootstrap.min.js"></script>         
        <!-- Vendor JS       -->         
        <script src="/svp/vendor/slick/slick.min.js">
    </script>         
        <script src="/svp/vendor/wow/wow.min.js"></script>         
        <script src="/svp/vendor/animsition/animsition.min.js"></script>         
        <script src="/svp/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>         
        <script src="/svp/vendor/counter-up/jquery.waypoints.min.js"></script>         
        <script src="/svp/vendor/counter-up/jquery.counterup.min.js">
    </script>         
        <script src="/svp/vendor/circle-progress/circle-progress.min.js"></script>         
        <script src="/svp/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>         
        <script src="/svp/vendor/chartjs/Chart.bundle.min.js"></script>         
        <script src="/svp/vendor/select2/select2.min.js">
    </script>         
        <script src="/svp/vendor/vector-map/jquery.vmap.js"></script>         
        <script src="/svp/vendor/vector-map/jquery.vmap.min.js"></script>         
        <script src="/svp/vendor/vector-map/jquery.vmap.sampledata.js"></script>         
        <script src="/svp/vendor/vector-map/jquery.vmap.world.js"></script>         
        <!-- Main JS-->         
        <script src="/svp/js/main.js"></script>   
        <!-- Custom Scripts -->
        <script>
                $(document).ready(function() {
                $('.table').DataTable();
            });
        </script>
        <!-- External Scripts -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
         
        <script src="/svp/js/main.js"></script> 
        
        @stack('scripts')
    </body>     
</html> 
<!-- end document-->
