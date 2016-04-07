<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>NOVA Cavaliers</title>
	<meta name="description" content="">
	<meta name="author" content="">	

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	
	<!-- Source Sans Pro -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>


	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/base.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/skeleton.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/
	css/layout.css">	


	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	

	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/addComment.js"></script>	
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/angular.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/angular-animate.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/angular-sanitize.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/angular-youtube.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>
	
	
    <!-- Youtube -->
	<script src="//www.google.com/jsapi" type="text/javascript"></script>
    <script type="text/javascript">
      google.load("swfobject", "2.1");
    </script>

	<!-- Favicons
	================================================== -->

	<?php wp_head(); ?>

</head>
<body data-ng-app="Cavs" <?php body_class(); ?>>

		<!-- Menu -->
		<div class="fixed">
		<div class="full columbia shadow">
			<div class="container">			
				

				<div class="five columns" style="height: 1px;">				
					<a id="logo" href="<? echo home_url(); ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/NOVA-CAVS-LOGO.png" alt="Nova Cavaliers">
					</a>

				</div>
				

				<div class="eleven columns">
					
					<!-- Header Menu -->
					<?php //header_menu(); ?>		
					<nav class="navbar navbar-cavs" role="navigation">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#cavs-main-menu">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					    </button>
					    <div class="collapse navbar-collapse" id="cavs-main-menu">
					    	<?php header_menu(); ?>
<!-- 					      <ul class="nav navbar-nav navbar-right">
					        <li><a href="#">About Us</a></li>
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Teams <b class="caret"></b></a>
					          <ul class="dropdown-menu">
					            <li><a href="#">Team 1</a></li>
					            <li><a href="#">Team 2</a></li>
					            <li><a href="#">Team 3</a></li>
					          </ul>
					        </li>
					      </ul>	 -->				    	
					    </div>		
					</nav>

				</div><!-- eight -->		
			</div><!-- container -->
		</div><!-- full -->
		</div><!-- fixed -->