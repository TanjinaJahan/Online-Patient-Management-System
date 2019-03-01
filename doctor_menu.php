<?php
include "include/connect.php";
//GET DOCTOR ID FROM SESSION EMAIL
$result_docid = $conn->query("SELECT * FROM doctors WHERE email='".addslashes($_SESSION['email'])."' LIMIT 1"); 
$row_docid = $result_docid->fetch_array();

	/// Copy Paging Code From Here 
	$result_all	= $conn->query("SELECT * FROM appointment WHERE docid='".addslashes($row_docid['docid'])."' AND status='0'");
	$tna = $result_all->num_rows;
	$page = isset($_GET['page']) ? $_GET['page'] :  1;
	$offset = (($page * 10) - 10); $looplimit = $tna/10; 
	if(is_float($looplimit)) {
		$looplimit = intval($looplimit);
		$looplimit = $looplimit+1;
	}
	/// Copy Paging Code End Here 

//GET APPOINTMENTS FROM DOCTOR ID
$result_app	= $conn->query("SELECT * FROM appointment WHERE docid='".addslashes($row_docid['docid'])."' AND status='0' ORDER BY apid DESC LIMIT 10 OFFSET {$offset}");
?>

<div class="container">
	<div class="row">
		<div class="menu">
			<div class="col-md-12 col-sm-12 col-xs-6">
				<ul>
					<li><a href="doctor_dashboard.php"><i class="fas fa-home"></i> Home</a></li>
					<li><a href="doctor_appointment.php"><i class="fas fa-bell"></i><sup class="badge"><?= $tna ?></sup> Appoinment List</a></li>
					<li><a href="doctor_history.php"><i class="fas fa-address-book"></i> History</a></li>
					<li><a href="doctor_blood.php"><i class="fas fa-search"></i> Search Blood</a></li>
					<li><a href="doctor_profile.php"><i class="fas fa-user"></i> Profile</a></li>
					<li class="logout"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
				</ul>
			</div>	
		</div>	
	</div>
</div>