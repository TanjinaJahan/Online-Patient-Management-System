<?php 
include_once("include/basicdb.php");
if (!empty($_POST['insert'])){
	insertion("tests",array("",$_POST["testname"],$_POST["price"],""));
	header("location:admin_tests.php?smsg=".urlencode("Successfully Data inserted"));
}

if (!empty($_POST['update'])){
	updation("tests","testid",$_POST['update'],array(null,$_POST["testname"],$_POST["price"]));
	header("location:admin_tests.php?smsg=".urlencode("Successfully Data Updated"));
}

if (!empty($_GET['delid'])){
	deletion("tests","testid",$_GET['delid']);
	header("location:admin_tests.php?smsg=".urlencode("Data Deleted"));
}
 ?>