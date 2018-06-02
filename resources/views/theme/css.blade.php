<link rel="stylesheet" type="text/css" href="{{asset('Bootstrap/dist/css/bootstrap-reboot.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Bootstrap/dist/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Bootstrap/dist/css/bootstrap-grid.css')}}">

<!-- Main Styles CSS -->
{{--<link rel="stylesheet" type="text/css" href="{{asset('css/main.min.css')}}">--}}
<link rel="stylesheet" type="text/css" href="{{asset('css/fonts.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/notify.css')}}">
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet"/>



@if(config('app.locale')=='ar')
    <link href="{{ asset('css/mainRtl.css') }}" rel="stylesheet">
    @else
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">


