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
<?php $type= 'patient'; include_once("login_check.php"); ?>
<?php include_once("patient_menu.php"); 
include_once("include/doctorsdb.php"); 

?>
<div class="container">
	<div class="row">
		<div class="green">
			<div class="col-md-12">
				<h4 class="bold">Test Information</h4>
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
			<th>Test Name</th>
			<th>Price</th>
		</tr>
    </thead>
	<tfoot>
		<tr>
			<th>Test Name</th>
			<th>Price</th>
		</tr>
    </tfoot>
					
	<tbody id="myTable">

          <?php 

          $test=get_all("tests");
			if($test){
			while($row=mysqli_fetch_array($test)){
 ?>
            <tr>                
                <td><?php echo $row["testname"];?> </td>
                <td><?php echo $row["price"];?> </td>                
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
  </main>

  





      <?php 

          $test=get_all("tests");
          if($test)
          {
          while($row=mysqli_fetch_array($test))
          {



           ?>


       
            

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
