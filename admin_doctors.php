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
</head>
<body>
<?php include_once("header.php"); ?>
<?php $type= 'admin'; include_once("login_check.php"); ?>	
<?php include_once("admin_menu.php"); 
include_once("include/doctorsdb.php"); 
?>
<div class="container">
	<div class="row">
		<div class="green">
			<div class="col-md-12">
				<h4 class="bold">Doctor Information</h4>
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
				<a href="#insertop" data-toggle="modal" class="btn btn-info" role="button"style="background:green;color:white;border:1px solid green;border-radius:4px"><i class="fas fa-plus"></i> Insert New Doctor</a>
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
<div id="printer"> 			  
<table class="table table-hover" >
    <thead>
		<tr>
			<th>Id</th>
			<th>Full Name</th>
			<th>Speciality</th>
			<th>Action</th>
		</tr>
    </thead>
	<tfoot>
		<tr>
			<th>Id</th>
			<th>Full Name</th>
			<th>Speciality</th>
			<th>Action</th>
		</tr>
    </tfoot>
					
	<tbody id="myTable">

          <?php 

          $doctor=get_all("doctors");
          if($doctor)
          {
          while($row=mysqli_fetch_array($doctor))
          {

            $row2=get_by_id("doctors","docid",$row['docid']);


           ?>
            <tr>
                <td> <?php echo $row["docid"]; ?></td>
                <td><?php echo $row2["fullname"];?> </td>
                <td><?php echo $row["speciality"];?> </td>
				<td>  
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"data-activates='dropdown<?php echo $row["docid"];?>'>Action
						<span class="caret"></span></button>
						<ul class="dropdown-menu"id='dropdown<?php echo $row["patid"]; ?>'>
							<li><a href="#updateop<?php echo $row["docid"]; ?>"data-toggle="modal">Edit</a></li>
							<li><a  href="admin_doctorsop.php?delid=<?php echo $row["docid"]; ?>">Delete</a></li>  
						</ul>
					</div>				
				</td>
            </tr>
            <?php 
			}
			}
			?>
        </tbody>
    </table>
</div>
<button onclick='vai("printer")' href="#" type="button" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
      </div>



    </div>
 
	</div>
</div>
  </main>

  



<div id="insertop" class="modal fade ">
     <div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<br />
		<div class="form" style="width:50%; margin:auto;background:green">
				<form method="post" action="admin_doctorsop.php">
					<h3 style="text-align:center">Insert Doctor Info</h3><br />
						
						<input type="text" class="form-control" name="fullname" placeholder="Enter Your Name">
						
						<input type="text" class="form-control"name="address" placeholder="Enter Your Address">
						
						<input type="text" class="form-control" name="phone" placeholder="Enter Your Mobile number">
						
						<input type="email" class="form-control" name="email" id="email" placeholder="Enter Your E-mail">
						
						<select class="form-control" name="speciality" id="">
							<option value="">Speciality</option>
							<option value="Medicine">Medicine</option>
							<option value="Child Health">Child Health</option>
							<option value="Orthopaedic">Orthopaedic</option>
							<option value="Cardiologist">Cardiologist</option>
							<option value="Skin & VD">Skin & VD</option>
							<option value="diabetologist">diabetologist</option>
							<option value="Liver">Liver</option>
							<option value="Neuromedicine">Neuromedicine</option>
							<option value="Urology">Urology</option>
						</select>
						
						
						
						
						<input type="text" name="available_days"class="form-control" placeholder="Available days">
						
					
						<input type="text" name="time" class="form-control" placeholder="Available Time">
							
						
						
						<div class="col-md-6">
							<div class="row">
								<input type="number" name="regular_fee" class="form-control" placeholder="regular Fee">
							</div>
						</div>
								
						<div class="col-md-6">
							<div class="row">
								<input type="number" name="followup_fee" class="form-control" placeholder="FollowUp Fee">
							</div>
						</div>
						
						
					
						<input type="password" class="form-control" name="password" id="pwd"placeholder="Enter the password">
						
						<input type="password" class="form-control" name="password2" id="pwd"placeholder="Re-enter password">
					
					
					<button type="submit" class="btn btn-success" name="insert" value="insert">SUBMIT</button>
					<button type="reset" name="reset" class="btn btn-warning">RESET</button>
					
				</form>
			</div>
		</div>
	
	</div>
	</div>
  </div>

 <?php 

          $doctor=get_all("doctors");
          if($doctor)
          {
          while($row=mysqli_fetch_array($doctor))
          {

            $row2=get_by_id("doctors","docid",$row['docid']);


           ?>
<div id="updateop<?php echo $row["docid"]; ?>" class="modal modal-fixed-footer ">
     <div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<br />
		<div class="form" style="width:50%; margin:auto;background:green">
				<form method="post" action="admin_doctorsop.php">
					<h3 style="text-align:center">Update Dr. <?php echo $row["fullname"]; ?> Info</h3><br />
						
						<input value="<?php echo $row["fullname"]; ?>" type="text" class="form-control" name="fullname" placeholder="Enter Your Name"required>
						
						<input value="<?php echo $row["address"]; ?>" type="text" class="form-control"name="address" placeholder="Enter Your Address"required>
						
						<input value="<?php echo $row["phone"]; ?>" type="text" class="form-control" name="phone" placeholder="Enter Your Mobile number"required>
						
						<input value="<?php echo $row["email"]; ?>" type="email" class="form-control" name="email" id="email" placeholder="Enter Your E-mail" required>
						
						<select class="form-control" name="speciality" id="sp<?= $row["docid"]; ?>" required>
							<option value="">Speciality</option>
							<option value="Medicine">Medicine</option>
							<option value="Child Health">Child Health</option>
							<option value="Orthopaedic">Orthopaedic</option>
							<option value="Cardiologist">Cardiologist</option>
							<option value="Skin & VD">Skin & VD</option>
							<option value="diabetologist">diabetologist</option>
							<option value="Liver">Liver</option>
							<option value="Neuromedicine">Neuromedicine</option>
							<option value="Urology">Urology</option>
						</select>
						<script>
							$(document).ready(function(){
								var svalue	= '<?php echo $row["speciality"]; ?>';
								$('#sp<?= $row["docid"]; ?>').find('option[value="'+svalue+'"]').prop('selected', true);
							});
						</script>
						
						
						
						<input value="<?php echo $row["available_days"]; ?>" type="text" name="available_days"class="form-control" placeholder="Available days"required>
						
					
						<input value="<?php echo $row["time"]; ?>" type="text" name="time" class="form-control" placeholder="Available Time"required>
							
						
						
						<div class="col-md-6">
							<div class="row">
								<input value="<?php echo $row["regular_fee"]; ?>" type="number" name="regular_fee" class="form-control" placeholder="regular Fee"required>
							</div>
						</div>
								
						<div class="col-md-6">
							<div class="row">
								<input value="<?php echo $row["followup_fee"]; ?>" type="number" name="followup_fee" class="form-control" placeholder="FollowUp Fee"required>
							</div>
						</div>
						
						<input type="password" class="form-control" name="password" id="pwd" placeholder="Enter the password">
						<button value="<?php echo $row["docid"]; ?>" type="submit" class="btn btn-success" name="update">SUBMIT</button>
				</form>
			</div>
		</div>
	
	</div>
	</div>
	
  </div>
  <?php }} ?>


<?php include_once("footer.php"); ?>
<script type="text/javascript">
function vai(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;

  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;

}
</script>
	<script type="text/javascript"src="js/bootstrap.min.js"></script>
	
</body>
</html>
