<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('public/template/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/template/js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/css/webmoi.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/css/effect.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/css/webmoi.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="{{ asset('public/template/image/logo.png') }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/shortcode/shortcodes.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css') }}">
    <style>
        .col-xs-12 .pagination{
            margin:0;
        }
        #container{
           padding-left:0;
           position: relative;
           height: 35px;
           width:500px;
        }
    </style>
    <script>
        $(window).resize(function () {
            if ($(this).width() < 1024) {
                //An|Hien|Add|Remove class cho menu-right khi thay doi kich thuoc man hinh
                $("#right").hide();
                $("div#product").removeClass("col-sm-9");
                $("div#product").addClass("col-sm-12");

                //An|Hien|Add|Remove class cho menu-right khi thay doi kich thuoc man hinh
                $("#service").hide();
                $("div#slide-show-hot").removeClass("col-sm-9");
                $("div#slide-show-hot").addClass("col-sm-12");

                $("#search").hide();
            }
            else {
                $("#right").show();
                $("div#product").removeClass("col-sm-12");
                $("div#product").addClass("col-sm-9");

                $("#service").show();
                $("div#slide-show-hot").removeClass("col-sm-12");
                $("div#slide-show-hot").addClass("col-sm-9");

                $("#search").show();
            }
        });


    </script>
    <title>Chi tiết sản phẩm</title>
</head>
<body>

    @include('webmoi.header')
    <div class="container-fluid">
      @yield('content')
    </div>
    @include('webmoi.footer')

    <script src="{{ asset('public/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/popper.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/plugins.js') }}"></script>
    <script>
        $(".cart").click(function(){
            $(this).next().slideToggle("slow");
        });
    </script>
</body>
</html>
