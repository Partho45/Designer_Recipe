<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Styles -->
<link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    @yield('css')

    
</head>
<body>

    <section>
        <!-- Left Sidebar -->
        @include('layouts.backend.partial.sidebar')
        <!-- #END# Left Sidebar -->
    </section>

    <section style="margin-top: 5%;padding-top: 0%;">
        <div class="content">
            @yield('content')
        </div>
    </section>

      <!-- Scripts -->
  <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery-1.12.4.min.js') }}"></script> 

  <script>
        setTimeout(function() {
            $('#success').fadeOut('fast');
        }, 5000);
    </script>

    @yield('js')
</body>
</html>
