<?php 
include_once("include/admindb.php");
if (!empty($_POST['insert'])){
	if(!check_username($_POST["email"])){
	insertion("admin",array("",$_POST["email"],md5($_POST["password"]),$_POST["type"],$_POST["fullname"]));
	header("location:admin_access.php?smsg=".urlencode("Successfully Data inserted"));
}else{
	header("location:admin_access.php?emsg=".urlencode("email already exist. Try with different email"));
}}

if (!empty($_POST['update'])) {
	if ($_POST['email']!=$_POST['email']){
	if(!check_username($_POST["email"])){
	updation("admin","adid",$_POST['update'],array(null,$_POST["email"],$_POST["password"],$_POST["type"],$_POST["fullname"]));
	header("location:admin_access.php?smsg=".urlencode("Successfully Data Updated"));
	}else{
		header("location:admin_access.php?emsg=".urlencode("email already exist. Try with different email"));
	}}

	else{
		if(!empty($_POST["password"])) {
			updation("admin","adid", $_POST['update'], array(null,$_POST["email"], md5($_POST["password"]),$_POST["type"],$_POST["fullname"]));
			header("location:admin_access.php?smsg=".urlencode("Successfully Data Updated"));
		} else {
			updation("admin","adid", $_POST['update'], array(null,$_POST["email"], null,$_POST["type"],$_POST["fullname"]));
			header("location:admin_access.php?smsg=".urlencode("Successfully Data Updated"));
		}}}

if (!empty($_GET['delid'])){
deletion("admin","adid",$_GET['delid']);
header("location:admin_access.php?smsg=".urlencode("Data Deleted"));
}
?>