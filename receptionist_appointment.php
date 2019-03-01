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
<?php $type= 'receptionist'; include_once("login_check.php"); ?>
<?php include_once("receptionist_menu.php"); 
include_once("include/doctorsdb.php"); 

?>
<div class="container">
	<div class="row">
		<div class="green">
			<div class="col-md-12">
				<h4 >Appointment Information</h4>
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
			<div class="form">
			
			
			
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<a href="receptionist_createap.php" class="btn btn-info" role="button"style="background:green;color:white;border:1px solid green;border-radius:4px"><i class="fas fa-plus"></i> Create Appointment</a>
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
							<th>Appoinment ID</th>
							<th>Date </th>
							<th>Status</th>
							<th>Patient ID</th>
							<th>Patient Name</th>
							<th>Doctor ID</th>
							<th>Doctor Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Appoinment ID</th>
							<th>Date </th>
							<th>Status</th>
							<th>Patient ID</th>
							<th>Patient Name</th>
							<th>Doctor ID</th>
							<th>Doctor Name</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody id="myTable">

					  <?php 

					  $appoint=get_all("appointment");
					  if($appoint)
					  {
					  while($row=mysqli_fetch_array($appoint))
					  {

							$row2=get_by_id("patients","patid",$row["patid"]);
							 $row3=get_by_id("doctors","docid",$row["docid"]);
							$row4=get_by_id("admin","adid",$row3["adid"]);
					   ?>
						<tr>
							<td> <?php echo $row["apid"]; ?></td>
							<td ><?php echo $row["date"];?> </td>
							<td ><?php echo ($row["status"]==0)? "no" :"yes";?> </td>
							<td class="hide-on-small-only"> <?php echo $row["patid"]; ?></td>
							<td class="hide-on-small-only"> <?php echo $row2["fullname"]; ?></td>
							<td class="hide-on-small-only"> <?php echo $row3["docid"]; ?></td>
							<td class="hide-on-small-only"> <?php echo $row3["fullname"]; ?></td>
							<td > <form action="receptionist_deleteapop.php" method="POST"><button  class="btn" type="submit" name="submit" value="<?php echo $row["apid"]; ?>"><i class="fas fa-trash-alt"></i></button></form> </td>	
						</tr>

						<?php }

			} ?>
						
					</tbody>
				</table>
<br>
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
