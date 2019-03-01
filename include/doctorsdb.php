<?php 

include_once("basicdb.php");



function check_username($email){
	global $conn; $tablename = 'doctors';
	
	$sql="SELECT * FROM $tablename WHERE email='$email' LIMIT 1";

	$result=mysqli_query($conn,$sql);

	return (mysqli_num_rows($result)>0)? true: false;

}





 ?>