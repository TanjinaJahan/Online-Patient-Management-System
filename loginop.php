<?php
session_start();
$conn=mysqli_connect("localhost","root","","pdb");
if(isset($_POST['submit'])) {
    $email		= mysqli_real_escape_string($conn,$_POST['email']);
    $password	= mysqli_real_escape_string($conn,md5($_POST['password'])); 
    $type	= mysqli_real_escape_string($conn,$_POST['type']);   
	
	$sql=mysqli_query($conn,"SELECT * FROM admin WHERE email='".$email."' AND password='".$password."' AND type='".$type."'");
	$numrows=mysqli_num_rows($sql);
	if($numrows!=0) {
		while($row=mysqli_fetch_assoc($sql)) {
			$dbemail=$row['email'];
			$dbpassword=$row['password'];
			$dbtype=$row['type'];

			$_SESSION['email']=$row['email'];
			$_SESSION['password']=$row['password'];
			$_SESSION['type']= $row['type'];
		}

		if($email == $dbemail && $password == $dbpassword && $dbtype=='admin') {
			/* Redirect browser */
			header("Location: admin_dashboard.php");
		} else if($email == $dbemail && $password == $dbpassword && $dbtype=='patient') {

		/* Redirect browser */
		header("Location: patient_dashboard.php");
		}
		if($email == $dbemail && $password == $dbpassword && $dbtype=='receptionist')
		{


		/* Redirect browser */
		header("Location: receptionist_dashboard.php");
		}
		if($email == $dbemail && $password == $dbpassword && $dbtype=='doctor')
		{

		/* Redirect browser */
		header("Location: doctor_dashboard.php");
		}
		 else {
		echo "Invalid username or password!";
		}

	} else {
		header('Location: index.php?msg=Username+Or+Password+Are+Not+Matching');
	}
}
?>

