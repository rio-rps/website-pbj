<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Instansi Pemerintahan, Biro Pengadaan Barang Jasa, Provinsi Sumatera Selatan" />
    <meta name="description" content="" />
    <meta name="author" content="Biro Pengadaan Barang/ Jasa" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ config('app.name') }}</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/logo_prov.png')}}"/>

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css')}}"/>

    <!-- animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/animate.css')}}"/>

    <!-- owl-carousel -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/owl.carousel.css')}}">

    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/font-awesome.css')}}"/>

    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/themify-icons.css')}}"/>

    <!-- flaticon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/flaticon.css')}}"/>


    <!-- REVOLUTION LAYERS STYLES -->

    <link rel="stylesheet" type="text/css" href="{{ asset('public/revolution/css/rs6.css')}}">

    <!-- prettyphoto -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/prettyPhoto.css')}}">

    <!-- shortcodes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/shortcodes.css')}}"/>

    <!-- main -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/main.css')}}"/>

    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/responsive.css')}}"/>

</head>

<body>

    <div class="page">
        <header id="masthead" class="header ttm-header-style-02">
            @include('public/layout/header')
        </header>
        <div class="ttm-page-title-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
        @yield('slide')

        <div class="site-main ">
            <div class="sidebar ttm-bgcolor-white ">
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-9 content-area">
                            <article class="post ttm-blog-classic clearfix">
                                @yield('content')
                            </article>
                        </div>
                        <div class="col-lg-3 widget-area">
                            @yield('right')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--footer start-->
        <footer class="footer widget-footer clearfix">
            @include('public/layout/footer')
        </footer>
        <!--footer end-->

        <!--back-to-top start-->
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!--back-to-top end-->

    </div><!-- page end -->

    <!-- Javascript -->

    <script src="{{ asset('public/js/jquery.min.js')}}"></script>
    <script src="{{ asset('public/js/tether.min.js')}}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/js/jquery.easing.js')}}"></script>
    <script src="{{ asset('public/js/jquery-waypoints.js')}}"></script>
    <script src="{{ asset('public/js/jquery-validate.js')}}"></script>
    <script src="{{ asset('public/js/owl.carousel.js')}}"></script>
    <script src="{{ asset('public/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('public/js/numinate.min.js?ver=4.9.3')}}"></script>
    <script src="{{ asset('public/js/main.js')}}"></script>

    <!-- Revolution Slider -->
    <script src="{{ asset('public/revolution/js/revolution.tools.min.js')}}"></script>
    <script src="{{ asset('public/revolution/js/rs6.min.js')}}"></script>
    <script src="{{ asset('public/revolution/js/slider.js')}}"></script>

    <!-- Javascript end-->

</body>

</html>