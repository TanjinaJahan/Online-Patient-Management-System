<?php 

include_once("include/admindb.php");
if (!empty($_POST['submit']))
{

deletion("appointment","apid",$_POST['submit']);
header("location:receptionist_appointment.php?smsg=".urlencode("Data Deleted"));

}


 ?>
