<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')

    <title>{{ env('APP_NAME','Application') }} | @yield('title','User Information')</title>
    {!! Html::style('assets/frontend/css/bootstrap.min.css') !!}
    {!! Html::style('assets/frontend/css/style.css') !!}
    {!! Html::style('/assets/frontend/toaster/css/toaster.min.css') !!}
</head>
<body class="idea">

@yield('content')
{!! Html::script('assets/frontend/js/bootstrap.bundle.min.js') !!}
{!! Html::script('assets/frontend/toaster/js/jquery.min.js') !!}
{!! Html::script('assets/frontend/toaster/js/toaster.min.js') !!}
@if(session()->has('success'))
    {!! Toastr::success(session('success'), 'Success'); !!}
@endif

@if(session()->has('warning'))
    {!! Toastr::warning(session('warning'), 'Warning'); !!}
@endif

@if(session()->has('error'))
    {!! Toastr::error(session('error'), 'Error'); !!}
@endif

@if(session()->has('info'))
    {!! Toastr::info(session('info'), 'Info'); !!}
@endif

{!! Toastr::message() !!}
</body>
</html>
