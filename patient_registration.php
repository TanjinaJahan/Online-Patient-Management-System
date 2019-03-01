<?php
	session_start();
	include "include/connect.php";
?>

<?php
	if(isset($_POST['signup'])){
		function check_username_by_table($tablename, $email){
			global $conn;
			$sql="SELECT * FROM $tablename WHERE email='$email' LIMIT 1";
			$result=mysqli_query($conn,$sql);
			return (mysqli_num_rows($result)>0)? true: false;
		}
		function insertion($table, $data = array()) {
			global $conn;
			foreach($data as $key => $value) {
				if (is_string($value)) {
					$data[$key] = mysqli_real_escape_string($conn, $value);
				}
			}
			$sql = "INSERT INTO $table VALUES ('" . join("', '", $data) . "');";
			if (!mysqli_query($conn, $sql)) {
				echo "Error: " . $sql . "<br />" . mysqli_error($conn);
				exit;
			}

			return mysqli_insert_id($conn);
		}

		$fullname	= mysqli_real_escape_string($conn, $_POST['fullname']);
		$address	= mysqli_real_escape_string($conn, $_POST['address']);
		$age		= mysqli_real_escape_string($conn, $_POST['age']);
		$gender		= mysqli_real_escape_string($conn, $_POST['gender']);
		$phone		= mysqli_real_escape_string($conn, $_POST['phone']);
		$email		= mysqli_real_escape_string($conn, $_POST['email']);
		$blood_group= mysqli_real_escape_string($conn, $_POST['blood_group']);
		$password	= mysqli_real_escape_string($conn, $_POST['password']);
		$password2	= mysqli_real_escape_string($conn, $_POST['password2']);
		$type='patient';
		if(!check_username_by_table('admin', $_POST["email"])) {
			if($password==$password2){
				date_default_timezone_set ("Asia/Dhaka");
				$datetime = date("Y-m-d H:i:s");
				$password = md5($password);
				$id = insertion("admin", array("",$email, $password, 'patient', $fullname));
				insertion("patients",array("",$fullname, $gender, $age, null, $address, $phone, $datetime, $blood_group, $email, $password, $id));
				
				$_SESSION['email']= $email;
				$_SESSION['password']=$password;
				$_SESSION['type']= $type;
				header("location:index.php"); 
			} else{
				$error = "<div class='error'> The two passwords do not match </div>";
			}
		} else {
			$error = "<div class='error'> Username already exist. Try with different username </div>";
		}
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Patient Management</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css2/patient_registration.css" media="all" />
	<style>
		.error {
			background: red;
			padding: 10px;
			color: #fff;
		}
	</style>
</head>
<body>
<?php include_once("header.php"); ?>

<?php include_once("index_menu.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		
			<div class="form">
				<form method="post" action="patient_registration.php">
					<h3 >Register as a Patient</h3>
					
					<input type="text" name="fullname" class="form-control"  placeholder="Enter Your Name"required>
					
					<input type="text" name="address" class="form-control" placeholder="Enter Your Address"required>
					
					<input type="number" name="age" class="form-control"  placeholder="Enter Your Age"required>
					
					<select class="form-control" name="gender" id=""required>
						<option value="">Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					</select>
					
					<input type="number" name="phone" class="form-control"  placeholder="Enter Your Mobile number"required>
					
					<input type="email" name="email" class="form-control" id="email" placeholder="Enter Your E-mail"required>
					
					<select class="form-control" name="blood_group" id=""required>
						<option value="">Blood Group</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					</select>
					<input type="password" name="password" class="form-control" id="pwd"placeholder="Enter the password">
					<input type="password" name="password2" class="form-control" id="pwd"placeholder="Re-enter password">
					
					<button type="submit" name="signup" class="btn btn-success"><i class="fas fa-user-plus"></i> SIGN UP</button>
					<button type="reset" name="reset" class="btn btn-warning">RESET</button>
				</form>
				<br/>
				<?php if(isset($error)) echo $error; ?>
				
			</div>
		</div>
	
	</div>
</div>
<?php include_once("footer.php"); ?>
<script type="text/javascript"src="js/jquery.js"></script>
<script type="text/javascript"src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
	if(isset($db)) {
		mysqli_close($db);
	}
?>