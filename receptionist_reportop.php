<?php 
include_once("include/basicdb.php");
if (!empty($_POST['update'])){
echo $_POST['update'];
updation("testlist","testlistid",$_POST['update'],array(null,null,null,null,2,null,$_POST["template"]));
header("location:receptionist_report.php?testlistid=".$_POST['update']);
}
 ?>