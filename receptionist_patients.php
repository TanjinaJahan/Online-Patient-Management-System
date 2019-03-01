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
<?php $type= 'receptionist'; include_once("login_check.php"); ?>
<?php include_once("receptionist_menu.php"); 
include_once("include/doctorsdb.php"); 

?>
<div class="container">
	<div class="row">
		<div class="green">
			<div class="col-md-12">
				<h4 class="bold">Patient Information</h4>
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
			<a href="#insertop" data-toggle="modal"class="btn btn-info" role="button"style="background:green;color:white;border:1px solid green;border-radius:4px"><i class="fas fa-plus"></i> Insert New Patient</a>
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
							<th>ID</th>
							<th>Fullname</th>
							<th>Age</th>
							<th>Gender</th>
							<th>Datetime</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Fullname</th>
							<th>Age</th>
							<th>Gender</th>
							<th>Datetime</th>
							<th>Action</th>
						</tr>
					</tfoot>
					
<tbody id="myTable">

          <?php 

          $patient=get_all("patients");
          if($patient)
          {
          while($row=mysqli_fetch_array($patient))
          {

           ?>
            <tr>
                <td> <?php echo $row["patid"]; ?></td>
                <td><?php echo $row["fullname"];?> </td>
                <td><?php echo $row["age"];?> </td>
                <td><?php echo $row["gender"];?> </td>
                <td><?php echo $row["datetime"];?> </td>
				<td> 
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"data-activates='dropdown<?php echo $row["patid"];?>'>Action
						<span class="caret"></span></button>
						<ul class="dropdown-menu"id='dropdown<?php echo $row["patid"]; ?>'>
							<li><a href="#updateop<?php echo $row["patid"]; ?>"data-toggle="modal">Edit</a></li>
							<li><a  href="receptionist_testprocess.php?patid=<?php echo $row["patid"]; ?>">Test List</a></li>  
						</ul>
					  </div>		
				</td>  

            </tr>

<?php }

} ?>
            
        </tbody>
    </table>
</div>
</div>
</div>
</div>

<div id="insertop" class="modal modal-fixed-footer ">
     
	 <div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<br />
			<div class="form" style="width:50%; margin:auto;background:green">
				<form method="post" action="receptionist_patientsop.php">
					<h3 style="text-align:center">Insert Patient Info</h3><br />
					
					<input type="text" name="fullname" class="form-control"  placeholder="Enter Your Name"required>
					
					<input type="text" name="address" class="form-control" placeholder="Enter Your Address"required>
					
					<input type="number" name="age" class="form-control"  placeholder="Enter Your Age"required>
					
					<select class="form-control" name="gender" id=""required>
						<option value="">Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					</select>
					
					<input type="number" name="phone" class="form-control"  placeholder="Enter Your Mobile number"required>
					
					<input type="email" name="email" class="form-control" id="email" placeholder="Enter Your E-mail"required>
					
					<select class="form-control" name="blood_group" id=""required>
						<option value="">Blood Group</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					</select>
					<input type="password" name="password" class="form-control" id="pwd"placeholder="Enter the password">
					<input type="password" name="password2" class="form-control" id="pwd"placeholder="Re-enter password">
					
					<button type="submit" name="insert" value="insert" class="btn btn-success">SUBMIT</button>
					<button type="reset" name="reset" class="btn btn-warning">RESET</button>
				</form>
				
				
			</div>
		</div>
	
	</div>
</div>
  </div>

      <?php 

          $patient=get_all("patients");
          if($patient)
          {
          while($row=mysqli_fetch_array($patient))
          {



           ?>
<div id="updateop<?php echo $row["patid"]; ?>" class="modal fade ">
 <div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<br /><br />
			<div class="form" style="width:50%;margin:auto; background:green; margin:auto;background:green">
				<form method="post" action="receptionist_patientsop.php">
					<h3 style="text-align:center">Update Patient Info</h3><br />
					
					<input value="<?php echo $row["fullname"]; ?>" type="text" name="fullname" class="form-control"  placeholder="Enter Your Name"required>
					
					<input value="<?php echo $row["address"]; ?>"type="text" name="address" class="form-control" placeholder="Enter Your Address"required>
					
					<input value="<?php echo $row["age"]; ?>" type="number" name="age" class="form-control"  placeholder="Enter Your Age"required>
					
					<select value="<?php echo $row["gender"]; ?>" class="form-control" name="gender" id="pg<?php echo $row["patid"]; ?>" required>
						<option value="">Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Other">Other</option>
					</select>
					<script>
						$(document).ready(function(){
							$('#pg<?php echo $row["patid"]; ?>').find('option[value="<?php echo trim($row["gender"]); ?>"]').prop('selected', true);
						});
					</script>
					
					<input value="<?php echo $row["phone"]; ?>" type="number" name="phone" class="form-control"  placeholder="Enter Your Mobile number"required>
					
					<input value="<?php echo $row["email"]; ?>" type="email" class="form-control" name="email" id="email" placeholder="Enter Your E-mail" disabled readonly>
					
					<input value="<?php echo $row["email"]; ?>" type="hidden" name="email">
					
					<select value="<?php echo $row["blood_group"]; ?>" class="form-control" name="blood_group" id="pbg<?php echo $row["patid"]; ?>"required>
						<option value="">Blood Group</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					</select>
					<script>
						$(document).ready(function(){
							$('#pbg<?php echo $row["patid"]; ?>').find('option[value="<?php echo trim($row["blood_group"]); ?>"]').prop('selected', true);
						});
					</script>
					<input type="password" name="password" class="form-control" id="pwd"placeholder="Enter the password">
					
					
					<button value="<?php echo $row["patid"]; ?>" type="submit" name="update" class="btn btn-success">SUBMIT</button>
					
				</form>
				
			</div>
		</div>
	
	</div>
</div>       
  </div>

   
            

  <?php }} ?>

<?php include_once("footer.php"); ?>
	
	<script type="text/javascript"src="js/bootstrap.min.js"></script>
	
</body>
</html>
