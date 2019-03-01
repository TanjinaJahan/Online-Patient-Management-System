<?php
	session_start();
	if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
		$type = $_SESSION['type'];
		header('Location:'.$type.'_dashboard.php');
	}
	
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Patient Management</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="all" />
	<link href="css/light/light.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css2/patient_login.css" media="all" />
</head>
<body>

<?php include_once("header.php"); ?>
<?php include_once("index_menu.php"); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		
		<div  class="form">
				<form method="post" action="loginop.php">
					<h3 >LOGIN HERE</h3>
						<label for="email">Email address:</label>
						<input name="email"type="email" class="form-control" id="email" placeholder="Enter E-mail address">
					
				  
					
						<label for="pwd">Password:</label>
						<input name="password" type="password" class="form-control" id="pwd"placeholder="Enter the password">
						<label for="select">Select Type:</label>
					<select class="form-control" name="type" id="select"required>
						<option value="">Type</option>
						<option value="admin">Admin</option>
						<option value="receptionist">Receptionist</option>
						<option value="doctor">Doctor</option>
						<option value="patient">Patient</option>
					</select>
					
					

					<label><input type="checkbox"> Remember me</label><br />
					
					<button type="submit" class="btn btn-success"name="submit" ><i class="fas fa-sign-in-alt"></i> Submit</button>
					<p>don't have an account?<a href="patient_registration.php">Sign up</a></p>
					<p style="padding-left: 10px; text-transform: capitalize; background: #f00; color: #fff; font-size: 16px;"><?php if(isset($_GET['msg'])) echo $_GET['msg']; ?></p>
				</form>
			</div>
		</div>
	
	</div>
	</div>
<?php include_once("footer.php"); ?>
	<script type="text/javascript"src="js/jquery.js"></script>
	<script type="text/javascript"src="js/bootstrap.min.js"></script>
	
</body>
</html>
