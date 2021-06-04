<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - PA Batulicin</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}">

    @include('panels/styles')
    
    {{-- Socket IO --}}
    <script src="{{ asset('vendors/js/socket/socket.io.min.js') }}"></script>

    <script>
        var socketHost = '{{ config('app.socket_host') }}';

        const socket = io(socketHost);
        // const socket = io('http://localhost:8090', {transports: ['websocket', 'polling', 'flashsocket']});
        
    </script>



</head>

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

    @include('panels/navbar')
    @include('panels/menu')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            @include('panels/breadcrumb')
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('panels/footer')
    @include('panels/scripts')
    
</body>

</html>