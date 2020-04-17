<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="180x180"
            href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/images/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32"
            href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16"
            href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/images/favicons/favicon-16x16.png">
        <title>@yield("title")</title>
        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
            type="text/css">
        <link href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet"
            type="text/css">
        <link href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/css/combined.min.css" rel="stylesheet" type="text/css">
        <link href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/css/layout.min.css" rel="stylesheet" type="text/css">
        <link href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/css/components.min.css" rel="stylesheet" type="text/css">
        <link href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/css/colors.min.css" rel="stylesheet" type="text/css">
        <link href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/css/extras/animate.min.css" rel="stylesheet"
            type="text/css">
        <link href="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/css/backend-custom.css" rel="stylesheet"
            type="text/css">
        <!-- /global stylesheets -->
        
        @if(Request::is('restaurant-owner/*'))
        <!-- The core Firebase JS SDK is always required and must be listed first -->
            <script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-messaging.js"></script>
        @endif

        <!-- Core JS files -->
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/main/jquery.min.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/main/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/loaders/blockui.min.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/ui/slinky.min.js"></script>
        <!-- /core JS files -->
        <!-- Theme JS files -->
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/ui/sticky.min.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/buttons/spin.min.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/buttons/ladda.min.js"></script>
        @if(!Request::is('admin/dashboard'))
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/forms/selects/select2.min.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/pickers/color/spectrum.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/editors/summernote/summernote.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets//js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/pickers/daterangepicker.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/uploaders/dropzone.min.js"></script>
        @endif
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/visualization/echarts/echarts.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/js/app.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/js/navbar-sticky.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/js/printThis.js"></script>
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/js/jquery-alphanum.js"></script>
        @if(Request::is('admin/settings'))
        <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/js/plugins/editors/ace/ace.js"></script>
        @endif
        

        @if(Request::is('admin/restaurants') || Request::is('admin/restaurant/*') || Request::is('restaurant-owner/restaurants') || Request::is('restaurant-owner/restaurant/*') || Request::is('admin/popular-geo-locations'))
        <!-- Load GMAPS Only when needed -->
            {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ config('settings.googleApiKeyIP') }}"></script> --}}
            {{-- <script type="text/javascript" src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/js/google-maps.js"></script> --}}
        @endif

        <!-- /theme JS files -->
        <link rel="manifest" href="{{ URL::asset('backend-manifest.json') }}">
    </head>
    <body>
        @if(!Request::is('auth/login'))
            @include("admin.includes.header")
        @endif
        <div class="page-content container pt-0">
            <div class="content-wrapper">
                @yield("content")
            </div>
        </div>
        @include('admin.includes.notification')
    </body>
</html>