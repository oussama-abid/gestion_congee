<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>employe </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon.png') }}" >
    <link rel="icon" type="image/x-icon" href="{{asset('/assets/favicon.ico')}}" />

    <link href="{{ asset('/vendor/owl-carousel/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/jqvmap/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet"  href="{{ asset('fontawesome-free-5.15.1-web/css/all.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css" href="{{ asset('/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" href="{{ asset('/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link href="{{ URL::asset('css/jqvmap.min.css') }}" rel="stylesheet" type="text/css"/>




</head>

<body>

    @include('layouts.navbaremp')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->


        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <main role="main" >
            @yield('main')
        </main>

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">oussama abid</a> 2019</p>
               
            </div>
        </div>
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
    <!-- Required vendors -->
    <script src="{{ URL::asset('/vendor/global/global.min.js') }}"></script>
    <script src="{{ URL::asset('/js/quixnav-init.js') }}"></script>
    <script src="{{ URL::asset('/js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ URL::asset('/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('/vendor/morris/morris.min.js') }}"></script>


    <script src="{{ URL::asset('/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ URL::asset('/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ URL::asset('/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ URL::asset('/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ URL::asset('/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ URL::asset('/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


    <script src="{{ URL::asset('/js/dashboard/dashboard-1.js') }}"></script>

</body>

</html>