<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Welcome to Franchisee Bazaar')</title>
    <meta name ="description" content="@yield('description', 'Welcome to Franchisee Bazaar')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    <meta name="google-site-verification" content="cCWOmrVnLWe2Wf4ICO4O7ILnaYIQWWNYkLDA9aigkus" />
    <meta name="twitter:card" content="twitter_image">

    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/5.6.1/css/jquery.mmenu.all.css" rel="stylesheet" type="text/css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css" rel="stylesheet">
    <link rel="canonical" href="{{ url()->current() }}">
    @yield('head')    

</head>

<body>
    <div class="login-bg">
        <div class="content">
            @include('layouts.navbar')
            @yield('content')
            @include('frontend.includes.footer')
        </div>
    </div>


    @include('frontend.includes.script')
</body>
<script>
        $(document).ready(function() {
            $("#ShowFilter").click(function() {
                $("#filter").show();
                $("#HideFilter").show();
                $("#ShowFilter").hide();
            });

            $("#HideFilter").click(function() {
                $("#filter").hide();
                $("#ShowFilter").show();
                $("#HideFilter").hide();
            });
        });
</script>
</html>
