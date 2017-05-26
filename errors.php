<?php
  $status = $_SERVER['REDIRECT_STATUS'];
  $codes = array(
    403 => array('403', 'Oooooops! Looks like the server has refused to fulfill your request. Maybe try on of the links below, click on the top menu
    or try a search?'),
    404 => array('404', 'Oooooops! Looks like nothing was found at this location.
    Maybe try on of the links below, click on the top menu
    or try a search?'),
    405 => array('405', 'Oooooops! Looks like the method specified in the Request-Line is not allowed for the specified resource. Maybe try on of the links below, click on the top menu
    or try a search?'),
    408 => array('408', 'Oooooops! Looks like your browser failed to send a request in the time allowed by the server. Maybe try on of the links below, click on the top menu
    or try a search?'),
    500 => array('500', 'Oooooops! Looks like we have an internal problem here! Server is down, We repeat server is down!'),
    502 => array('502', 'Oooooops! Looks like we have an internal problem here! Server is down, We repeat server is down!'),
    504 => array('504', 'Oooooops! Looks like we have an internal problem here! Server is down, We repeat server is down!'),
  );

  $title = $codes[$status][0];
  $message = $codes[$status][1];
  if ($title == false || strlen($status) != 3) {
         $message = 'Please supply a valid status code.';
  }
 ?>

 <!DOCTYPE html>
 <!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
 <!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
 <!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
 <head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
 	<title>Error!</title>
 	<meta name="description" content="">
 	<meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  	<!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="vendor/css/errors/base.css">
    <link rel="stylesheet" href="vendor/css/errors/main.css">
    <link rel="stylesheet" href="vendor/css/errors/vendor.css">

    <!-- script
    ================================================== -->
 	<script src="vendor/js/errors/modernizr.js"></script>

    <!-- favicons
 	================================================== -->
 	<link rel="icon" type="image/png" href="favicon.png">

 </head>

 <body>

 	<!-- header
    ================================================== -->
    <header class="main-header">
    	<div class="row">
    		<div class="logo">
 	         <a href="index.php">Quatro</a>
 	      </div>
    	</div>
    </header> <!-- /header -->

 	<!-- main content
    ================================================== -->
    <main id="main-404-content" class="main-content-particle-js">

    	<div class="content-wrap">

 		   <div class="shadow-overlay"></div>

 		   <div class="main-content">
 		   	<div class="row">
 		   		<div class="col-twelve">

 			  			<h1 class="kern-this"><?php echo $title; ?> Error.</h1>
 			  			<p>
 						<?php echo $message; ?>
 			  			</p>

 			  			<div class="search">
 				      	<form>
 								<input type="text" id="s" name="s" class="search-field" placeholder="Type and hit enter …">
 							</form>
 				      </div>

 			   	</div> <!-- /twelve -->
 		   	</div> <!-- /row -->
 		   </div> <!-- /main-content -->

 		   <footer>
 		   	<div class="row">

 		   		<div class="col-seven tab-full social-links pull-right">
 			   		<ul>
 				   		<li><a href="#"><i class="fa fa-facebook"></i></a></li>
 					      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
 					      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
 				   	</ul>
 			   	</div>

 		  			<div class="col-five tab-full bottom-links">
 			   		<ul class="links">
 				   		<li><a href="#">Homepage</a></li>
 				         <li><a href="#">About</a></li>
 				         <li><a href="mailto:vitor.35.monteiro@gmail.com">Report Error</a></li>
 				   	</ul>

 				   	<div class="credits">
 				   		<p>Shout out to <a href="http://www.styleshout.com/" title="styleshout">styleshout</a> for the design</p>
 				   	</div>
 			   	</div>

 		   	</div> <!-- /row -->
 		   </footer>

 		</div> <!-- /content-wrap -->

    </main> <!-- /main-404-content -->

    <div id="preloader">
     	<div id="loader"></div>
    </div>

    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="vendor/js/errors/plugins.js"></script>
    <script src="vendor/js/errors/main.js"></script>

 </body>

 </html>
