<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('admin/css/pace.min.css') }}">

  
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/images/favicon.ico') }}" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('admin/css/app-style.css') }}" rel="stylesheet" />
    <!-- skins CSS-->
    <link href="{{ asset('admin/css/skins.css') }}" rel="stylesheet" />
 <!-- font CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/6.4.95/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Pace CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/themes/blue/pace-theme-minimal.min.css">
<!-- Pace JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/pace.min.js"></script>

    @livewireStyles
</head>

<body>
  @include('layouts.inc.admin.navbar');
    <div id="wrapper">
        @include('layouts.inc.admin.sidebar');

        <div class="content-wrapper">
      
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>


    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    <!-- simplebar js -->
    <script src="{{ asset('admin/plugins/simplebar/js/simplebar.js') }}"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>

    <!-- Custom scripts -->
    <script src="{{ asset('admin/js/app-script.js') }}"></script>
    <script src="{{ asset('admin/js/pace.min.js') }}"></script>

    @livewireScripts
</body>

</html>
