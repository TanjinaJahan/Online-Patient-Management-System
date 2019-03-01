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
<?php include_once("header.php"); ?>
<?php $type= 'doctor'; include_once("login_check.php"); ?>
<?php include_once("doctor_menu.php"); 
include_once("include/doctorsdb.php"); 

?>

<div class="container">
	<div class="row">
		<div class="green">
			<div class="col-md-12">
				<?php 
					$result_dn = $conn->query("SELECT * FROM doctors WHERE email = '".$_SESSION["email"]."' LIMIT 1");
					$row_dn	= $result_dn->fetch_assoc();
				?>
				<h4 class="bold">Appointment History OF Dr.<?php echo $row_dn['fullname']; ?></h4>
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
		<div class="col-md-12" style="padding:0">
			<div class="form ">
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<br><br>
		</div>
		<div class="col-md-6">
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
			<th>Appointment Id</th>
			<th>Date</th>
			<th>Patient Id</th>
			<th>Doctor Name</th>
			<th>Action</th>
			
		</tr>
    </thead>
	<tfoot>
		<tr>
			<th>Appointment Id</th>
			<th>Date</th>
			<th>Patient Id</th>
			<th>Doctor Name</th>
			<th>Action</th>
			
		</tr>
    </tfoot>				
	<tbody id="myTable">

<?php 
	$appoint=get_by_any("appointment",'docid',$row_dn['docid']);
		if($appoint)
		{
			while($row=mysqli_fetch_array($appoint))
			{
				if($row["status"])
				{
					$row2=get_by_id("patients","patid",$row['patid'])
?>
	<tr class="linkable" href="doctor_appointment.php?apid=<?php echo $row["apid"];?> ">
					  
		<td>  <a target="_blank" href="doctor_prescription.php?apid=<?php echo $row["apid"];?> ">  <?php echo $row["apid"]; ?> </a></td> 
		
		<td> <a target="_blank" href="doctor_prescription.php?apid=<?php echo $row["apid"];?> ">  <?php echo $row["date"];?></a> </td>     
		<td class="hide-on-small-only"> <a target="_blank" href="doctor_prescription.php?apid=<?php echo $row["apid"];?> ">  <?php echo $row2["patid"];?> </a></td>    
		<td class="hide-on-small-only"> <a target="_blank" href="doctor_prescription.php?apid=<?php echo $row["apid"];?> ">  <?php echo $row2["fullname"];?>  </a></td>     
		<td> 
		<a target="_blank" href="doctor_prescription.php?apid=<?php echo $row["apid"];?>" class="btn btn-success"><i class="fas fa-eye"></i> Prescription</a>
		</td>					
	</tr>

<?php }
}
} 
?>
					</tbody>
				</table>
				<br>
			</div>
        </div>
    </div>
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
