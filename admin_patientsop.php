<?php 
include_once("include/basicdb.php");
if (!empty($_POST['insert'])){
	if(!check_username_by_table('admin', $_POST["email"])) {
		if($_POST['password'] == $_POST['password2']) {
		date_default_timezone_set ("Asia/Dhaka");
		$datetime=date("Y-m-d H:i:s");
		
		$id = insertion("admin", array("",$_POST["email"],md5($_POST["password"]),'patient',$_POST["fullname"]));

		insertion("patients",array("",$_POST["fullname"],$_POST["gender"],$_POST["age"],null,$_POST["address"],$_POST["phone"],$datetime,$_POST["blood_group"],$_POST["email"],md5($_POST["password"]),$id));
		header("location:admin_patients.php?smsg=".urlencode("Successfully Data inserted"));
		} else{
			header("location:admin_patients.php?emsg=".urlencode("Two password doesn't match !"));	
		}
	} else {
		header("location:admin_patients.php?emsg=".urlencode("Username already exist. Try with different username"));
	}
}

if (!empty($_POST['update'])) {
	if(!empty($_POST["password"])) {
		$row = get_by_id("patients","patid", $_POST['update']); 
		$id = $row["adid"];
		updation("admin", "adid", $id, array(null, $_POST["email"], md5($_POST["password"]), null, $_POST["fullname"]));
		updation("patients","patid",$_POST['update'],array(null, $_POST["fullname"], $_POST["gender"], $_POST["age"], null, $_POST["address"], $_POST["phone"], null, $_POST["blood_group"], $_POST["email"], md5($_POST["password"]),$id));
		header("location:admin_patients.php?smsg=".urlencode("Successfully Data Updated"));
	} else {
		updation("admin","email",$_POST['email'],array(null, null, null, null, $_POST["fullname"]));		
		updation("patients","patid",$_POST['update'],array(null, $_POST["fullname"], $_POST["gender"], $_POST["age"], null, $_POST["address"], $_POST["phone"], null, $_POST["blood_group"], $_POST["email"], null));
		header("location:admin_patients.php?smsg=".urlencode("Successfully Data Updated"));
	}}

if (!empty($_GET['delid'])){
	deletion("admin","email",$_GET['email']);
	deletion("patients","patid",$_GET['delid']);
	header("location:admin_patients.php?smsg=".urlencode("Data Deleted"));
}
?>