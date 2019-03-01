<?php 
include_once("include/basicdb.php");
if(!empty($_POST['submit']))
{


	updation("appointment","apid", $_POST["submit"],array(null,null,null,null,1,$_POST['prescription']));
	foreach ($_POST["testids"] as $key => $value) {
		insertion("suggesttest",array("",$_POST["submit"],$_POST["patid"],$value));
	}

header("location:doctor_prescription.php?apid=".$_POST['submit']);
}


?>