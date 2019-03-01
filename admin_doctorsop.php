<?php 
include_once("include/doctorsdb.php");
if(!empty($_POST['insert'])) {
	if(!check_username($_POST["email"])) {
		if($_POST['password'] == $_POST['password2']) {
			$id = insertion("admin", array("",$_POST["email"],md5($_POST["password"]),'doctor',$_POST["fullname"]));
			$diarray = array("",$_POST["speciality"], $id, $_POST["address"],$_POST["phone"], $_POST['available_days'], $_POST['time'], $_POST['regular_fee'], $_POST['followup_fee'], $_POST['email'], $_POST['fullname'], md5($_POST['password']));
			insertion("doctors", $diarray);
			
			header("location:admin_doctors.php?smsg=".urlencode("Successfully Data inserted"));
		}
	} else {
		header("location:admin_doctors.php?emsg=".urlencode("Username already exist. Try with different username"));
	}}

if (!empty($_POST['update'])) {
	
	if(!empty($_POST['password'])) {
		$row = get_by_id("doctors","docid", $_POST['update']); 
		$id = $row["adid"];
		updation("admin", "adid", $id, array(null, $_POST["email"], md5($_POST["password"]), null, $_POST["fullname"]));
		updation("doctors", "docid", $_POST['update'], array(null, $_POST["speciality"], $id, $_POST["address"], $_POST["phone"], $_POST['available_days'], $_POST['time'], $_POST['regular_fee'], $_POST['followup_fee'], $_POST['email'], $_POST['fullname'], md5($_POST['password'])));
	} else {
		$row = get_by_id("doctors","docid", $_POST['update']); $id = $row["adid"];
		updation("admin", "adid", $id, array(null, $_POST["email"], null, null, $_POST["fullname"]));
		updation("doctors", "docid", $_POST['update'], array(null, $_POST["speciality"], $id, $_POST["address"], $_POST["phone"], $_POST['available_days'], $_POST['time'], $_POST['regular_fee'], $_POST['followup_fee'], $_POST['email'], $_POST['fullname'], null));
	}

	header("location:admin_doctors.php?smsg=".urlencode("Successfully Data Updated"));
}

if (!empty($_GET['delid']))
{
$row=get_by_id("doctors","docid",$_GET['delid']);
deletion("doctors","docid",$_GET['delid']);
deletion("admin","adid",$row['adid']);
header("location:admin_doctors.php");
}



 ?>