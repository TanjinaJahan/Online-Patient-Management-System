<?php 

include_once("basicdb.php");

$tablename="admin";

function check_username ($email)
{

global $conn,$tablename;

$sql="SELECT * FROM $tablename WHERE email='$email' LIMIT 1";

$result=mysqli_query($conn,$sql);

return (mysqli_num_rows($result)>0)? true: false;

}

function check_login ($email,$password)
{

global $conn,$tablename;

$sql="SELECT * FROM $tablename WHERE email='$email' AND password='$password' LIMIT 1";

$result=mysqli_query($conn,$sql);

return (mysqli_num_rows($result)>0)? $result: false;

}



 ?>