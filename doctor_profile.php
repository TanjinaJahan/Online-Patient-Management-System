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
   </head>
   <body>
      <?php include_once("header.php"); ?>
	  <?php $type= 'doctor'; include_once("login_check.php"); ?>
      <?php include_once("doctor_menu.php"); 
         include_once("include/doctorsdb.php"); 
      ?>
	  <?php
		if (!empty($_POST['update'])) {
			if(!empty($_POST['password'])) {
				$row = get_by_id("doctors","docid", $_POST['update']); $id = $row["adid"];
				updation("admin", "adid", $id, array(null, $_POST["email"], md5($_POST["password"]), null, $_POST["fullname"]));
				updation("doctors", "docid", $_POST['update'], array(null, $_POST["speciality"], $id, $_POST["address"], $_POST["phone"], $_POST['available_days'], $_POST['time'], $_POST['regular_fee'], $_POST['followup_fee'], $_POST['email'], $_POST['fullname'], md5($_POST['password'])));
			} else {
				$row = get_by_id("doctors","docid", $_POST['update']); $id = $row["adid"];
				updation("admin", "adid", $id, array(null, $_POST["email"], null, null, $_POST["fullname"]));
				updation("doctors", "docid", $_POST['update'], array(null, $_POST["speciality"], $id, $_POST["address"], $_POST["phone"], $_POST['available_days'], $_POST['time'], $_POST['regular_fee'], $_POST['followup_fee'], $_POST['email'], $_POST['fullname'], null));
			}

			header("location:doctor_profile.php?smsg=".urlencode("Successfully Data Updated"));
		}
	  ?>
      <div class="container">
         <div class="row">
            <div class="green">
               <div class="col-md-12">
                  <h4 >Doctor Profile Detail</h4>
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
               <div class="form " style="padding-bottom:30px">
			   
<div id="printer">    
                  <table class="table table-hover" >
					<h4 align="center"> Doctor Information </h4><br />
                     <tbody id="myTable">
                        <?php 
							
							$row=get_by_id("doctors", "email", $_SESSION['email']);
                        ?>
                        <tr>
							<td> Doctor Id</td>
                           <td> <?php echo $row["docid"]; ?></td>
						</tr>
						<tr>
							<td> Doctor Name</td>
                           <td><?php echo $row["fullname"];?> </td>
                        </tr>
						<tr>
							<td> Address </td>
							<td class="hide-on-small-only"><?php echo $row["address"];?> </td>
						</tr>
						<tr>
							<td> Phone </td>
							<td class="hide-on-small-only"><?php echo $row["phone"];?> </td>
						</tr>
						<tr>
							<td> Email </td>
							<td class="hide-on-small-only"><?php echo $row["email"];?> </td>
						</tr>
						<tr>
							<td> Available Days </td>
							<td class="hide-on-small-only"><?php echo $row["available_days"];?> </td>
						</tr>
						<tr>
							<td> Available Time </td>
							<td class="hide-on-small-only"><?php echo $row["time"];?> </td>
						</tr>
						<tr>
							<td> Regular Fee </td>
							<td class="hide-on-small-only"><?php echo $row["regular_fee"];?> </td>
						</tr>
						<tr>
							<td> Followup Fee </td>
							<td class="hide-on-small-only"><?php echo $row["followup_fee"];?> </td>
						</tr>
						
                     </tbody>
                  </table>
				 </div>
				<a href="#updateop" data-toggle="modal">
					<button class="btn btn-warning" type="button"><i class="fas fa-edit"></i> Edit </button>
				</a>
				<button onclick='vai("printer")' href="#" type="button" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
								
                  <br>
               </div>
            </div>
         </div>
      </div>
	  
	  <div id="updateop" class="modal modal-fixed-footer ">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<br />
						<div class="form" style="width:50%; margin:auto;background:green">
							<form method="post" action="doctor_profile.php">
								<h3 style="text-align:center">Update Dr. <?php echo $row["fullname"]; ?> Info</h3>
								<br />

								<input value="<?php echo $row["fullname"]; ?>" type="text" class="form-control" name="fullname" placeholder="Enter Your Name" required>

								<input value="<?php echo $row["address"]; ?>" type="text" class="form-control" name="address" placeholder="Enter Your Address" required>

								<input value="<?php echo $row["phone"]; ?>" type="text" class="form-control" name="phone" placeholder="Enter Your Mobile number" required>

								<input value="<?php echo $row["email"]; ?>" type="email" class="form-control" name="email" id="email" placeholder="Enter Your E-mail" disabled readonly>
								<input value="<?php echo $row["email"]; ?>" type="hidden" name="email">
								<select class="form-control" name="speciality" id="" required>
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
									$(document).ready(function() {
										var svalue = '<?php echo $row["speciality"]; ?>';
										$('select[name="speciality"]').find('option[value="' + svalue + '"]').prop('selected', true);
									});
								</script>

								<input value="<?php echo $row["available_days"]; ?>" type="text" name="available_days" class="form-control" placeholder="Available days" required>

								<input value="<?php echo $row["time"]; ?>" type="text" name="time" class="form-control" placeholder="Available Time" required>

								<div class="col-md-6">
									<div class="row">
										<input value="<?php echo $row["regular_fee"]; ?>" type="number" name="regular_fee" class="form-control" placeholder="regular Fee" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
										<input value="<?php echo $row["followup_fee"]; ?>" type="number" name="followup_fee" class="form-control" placeholder="FollowUp Fee" required>
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