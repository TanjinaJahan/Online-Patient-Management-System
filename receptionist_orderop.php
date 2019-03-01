<?php 

include_once("include/basicdb.php");
session_start();

if(!empty($_SESSION["cart"])&&!empty($_GET["patid"]))
{
	date_default_timezone_set ("Asia/Dhaka");
	$datetime=date("Y-m-d H:i:s");
$id=insertion("invoice",array("",$_GET["patid"],$datetime,$_SESSION["totalcost"]));
if ($id) {
	foreach ($_SESSION["cart"] as $key => $value) {

$row=get_by_id("tests","testid",$value);


		insertion("testlist",array("",$_GET["patid"],$id,$value,0,null,$row["template"]));


	}
	
}
unset($_SESSION["cart"]);
unset($_SESSION["totalcost"]);
header("location:receptionist_invoice.php?invid=".$id);

}

 ?>




