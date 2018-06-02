<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<!-- Mirrored from theme.crumina.net/html-olympus/01-LandingPage.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Apr 2018 21:39:11 GMT -->
<head>

    <title>
        @yield('title')
    </title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    {{--<script src="{{ asset('js/vue-trans.js') }}" defer></script>--}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <!-- Main Font -->


    <!-- Bootstrap CSS -->
@include('theme.css')



</head>
<body>
@include('theme.header')
<div id="app">

@yield('content')

<!-- Mirrored from theme.crumina.net/html-olympus/01-LandingPage.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Apr 2018 21:39:16 GMT -->
</div>
@yield('script')

@include('theme.js')

</body>
</html>