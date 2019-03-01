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
<?php $type= 'admin'; include_once("login_check.php"); ?> 
<?php include_once("admin_menu.php"); 
include_once("include/doctorsdb.php"); 

?>
<div class="container">
	<div class="row">
	<div class="green">
	<div class="col-md-12">
		<h4 class="bold">Tests Information</h4>
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
			<a href="#insertop" data-toggle="modal" class="btn btn-info" role="button"style="background:green;color:white;border:1px solid green;border-radius:4px"><i class="fas fa-plus"></i> Insert Test Info</a>
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
							<th>ID</th>
							<th>Test Name</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Test Name</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</tfoot>
					
					<tbody id="myTable">

          <?php 

          $test=get_all("tests");
          if($test)
          {
          while($row=mysqli_fetch_array($test))
          {



           ?>
            <tr>
                <td> <?php echo $row["testid"]; ?></td>
                <td><?php echo $row["testname"];?> </td>
                <td><?php echo $row["price"];?> </td>
                <td> 
<div class="dropdown">
	<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"data-activates='dropdown<?php echo $row["testid"];?>'>Action
	<span class="caret"></span></button>
		<ul class="dropdown-menu"id='dropdown<?php echo $row["patid"]; ?>'>
			<li><a href="#updateop<?php echo $row["testid"]; ?>"data-toggle="modal">Edit</a></li>
			<li><a  href="admin_testsop.php?delid=<?php echo $row["testid"]; ?>">Delete</a></li>  
		</ul>
</div>				
				
				</td>
            </tr>

            <?php }

} ?>
            
        </tbody>
    </table>
</div>
<button onclick='vai("printer")' href="#" type="button" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
</div>

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
				<form method="post" action="admin_testsop.php">
					<h3 style="text-align:center">Insert Test Info</h3><br />
						
						<input type="text" class="form-control" name="testname" placeholder="Enter Test Name">
						
						<input type="number" class="form-control"name="price" placeholder="Enter Test Price">
						
						
						
						<button type="submit" class="btn btn-success" name="insert" value="insert">SUBMIT</button>
						<button type="reset" class="btn btn-warning">RESET</button>
					
				</form>
			</div>
		</div>
	
	</div>
	</div>
  </div>

<?php 
$test=get_all("tests");
    if($test){
        while($row=mysqli_fetch_array($test)){
?>
<div id="updateop<?php echo $row["testid"]; ?>" class="modal fade ">
     <div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<br />
		<div class="form" style="width:50%; margin:auto;background:green">
				<form method="post" action="admin_testsop.php">
					<h3 style="text-align:center">Update Test Info</h3><br />
						
						<input value="<?php echo $row["testname"]; ?>" type="text" class="form-control" name="testname" placeholder="Enter Test Name">
						
						<input value="<?php echo $row["price"]; ?>" type="number" class="form-control"name="price" placeholder="Enter Test Price">
						
						
						
						<button value="<?php echo $row["testid"]; ?>" type="submit" class="btn btn-success" name="update">SUBMIT</button>
						
					
				</form>
			</div>
		</div>
	
	</div>
	</div>
  </div>

       
            

  <?php }} ?>


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

