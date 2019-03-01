<?php 
include_once("include/basicdb.php");
include_once("include/connect.php");
if(!empty($_POST["patid"])&&!empty($_POST["docid"])) {
	$date=date($_POST["date"]);
	$find_rslt = $conn->query("SELECT * FROM appointment WHERE date = '".$date."' AND docid='".$_POST["docid"]."' ");
	if($find_rslt->num_rows < 20) {
		$slnor	= $conn->query("SELECT MAX(slno) AS slno FROM appointment WHERE date='".$date."' AND docid='".$_POST["docid"]."' LIMIT 1");
		$slnorow= $slnor->fetch_array(); $slno = $slnorow['slno']+1;
		insertion("appointment",array(0, $_POST["patid"], $_POST["docid"], $date, $slno, 0, ""));
		header("location:receptionist_appointment.php?smsg=".urlencode("Successfully Inserted Appointment !"));

	} else {
		header("location:receptionist_appointment.php?emsg=".urlencode("Cannot make more than 20 appointments !"));
	}
}
?>

