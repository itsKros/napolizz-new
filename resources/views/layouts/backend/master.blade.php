<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} | @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/design/assets/styles/css/themes/lite-purple.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/design/assets/styles/vendor/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('backend/design/assets/styles/vendor/datatables.min.css')}}">
    @yield('css')
    <link rel="stylesheet" href="{{asset('backend/assets/css/custom.css')}}">
</head>

<body class="text-left @guest auth @endguest">
    <!-- Pre Loader Strat  -->
    <div class='loadscreen' id="preloader">

        <div class="loader spinner-bubble spinner-bubble-primary">



        </div>
    </div>
    <!-- Pre Loader end  -->


    <div class="app-admin-wrap layout-sidebar-large">

        @auth

            @include('layouts.backend.header')

            @include('layouts.backend.sidebar')

        @endauth

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">

            <div class="main-content">

                @auth

                    <div class="breadcrumb">
                        <h1>@yield('title')</h1>
                        <ul>
                            <li><a href="#">{{str_replace('Controller', '', class_basename(Route::current()->controller))}}</a></li>
                            <li>@yield('title')</li>
                        </ul>
                    </div>

                    <div class="separator-breadcrumb border-top"></div>

                @endauth

                @yield('content')

            </div>

            @auth

                @include('layouts.backend.footer')

            @endauth

        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <script src="{{asset('backend/design/assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('backend/design/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/design/assets/js/vendor/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('backend/design/assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('backend/design/assets/js/datatables.script.js')}}"></script>
    <script src="{{asset('backend/design/assets/js/es5/script.min.js')}}"></script>
    <script src="{{asset('backend/design/assets/js/es5/sidebar.large.script.min.js')}}"></script>
    @yield('js')

</body>

</html>
