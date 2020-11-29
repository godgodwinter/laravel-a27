<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from colorlib.com//polygon/adminty/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jan 2019 06:19:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>{{ ucfirst(config('app.name'))}} @yield('title') </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin-style/") }}/files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin-style/") }}/files/assets/icon/feather/css/feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin-style/") }}/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin-style/") }}/files/assets/css/jquery.mCustomScrollbar.css">

    @yield('stylecss')

</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="index.html">
                            <img class="img-fluid" src="{{ asset("admin-style/") }}/files/assets/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                           
                            
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset("admin-style/") }}/files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                        <span>Laravel 8.*</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                       
                                        <li>
                                            <a href="#logout">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

         
           
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="feather icon-watch"></i></span>
                                        <span class="pcoded-mtext" >Dashboard</span>
                                    </a>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-micon"><i class="feather icon-power"></i></span>
                                            <span class="pcoded-mtext" >Logout</span>
                                        </a>
                                    </li>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Halaman Developer</div>
                            <ul class="pcoded-item pcoded-left-item">
                                
                             
                                <li class="">
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>
                                        <span class="pcoded-mtext" >Documentation</span>
                                    </a>
                                </li>  
                                <li class="">
                                    <a href="#" target="_blank">
                                        <span class="pcoded-micon"><i class="feather icon-help-circle"></i></span>
                                        <span class="pcoded-mtext" >About Us</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Mastering Data Produk</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
                                        <span class="pcoded-mtext" >Suplier</span>
                                    </a>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-micon"><i class="feather icon-codepen"></i></span>
                                            <span class="pcoded-mtext" >Produk Kategori</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-micon"><i class="feather icon-credit-card"></i></span>
                                            <span class="pcoded-mtext" >Produk Satuan</span>
                                        </a>
                                    </li>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Mastering Data Pelanggan</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                        <span class="pcoded-mtext" >Kategori Pelanggan</span>
                                    </a>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                            <span class="pcoded-mtext" >Pelanggan</span>
                                        </a>
                                    </li>
                                   
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Stok dan Produk</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                                        <span class="pcoded-mtext" >Lihat Produk</span>
                                    </a>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                                            <span class="pcoded-mtext" >Tambah Stok (Proses Stok Barang)</span>
                                        </a>
                                    </li>
                                   
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-micon"><i class="feather icon-slash"></i></span>
                                            <span class="pcoded-mtext" >Stok Barang Habis</span>
                                        </a>
                                    </li>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Proses Jual</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="feather icon-plus-square"></i></span>
                                        <span class="pcoded-mtext" >Jual Baru</span>
                                    </a>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-micon"><i class="feather icon-tag"></i></span>
                                            <span class="pcoded-mtext" >Draft Penjualan</span>
                                        </a>
                                    </li>
                                   
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-micon"><i class="feather icon-tv"></i></span>
                                            <span class="pcoded-mtext" >Transaksi Selesai</span>
                                        </a>
                                    </li>
                                </li>
                            </ul>
                            <div class="pcoded-navigatio-lavel">Rekap Penjualan</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="feather icon-save"></i></span>
                                        <span class="pcoded-mtext" >Penjualan Bulan ini</span>
                                    </a>
                                    <li class="">
                                        <a href="#">
                                            <span class="pcoded-micon"><i class="feather icon-share"></i></span>
                                            <span class="pcoded-mtext" >Barang Belum Terjual</span>
                                        </a>
                                    </li>
                                   
                                 
                                </li>
                            </ul>
                           
                          
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    @yield('container')

                                      
                                </div>

                                {{-- <div id="styleSelector">

                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{{ asset("admin-style/") }}/files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{ asset("admin-style/") }}/files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{{ asset("admin-style/") }}/files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{ asset("admin-style/") }}/files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{ asset("admin-style/") }}/files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Javascript Here -->
@yield('javascripthere')

    <!-- Required Jquery -->
    <script data-cfasync="false" src="{{ asset("admin-style/") }}/{{ asset("admin-style/") }}/{{ asset("admin-style/") }}/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="{{ asset("admin-style/") }}/files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset("admin-style/") }}/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ asset("admin-style/") }}/files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="{{ asset("admin-style/") }}/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset("admin-style/") }}/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset("admin-style/") }}/files/bower_components/modernizr/js/modernizr.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset("admin-style/") }}/files/bower_components/chart.js/js/Chart.js"></script>
    <!-- amchart js -->
    <script src="{{ asset("admin-style/") }}/files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="{{ asset("admin-style/") }}/files/assets/pages/widget/amchart/serial.js"></script>
    <script src="{{ asset("admin-style/") }}/files/assets/pages/widget/amchart/light.js"></script>
    <script src="{{ asset("admin-style/") }}/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="{{ asset("admin-style/") }}/files/assets/js/SmoothScroll.js"></script>
    <script src="{{ asset("admin-style/") }}/files/assets/js/pcoded.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset("admin-style/") }}/files/assets/js/vartical-layout.min.js"></script>
    <script type="text/javascript" src="{{ asset("admin-style/") }}/files/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="{{ asset("admin-style/") }}/files/assets/js/script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>


<!-- Mirrored from colorlib.com//polygon/adminty/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jan 2019 06:21:14 GMT -->
</html>
