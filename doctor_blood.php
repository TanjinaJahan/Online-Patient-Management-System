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
		<div class="col-md-12"  style="padding:0">

<div class="form ">  
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6"><br /><br /></div>
		<div class="col-md-6">
			<div class="input-group">
				<input type="text" class="form-control" id="myInput" placeholder="Search for" />
				<span class="input-group-btn">
				<button class="btn btn-default" type="button">Go</button>
				</span>
			</div>
		</div>
	</div>
</div>
			
<div id="printer">  
<table id="myTable" class="table table-hover" >
		<thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile No</th>
                <th>E-mail</th>
                <th>Blood Group</th>    
            </tr>
		</thead>
		<tbody>
		 <?php 
          $patient=get_all("patients");
          if($patient) {
			while($row=mysqli_fetch_array($patient)){
        ?>
			<tr>
                <td><?php echo $row["fullname"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td style="color: red; font-weight:bold"><?php echo $row["blood_group"]; ?></td>  
            </tr>
		<?php
			}
		  }
		?>
		</tbody>
		<tfoot>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Mobile No</th>
                <th>E-mail</th>
                <th>Blood Group</th>  
            </tr>
		</tfoot>
    </table>
</div>
<button onclick='vai("printer")' href="#" type="button" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
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
