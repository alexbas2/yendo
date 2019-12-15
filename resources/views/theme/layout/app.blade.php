<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Unco.Yendo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('theme/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="{{asset('theme/css/orionicons.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('theme/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('theme/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('theme/img/favicon.png?3')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <!--para conectar con api de google maps pass y libreria de direcciones-->
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJi7Yn_GQdgH7fFH1hEs0n2gGjs2Hh2Ew&libraries=places"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
<!-- navbar-->
@include('theme/layout/includes/header')
<div class="d-flex align-items-stretch" >
    @if(auth()->check())
        @include('theme.layout.includes.sidebar')
    @endif

    <div class="page-holder w-100 d-flex flex-wrap" >
        <div class="container-fluid px-xl-5">
            <br>
            {{-- content--}}

                 <div class="row mb-4" id="app">
                     @yield('content')
                    {{--<div class="col-lg-12 mb-4 mb-lg-0">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="h6 text-uppercase mb-0">Viajes disponibles</h2>
                            </div>
                            <div class="card-body">
                                <p class="text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="chart-holder">
                                    <canvas id="lineChart1" style="max-height: 14rem !important;" class="w-100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>







        </div>
        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 text-center text-md-left text-primary">
                        <p class="mb-2 mb-md-0">Unco.Yendo &copy; 2018-2020</p>
                    </div>

                </div>
            </div>
        </footer>
    </div>
</div>
<!-- JavaScript files-->
<script src="{{asset('theme/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('theme/vendor/popper.js/umd/popper.min.js')}}"> </script>
<script src="{{asset('theme/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('theme/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<script src="{{asset('theme/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</body>
</html>
