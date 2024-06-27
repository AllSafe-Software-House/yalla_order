<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('src/CSS/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('src/CSS/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('src/CSS/output.css') }}" />
    @yield('css')
    <title>Insta Order</title>
</head>

@php
    $locale = App::getLocale();
@endphp
@if ($locale == 'ar')
    <body dir="rtl">
@else
    <body dir="ltr">
@endif
@include('front.layouts.nav')

@include('front.layouts.header')


@yield('content')


@include('front.layouts.footer')

@include('front.layouts.js')
@yield('js')

</body>

</html>