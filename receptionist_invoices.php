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
				<h4 >Invoice Information</h4>
			</div>
		</div>
	</div>
</div>
  
  
<div class="container">
<div class="row">
    <div class="col-md-12" style="padding:0">
		<div class="form">
		
		
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
		<br /><br />
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
						<th>Invoice ID</th>
						<th>Date Time</th>
						<th>Patient ID</th>
						<th>Patient Name</th>
						<th>Action</th>
					</tr>
				</thead>
			   <tfoot>
					<tr>
						 <th>Invoic ID</th>
						<th>Date Time</th>
						<th>Patient ID</th>
						<th>Patient Name</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody id="myTable">

				  <?php 

				  $invoice=get_all("invoice");
				  if($invoice)
				  {
				  while($row=mysqli_fetch_array($invoice))
				  {

						$row2=get_by_id("patients","patid",$row["patid"]);

				   ?>
					<tr>
						<td> <?php echo $row["invid"]; ?></td>
						<td class="hide-on-small-only"><?php echo $row["datetime"];?> </td>
						<td class="hide-on-small-only"><?php echo $row["patid"];?> </td>
						<td class="hide-on-small-only"><?php echo $row2["fullname"];?> </td>
					<td>
						<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"data-activates='dropdown<?php echo $row["invid"];?>'>Action
						<span class="caret"></span></button>
						<ul class="dropdown-menu"id='dropdown<?php echo $row["invid"]; ?>'>
							<li><a target="_blank" href="receptionist_invoice.php?invid=<?php echo $row["invid"]; ?>">Invoice</a></li>
							<li><a  href="receptionist_testprocess.php?invid=<?php echo $row["invid"]; ?>">Processing</a></li>  
						</ul>
					  </div>

						</td>   						
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
