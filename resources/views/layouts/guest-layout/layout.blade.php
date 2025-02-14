<!DOCTYPE html>
<html style="overflow-x: hidden;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    <link rel="preload" href="{{ Vite::asset('resources/fonts/inter.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">--}}
{{--    <link rel="preload" href="{{ Vite::asset('resources/fonts/kalam.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">--}}
    @vite('resources/js/app.js')

    <link rel="icon" href="{{ URL::asset('assets/images/favicon.png') }}">
    @stack('css')
</head>

<body>

@include('layouts.guest-layout.topbar')

@yield('content')

@include('layouts.guest-layout.footer')

@stack('scripts')

</body> </html>
