<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Patient Management</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="all" />
	<link href="css/light/light.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css2/dashboard.css" media="all" />
</head>
<body>
<?php $type= 'patient'; include_once("login_check.php"); ?>
<?php 
	include_once("header.php"); include_once("patient_menu.php");  include_once("include/doctorsdb.php");
	
?>
<div class="container">
	<div class="row">		
		<div class="green">
			<div class="col-md-12">
				<?php 
					$result_dn = $conn->query("SELECT * FROM patients WHERE email = '".$_SESSION["email"]."' LIMIT 1");
					$row_dn	= $result_dn->fetch_assoc();
				?>
				<h4>Please Select a Doctor</h4>
				
			</div>
		</div>
	</div>
</div>
  <?php 
if(!empty($_GET['smsg'])){?> 

<div class="container">
	<div class="row">
		<div class="chip green darken-4 center white-text">
			<?php echo "SUCCESS: ".$_GET['smsg']; ?>
			
		</div>
	</div>
</div>

  <?php } ?>
    <?php 
if(!empty($_GET['emsg'])){?> 

<div class="container">
	<div class="row">
		<div class="chip red darken-4 center white-text">
			<?php echo "ERROR: ".$_GET['emsg']; ?>
			
		</div>
	</div>
</div>

  <?php } ?>

  
<div class="container">
	<div class="row">
		<div class="col-md-8" style="padding:0">
			<div class="form" >
<div class="row">
	<div class="col-md-12">
		<div class="col-md-4">
			<br><br>
		</div>
		<div class="col-md-8">
			<div class="input-group">
				<input type="text" class="form-control" id="myInput" placeholder="Search for">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Go</button>
			</span>
			</div>
		</div>
	</div>
</div>
<table class="table table-hover" >
    <thead>
		<tr>
			<th>Doctor Name</th>
			<th>Speciality</th>
		</tr>
    </thead>
	<tfoot>
		<tr>
			<th>Doctor Name</th>
			<th>Speciality</th>
		</tr>
    </tfoot>
				
	<tbody id="myTable">

<?php 
	$result_app	= $conn->query("SELECT * FROM doctors");
        while ($row	= $result_app->fetch_array()) {
 ?>
		<tr class="linkable" href="patient_createap.php?apid=<?php echo $row["docid"];?> ">    
			<td> <a href="patient_createap.php?apid=<?php echo $row["docid"];?> ">  <?php echo $row["fullname"]; ?> </a></td>    
			<td> <a href="patient_createap.php?apid=<?php echo $row["docid"];?> ">  <?php echo $row["speciality"];?></a> </td>     
		</tr>

<?php }
 ?>
		</tbody>
    </table>

			</div>
        </div>


<?php 
if(!empty($_GET["apid"])){
	$patients = get_by_id("doctors", "docid", $_GET["apid"]);
	$patientsi = get_by_id("patients", "email", $_SESSION["email"]);
?> 

<div class="col-md-4" style="padding-right:0">
<div class="form">
	<div class="row">
	<div class="green">
		<div class="col-md-12">
			<h4 align="center">Doctor Information</h4>
		</div>
	</div>
</div>
<br /><br />
		<form method="post" action="patient_createapop.php">
			<input type="hidden" name="patid" value="<?= $patientsi["patid"] ?>" />
			<input type="hidden" name="docid" value="<?= $_GET["apid"] ?>" />
			
			<p style="color:black"><b>Name:</b> <?php echo $patients["fullname"]; ?></p>
			<p style="color:black"><b>Address:</b> <?php echo $patients["address"]; ?></p>
			<p style="color:black"><b> phone:</b> <?php echo $patients["phone"]; ?></p>
			<p style="color:black"><b>E-mail:</b> <?php echo $patients["email"]; ?></p>
			<p style="color:black"><b>Speciality:</b> <?php echo $patients["speciality"]; ?></p>
			<p style="color:black"><b>Available Days:</b> <?php echo $patients["available_days"]; ?></p>
			<p style="color:black"><b>Time:</b> <?php echo $patients["time"]; ?></p>
			<p style="color:black"><b>Regular Fee:</b> <?php echo $patients["regular_fee"]; ?></p>
			<p style="color:black"><b>Followup Fee:</b> <?php echo $patients["followup_fee"]; ?></p>
			<div class="input-field col s6">
				<div> <label style="margin-top:10px" class="active" for="date">Appointment Date</label> </div>
				<input style="color:black; border: 1px solid red;width: 100%;padding-left: 15px;" id="date" type="date" min="<?php echo date("Y-m-d"); ?>" name="date" value="<?php echo date("Y-m-d"); ?>">
			</div>
			<div class="input-field col s6">
				<button style="background:green" class="btn" type="submit">Create Appointment</button>
			</div>
		</form>
   </div>
</div>

<?php 
} ?>
    </div>
</div> 


<?php include_once("footer.php"); ?>
	<script type="text/javascript"src="js/jquery.js"></script>
	<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
	<script type="text/javascript"src="js/bootstrap.min.js"></script>
	
</body>
</html>