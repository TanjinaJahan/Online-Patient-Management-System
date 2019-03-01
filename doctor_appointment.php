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
				<h4 class="bold">PATIENT Appointment History OF Dr.<?php echo $row_dn['fullname']; ?></h4>
				
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
			<div class="form"> 

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
			<th>Appointment Id</th>
			<th>Date </th>
			<th>Serial </th>
			<th>Patient Id</th>
			<th>Patient Name</th>
			<th>Action</th>
		</tr>
    </thead>
	<tbody id="myTable">
<?php
	while ($row	= $result_app->fetch_array()) {
		$result_pn	= $conn->query("SELECT * FROM patients WHERE patid = '".addslashes($row['patid'])."'");
		$name	= $result_pn->fetch_array();
 ?>
		<tr class="linkable" href="doctor_appointment.php?page=<?= $page; ?>&apid=<?php echo $row["apid"];?> ">          
			<td>  <a href="doctor_appointment.php?page=<?= $page; ?>&apid=<?php echo $row["apid"];?> ">  <?php echo $row["apid"]; ?> </a></td>    
			<td> <a href="doctor_appointment.php?page=<?= $page; ?>&apid=<?php echo $row["apid"];?> ">  <?php echo $row["date"];?></a> </td>     
			<td> <a href="doctor_appointment.php?page=<?= $page; ?>&apid=<?php echo $row["apid"];?> ">  <?php echo $row["slno"];?></a> </td>     
			<td class="hide-on-small-only"> <a href="doctor_appointment.php?page=<?= $page; ?>&apid=<?php echo $row["apid"];?> ">  <?php echo $row["patid"];?> </a></td>    
			<td class="hide-on-small-only"> <a href="doctor_appointment.php?page=<?= $page; ?>&apid=<?php echo $row["apid"];?> ">  <?php echo $name["fullname"];?>  </a>
			</td> 
			<td > <form action="doctor_deleteapop.php" method="POST"><button  class="btn" type="submit" name="submit" value="<?php echo $row["apid"]; ?>"><i class="fas fa-trash-alt"></i></button></form> </td>			
		</tr>
<?php
	} 
?>    
    </tbody>
	<!--tfoot>
		<tr>
			<th>Appointment Id</th>
			<th>Date </th>
			<th>Patient Id</th>
			<th>Patient Name</th>
		</tr>
    </tfoot-->
    </table>
		<!-- Compulsory Paging Code -->
			<?php
				$prev_page = ($page == 1) ? 1 : $page-1;
				$next_page = ($page == $looplimit) ? $looplimit : $page+1;
			?>
			<nav aria-label="Page navigation example">
			  <ul class="pagination">
				<li class="page-item"><a class="page-link" href="doctor_appointment.php?page=<?= $prev_page; ?>">&laquo;</a></li>
			<?php 
				for($pi = 1; $pi <= $looplimit; $pi++){
					$active = ($page == $pi) ? 'active' : '';
			?>
				<li class="page-item <?= $active; ?>"><a class="page-link" href="doctor_appointment.php?page=<?= $pi; ?>"><?= $pi ?></a></li>
			<?php } ?>
				<li class="page-item"><a class="page-link" href="doctor_appointment.php?page=<?= $next_page; ?>">&raquo;</a></li>
			  </ul>
			</nav>
		<!-- //Compulsory Paging Code -->
			</div>
        </div>


<?php 
	if(!empty($_GET["apid"]))
		{
		$appointment=get_by_id("appointment","apid",$_GET["apid"]);
		$patients=get_by_id("patients","patid",$appointment["patid"]);
?> 

<div class="col-md-4"style="padding-right:0">
    <div class="form ">
<div class="row">
	<div class="green">
		<div class="col-md-12">
			<h4 class="center">Patient Information</h4>
		</div>
	</div>
</div>
<br /><br />
		
		<p style="color:black"><b>Name:</b> <?php echo $patients["fullname"]; ?></p>
		<p style="color:black"><b> Gender:</b> <?php echo $patients["gender"]; ?></p>
		<p style="color:black"> <b>Age:</b> <?php echo $patients["age"]; ?></p>
		<p style="color:black"> <b>Address:</b> <?php echo $patients["address"]; ?></p>
		<p style="color:black"> <b>Phone:</b> <?php echo $patients["phone"]; ?></p>
		<p style="color:red"> <b>Blood Group:</b> <?php echo $patients["blood_group"]; ?></p>
   </div>
</div>

<div class="row">
	<div class=""style="padding:0">
	<div class="col-md-6"> 
	<div class="form ">
		<form method="post" action="doctor_prescribeop.php">
		<div class="row">
			<div class="green">
				<div class="col-md-12">
					<h4 >Prescription</h4>
				</div>
			</div>
		</div>
				<div class="row">
					<div class="input-field col s12">
						<style type="text/css" scope="scoped">
							.textarea {
								width: 100%;
								resize: none;
								color:black
							}
						</style>
						<textarea id="textarea1" name="prescription" class="textarea" rows="5"><?php echo $appointment["prescription"]; ?></textarea>
					</div>
				</div>

<div class="row">
	<div class="col-md-12">
	<div class="green">
			<h3>Select  tests: </h3>
		</div>
	</div>
</div>
	
	
		<table class="table table-hover" >
			<thead>
				<tr>
					<th>ID</th>
					<th>Test Name</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Test Name</th>
				</tr>
			</tfoot>

			<tbody>
<?php 
	$test=get_all("tests");
	if($test){
		while($row=mysqli_fetch_array($test)){
?>
			<tr>
				<td>
					<input name="testids[]"  value="<?php echo $row["testid"]; ?>" type="checkbox" id="test<?php echo $row["testid"]; ?>" />
					
					<label for="test<?php echo $row["testid"]; ?>"><?php echo $row["testid"]; ?></label>
				</td>
				<td><?php echo $row["testname"];?> </td>
			</tr>

<?php
		}
	}
?>
				
			</tbody>
		</table>
	

	 <input type="hidden" name="patid" value="<?php echo $appointment["patid"]; ?>">
	<div class="col-md-12">
		<div class="col-md-6"></div>
		<div class="col-md-6"><p><button name="submit" value="<?php echo $_GET["apid"]; ?>" class="btn btn-success"><i class="fas fa-plus"></i> Prescribe</button>
</p></div>
		<br />	
	</div>

</form>

	</div>
</div>



	<div class="col-md-6">
	<div class="form">
	<div class="row">
	<div class="green">
		<div class="col-md-12">
			
				<h4>Completed Test of this patient</h4> 
			</div>
		</div>
	</div>
		 
		<table class="table table-hover" >
			<thead>
				<tr>
					<th>Test ID</th>
					<th>Test Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Test ID</th>
					<th>Test Name</th>
					<th>Action</th>
				</tr>
			</tfoot>
        <tbody>

<?php 
$testlist=get_by_any("testlist","patid",$patients["patid"]);         
    if($testlist){
		while($row=mysqli_fetch_array($testlist)){
			if ($row["status"]==3){
				$row2=get_by_id("tests","testid",$row["testid"]);
?>


				<tr>
					<td> <?php echo $row["testid"]; ?> </td>
					<td> <?php echo $row2["testname"]; ?></td>
                    <td>
					<a style="background:green; color:white"class=' btn' target="_blank" href='doctor_report.php?testlistid=<?php echo $row["testlistid"]; ?>' ><i class="tiny material-icons right">Report</i></a>
					
					
  <!-- Dropdown Structure -->
					</td>           
				</tr>
<?php }}

} ?>
		</tbody>
    </table>
	</div>
	</div>
</div>
</div>



<?php 
} 
?>
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
