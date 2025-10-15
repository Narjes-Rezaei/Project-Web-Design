<!DOCTYPE html>
<html lang="en">

<head>
    <title>Soccer &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="index/fonts/icomoon/style.css">

    <link rel="stylesheet" href='{{ asset("index/css/bootstrap/bootstrap.css") }}'>
    <link rel="stylesheet" href="index/css/jquery-ui.css">
    <link rel="stylesheet" href="index/css/owl.carousel.min.css">
    <link rel="stylesheet" href="index/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="index/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="index/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="index/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="index/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="index/css/aos.css">

    <link rel="stylesheet" href="index/css/style.css">



</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        @include('index.header')

        @include('index.intro')

        @include('index.last-result')

        @include('index.latest-news')

        @include('index.next-match')

        @include('index.video')

        @include('index.our-blog')

        @include('index.footer')


    </div>
    <!-- .site-wrap -->

    <script src="index/js/jquery-3.3.1.min.js"></script>
    <script src="index/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="index/js/jquery-ui.js"></script>
    <script src="index/js/popper.min.js"></script>
    <script src="index/js/bootstrap.min.js"></script>
    <script src="index/js/owl.carousel.min.js"></script>
    <script src="index/js/jquery.stellar.min.js"></script>
    <script src="index/js/jquery.countdown.min.js"></script>
    <script src="index/js/bootstrap-datepicker.min.js"></script>
    <script src="index/js/jquery.easing.1.3.js"></script>
    <script src="index/js/aos.js"></script>
    <script src="index/js/jquery.fancybox.min.js"></script>
    <script src="index/js/jquery.sticky.js"></script>
    <script src="index/js/jquery.mb.YTPlayer.min.js"></script>


    <script src="index/js/main.js"></script>

</body>

</html>