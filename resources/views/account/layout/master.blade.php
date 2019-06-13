<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Begin SEO -->

        <!-- Primary Meta Tags -->
        <title>@yield('title')</title>
        <meta name="title" content="Template Thức Uống Và Đồ Ăn Nhanh | KhoTemplateVN">
        <meta name="description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive.">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://khotemplate.vn/preview/template-thuc-uong-va-do-an-nhanh-dr03/index.html">
        <meta property="og:title" content="Template Thức Uống Và Đồ Ăn Nhanh | KhoTemplateVN">
        <meta property="og:description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive.">
        <meta property="og:image" content="assets/img/slider/slider-2.jpg">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://khotemplate.vn/preview/template-thuc-uong-va-do-an-nhanh-dr03/index.html">
        <meta property="twitter:title" content="Template Thức Uống Và Đồ Ăn Nhanh | KhoTemplateVN">
        <meta property="twitter:description" content="Template thức uống và đồ ăn nhanh cung cấp đầy đủ mọi chức năng cho người dùng giúp việc quảng cáo thương hiệu, quảng cáo sản phẩm dễ dàng, chuẩn seo, chuẩn responsive.">
        <meta property="twitter:image" content="assets/img/slider/slider-2.jpg">

        <!-- End SEO -->

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- all css here -->
        <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
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
    </head>
    <body>
        <!-- header start -->
        @include('account.layout.header')
            @yield('content')
        @include('account.layout.footer')
        <!-- Modal -->
        @include('account.layout.modal')
        <!-- Modal end -->





		<!-- all js here -->
        <script src="{{ asset('public/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/popper.js') }}"></script>
        <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/ajax-mail.js') }}"></script>
        <script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('public/assets/js/main.js') }}"></script>
    </body>
</html>
