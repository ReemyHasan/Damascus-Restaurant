<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
<title>@yield('title') | Damascus Restaurant</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">


    @yield('css')
<!-- Bootstrap Css -->
<link href="{{ URL::asset('/assets/css/bootstrap.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('/assets/css/icons.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('/assets/css/app.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/assets/css/new-style.css')}}"  rel="stylesheet" type="text/css" />
<!-- dropzone -->
@stack('css')


</head>

@section('body')

    <body class="authentication-bg">
    @show
    @yield('content')
    @stack('scripts')
</body>

</html>
