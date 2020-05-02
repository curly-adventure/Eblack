<!DOCTYPE HTML>
<html class="reveal-loaded" lang="fr" >
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy">

<title>template Eblack</title>

<link rel="shortcut icon" type="image/x-icon" href="images/logo32.png">
<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>
<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap-custom.css" rel="stylesheet" type="text/css"/>
<!--<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
 Font awesome 5 -->
<link href="fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
<!-- plugin: fancybox  -->
<script src="plugins/fancybox/fancybox.min.js" type="text/javascript"></script>
<link href="plugins/fancybox/fancybox.min.css" type="text/css" rel="stylesheet">
<!-- plugin: owl carousel  -->
<link href="plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="plugins/owlcarousel/assets/owl.theme.default.css" rel="stylesheet">
<script src="plugins/owlcarousel/owl.carousel.min.js"></script>

<!-- custom style -->
<link href="css/uikit.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/style.css">
<link href="css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="css/media-queries.css">

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>


<script type="text/javascript">
	/// some script
	// jquery ready start
	$(document).ready(function() {
		
	}); 
	// jquery end
	</script>
</head>
<body>
	<!-- Wrapper -->
	<div class="wrapper">
		<!-- Sidebar -->
        @include('frontend.partials.siderbar')
		<!-- End sidebar -->
		
		<!-- Dark overlay -->
		<div class="overlay"></div>

		<!-- Content -->
		<div class="content">
		
			<!-- open sidebar menu -->
			
            @include('frontend.partials.header')

<!-- ========================= SECTION MAIN ========================= -->



<!-- ========================= SECTION CONTENT ========================= -->
@yield('content')

<!-- ========================= SECTION LINKS ========================= -->
@include('frontend.partials.footer')
<!-- ========================= FOOTER END // ========================= -->

</div>
<!-- End content -->

</div>
<!-- End wrapper -->
<script src="js/scripts.js"></script>
<script type="text/javascript">
	/// some script
	
	// jquery ready start
	$(document).ready(function() {
		// jQuery code
		
	}); 
	// jquery end
	</script>
</body>
</html>