<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Patient Management</title>
	<link rel="stylesheet" type="text/css" href="css/bar/bar.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/dark/dark.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/default/default.css" media="all" />
	<link href="css/light/light.css" rel="stylesheet" type="text/css"/>
	<link href="css/nivo-slider.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="all" />
	
	<link rel="stylesheet" type="text/css" href="css2/dashboard.css" media="all" />
</head>
<body>
<?php include_once("header.php"); ?>
<?php $type= 'admin'; include_once("login_check.php"); ?> 
<?php include_once("admin_menu.php"); ?>
<div class="container"> 
	<div class="row">
		
			<div class="col-md-12 col-sm-12 col-xs-12"style="padding:0">
				<div class="slider">
					<div class="slider-wrapper theme-light">
						<div class="nivoSlider" id="slider">
							<img src="image/1.jpg"/>
							<img src="image/3.jpg"/>
							<img src="image/4.png"/>	
							<img src="image/5.jpg"/>	
						</div>
					</div>
				</div>	
			</div>
		
	</div>
</div>
<?php include_once("footer.php"); ?>

	<script type="text/javascript"src="js/jquery.js"></script>
	
	
	<script type="text/javascript"src="js/bootstrap.min.js"></script>
	<script type="text/javascript"src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript"src="js/jquery.nivo.slider.pack.js"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider();
		});
	</script> 
	

	
</body>
</html>