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

<?php include_once("receptionist_menu.php"); 
include_once("include/basicdb.php");
include_once("include/doctorsdb.php");
?>
<div class="container">
<div class="row">
    <div class="">
     
    <?php
if (empty($_GET["patid"]))
{
  
?>
<div class="container">
	<div class="row">
		<div class="green">
			<div class="col-md-12">
				<h4>please select patient: </h4>
			</div>
		</div>
	</div>
</div>
<div class="container ">
	<div class="row">
		<div class="col-md-12"  style="padding:0">
			<div class="form">
			
			
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6"><br /><br /></div>
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
    
            </tr>
        </thead>
		<tfoot>
            <tr>
                <th>ID</th>
                <th>Fullname</th>
    
            </tr>
        </tfoot>
       
        <tbody id="myTable">

			<?php 
				$patient=get_all("patients");
					if($patient){
						while($row=mysqli_fetch_array($patient)){
			?>

            <tr class="linkable" href="receptionist_createap.php?patid=<?php echo $row["patid"]; ?>">
                <td>               
					<a href="receptionist_createap.php?patid=<?php echo $row["patid"]; ?>"><?php echo $row["patid"]; ?></a>
				</td>
                <td>              
					<a href="receptionist_createap.php?patid=<?php echo $row["patid"]; ?>"><?php echo $row["fullname"];?></a>
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
	  

<?php
}

else if (empty($_GET["docid"])){


?>
 <div class="card-panel col s12 m12 l12 ">

 
 <div class="container">
	<div class="row">
		<div class="green">
			<div class="col-md-12">
				<h4>Please Select Doctor: </h4>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="form">
		
			
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6"><br /><br /></div>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for">
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
                <th>Speciality</th>
            </tr>
        </thead>
		<tfoot>
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Speciality</th>
            
            </tr>
        </tfoot>
        <tbody>

        <?php 
			$doctor=get_all("doctors");
				if($doctor){
					while($row=mysqli_fetch_array($doctor)){
						$row2=get_by_id("doctors","docid",$row["docid"]);
		?>

            <tr>
                <td>
					<a href="receptionist_createap.php?patid=<?php echo $_GET["patid"];?>&docid=<?php echo $row["docid"]; ?>"><?php echo $row["docid"]; ?></a>
				</td>
                <td>              
					<a href="receptionist_createap.php?patid=<?php echo $_GET["patid"]; ?>&docid=<?php echo $row["docid"]; ?>"><?php echo $row2["fullname"];?></a>
				</td>
				<td>              
					<a href="receptionist_createap.php?patid=<?php echo $_GET["patid"]; ?>&docid=<?php echo $row["docid"]; ?>"><?php echo $row["speciality"];?></a>
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

<?php }
else{
?>
<div class="container">
	<div class="row">
		<div class="col-md-12" Style="padding:0">
			<div class="form">
				<form method="post" action="receptionist_createapop.php">
					<input type="hidden" name="patid" value="<?php echo $_GET["patid"]; ?>">
					<input type="hidden" name="docid" value="<?php echo $_GET["docid"]; ?>">
					<div class="input-field col s6">
						<div>
							<label style="margin-top:10px"class="active" for="date">Appointment Date</label>
						</div>
					<input style="color:black" id="date" type="date" min="<?php echo date("Y-m-d"); ?>" name="date" value="<?php echo date("Y-m-d"); ?>">

					</div>
					<div class="input-field col s6">
						<button style="background:green" class="btn" type="submit">create appointment</button>
					</div>
				</form>
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
