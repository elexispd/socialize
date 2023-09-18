<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{asset('images/favicon.png')}}" rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>Socialize</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Elexis Social is a social media project built by promise">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('css/icons.css')}}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/uikit.css') }}"">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">


</head>
<body>


    <div id="wrapper">

        <!-- Header -->
        @include("partials._header")

        <!-- sidebar -->
        @include("partials._sidebar-links")


        <!-- Main Contents -->
        @yield('content')

    </div>



    <!-- For Night mode -->
    <script>
        (function (window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = localStorage.getItem('gmtNightMode');
            if (nightMode) {
                document.documentElement.className += ' night-mode';
            }
        })(window, document);

        (function (window, document, undefined) {

            'use strict';

            // Feature test
            if (!('localStorage' in window)) return;

            // Get our newly insert toggle
            var nightMode = document.querySelector('#night-mode');
            if (!nightMode) return;

            // When clicked, toggle night mode on or off
            nightMode.addEventListener('click', function (event) {
                event.preventDefault();
                document.documentElement.classList.toggle('dark');
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.setItem('gmtNightMode', true);
                    return;
                }
                localStorage.removeItem('gmtNightMode');
            }, false);

        })(window, document);
    </script>

    <!-- Javascript
    ================================================== -->
     {{-- <script src="../../code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
     <script src="{{ asset('js/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


     <script src="{{ asset('ionicons/dist/ionicons.js') }}"></script>

    <script src="{{ asset('js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('js/uikit.js') }}"></script>
    <script src="{{ asset('js/simplebarjs') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select..min.js') }}"></script>
    <script src="{{ asset('ionicons/dist/ionicons.js') }}"></script>



    {{-- <script src="../../unpkg.com/ionicons%405.2.3/dist/ionicons.js"></script> --}}

</body>

<!-- Mirrored from demo.foxthemes.net/socialite/feed.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Jul 2023 09:23:23 GMT -->
</html>
