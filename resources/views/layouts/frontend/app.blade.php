<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets -->

    
    <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
<!-- Styles -->
<link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    @yield('css')
    
</head>
<body>

    @include('layouts.frontend.partial.header')

    @yield('content')

    @include('layouts.frontend.partial.footer')
	



  <!-- Scripts -->
  <script src="{{ asset('assets/frontend/js/jquery-1.12.4.min.js') }}"></script> 
  <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
 
    @yield('js')

</body>
</html>
