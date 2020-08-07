
<!DOCTYPE HTML>
<html class="reveal-loaded" lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Eblack, pour vos meilleurs achats en ligne">
    <meta name="author" content="KingsCode">
    @yield('extra-meta')
    <title>@yield('title') - {{ config('app.name') }}</title>

    @yield('extra-script')

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo32.png')}}">
    <!-- jQuery -->
    
    <script src="{{ asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
    
    <!-- Bootstrap4 files-->
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <link href="{{ asset('css/bootstrap-custom.css')}}" rel="stylesheet" type="text/css"/>
    <!--<link href="css/bootstrap.min.css'" rel="stylesheet" type="text/css"/>
    Font awesome 5 -->
    <link href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css')}}" type="text/css" rel="stylesheet">
    <!-- plugin: fancybox  -->
    <script src="{{ asset('plugins/fancybox/fancybox.min.js')}}" type="text/javascript"></script>
    <link href="{{ asset('plugins/fancybox/fancybox.min.css')}}" type="text/css" rel="stylesheet">
    <!-- plugin: owl carousel  -->
    <link href="{{ asset('plugins/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('plugins/owlcarousel/assets/owl.theme.default.css')}}" rel="stylesheet">
    <script src="{{ asset('plugins/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- custom style -->
    <link href="{{ asset('css/uikit.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    
    <link href="{{ asset('css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/media-queries.css')}}">

    <!-- custom javascript -->
    <script src="{{ asset('js/script.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

   

</head>
<body>
	<!-- Wrapper -->
	<div class="wrapper">
        <!-- Sidebar -->
        @include('layouts.siderbar')
		<!-- End sidebar -->
		
		<!-- Dark overlay -->
		<div class="overlay"></div>

		<!-- Content -->
		<div class="content">
            
			
            @include('layouts.header')
            
            @yield('content')
            
            @include('layouts.footer')

        </div>

    </div>
   
<!-- End wrapper -->
<script src="{{ asset('js/scripts.js')}}"></script>
 @yield('extra-js')
</body>
</html>