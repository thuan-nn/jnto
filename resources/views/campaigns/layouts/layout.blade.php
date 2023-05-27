<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Language" content="en-us" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <meta name="loader" content="{{asset('assets/images/loading.gif')}}">
        <!--CSRF Token-->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Font Google -->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

        <!-- Font Awesomes -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--SEO-->
        <meta property="og:title" content='{{$meta['title']}}'/>
        <meta property="og:description" content="{{$meta['description']}}" />
        <meta name="description" content="{{$meta['description']}}">
        <meta property="og:url"  content="{{$meta['url']}}"/>
        <meta property="og:image"  content="{{$meta['image']}}"/>
        <meta property="og:type"  content="{{$meta['type']}}" />
        <meta property="fb:app_id"    content="{{ config('facebook.app_id') }}" />

        <!--CSS-->
        <!-- Slick -->
        <link rel="stylesheet" type="text/css" href="{{asset(mix('assets/css/vendor/slick.css'))}}" />
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset(mix('assets/css/main.css'))}}">

        <!--Jquery-->
        <script src="{{ asset(mix('assets/js/vendor/jquery-3.4.1.min.js')) }}"></script>
        <!-- Slick -->
        <script type="text/javascript" src="{{asset(mix('assets/js/vendor/slick.min.js'))}}"></script>
        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- Google Tag Manager -->
        <script>(function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js',
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-WZW9Z2W');</script>
        <!-- End Google Tag Manager -->

    </head>
    <body >

        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZW9Z2W"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->

        <!-- HEADER -->
        @include('campaigns.components.header')

        <!-- MAIN -->
        <main id="main" class="main">
            @yield('main')
        </main>

        @yield('script')
    </body>
</html>
