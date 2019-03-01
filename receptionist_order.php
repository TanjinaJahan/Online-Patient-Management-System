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
include_once("include/basicdb.php");
if(!empty($_POST["remove"])){
	if (in_array($_POST["remove"],$_SESSION["cart"] )){
		unset($_SESSION["cart"][array_search($_POST["remove"],$_SESSION["cart"])]);
}
}
if(!empty($_POST["submit2"])){
	$testrows=get_by_any("suggesttest","patid",$_GET["patid"]);
	if($testrows){
		while($row=mysqli_fetch_array($testrows)){
			$testlist[]=$row["testid"];
	}
	$_SESSION["cart"]=$testlist;
	}
}
if(!empty($_GET["patid"])&&!empty($_POST["testids"])){
	$_SESSION["cart"]=$_POST["testids"];
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-12"  style="padding:0">
<?php
	if (empty($_GET["patid"])){
		unset($_SESSION["cart"]);
?>
<div class="container">
	<div class="row">
		<div class="green">
			<div class="col-md-12">
				<h4>Please Select Patient: </h4>
			</div>
		</div>
	</div>
</div>

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
			
 
<table id="myTable" class="table table-hover" >
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

            <tr>
                <td>               
					<a href="receptionist_order.php?patid=<?php echo $row["patid"]; ?>">
					<?php echo $row["patid"]; ?></a>
				</td>
                <td>              
					<a href="receptionist_order.php?patid=<?php echo $row["patid"]; ?>">
					<?php echo $row["fullname"];?></a>
				</td>
            
            </tr>
 
            <?php }

} ?>
           
        </tbody>
    </table>
</div>      
<?php
}
else{
?>

			<div class="container">
				<div class="row">
					<div class="green">
						<div class="col-md-12">
							<h4>Select for Add to Cart: </h4>
						</div>
					</div>
				</div>
			</div>

			
<div class="col-md-7"  style="padding:0">
	<div class="form">
		<form method="post" action="#">
		<table class="table table-hover" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Test Name</th>
				<th>Price</th>

            </tr>
        </thead>
		<tfoot>
            <tr>
                <th>ID</th>
                <th>Test Name</th>
				<th>Price</th>

            </tr>
        </tfoot>

        <tbody>

<?php 
	$test=get_all("tests");
    if($test){
        while($row=mysqli_fetch_array($test)){
?>
            <tr>
                <td><input name="testids[]" <?php if (!empty($_SESSION["cart"])) {
                  if (in_array( $row["testid"], $_SESSION["cart"])) {
                  echo "checked";
                  }
                } ?> value="<?php echo $row["testid"]; ?>" type="checkbox" id="test<?php echo $row["testid"]; ?>" />
      <label for="test<?php echo $row["testid"]; ?>"><?php echo $row["testid"]; ?></label> </td>
                <td><?php echo $row["testname"];?> </td>
                <td><?php echo $row["price"];?> </td>
                
            </tr>

            <?php }

} ?>
            
        </tbody>
    </table>

	
		<div class="col-md-12">
			<div class="col-md-6">
				<button name="submit" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add to cart</button>
			</div>
			<div class="col-md-6">
				<button name="submit2" value="d" type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Doctor Recommended</button>
			</div>
		</div>
		</form>
    </div>
</div>
  

<div class="col-md-5" style="padding-right:0">
	<div class="form">
	<div class="row">
	<div class="green">
		<div class="col-md-12">
			<h4 >CART</h4>
		</div>
	</div>
</div>
	<br />	
          <?php         if (!empty($_SESSION["cart"])) {
     
     $_SESSION["totalcost"]=0; ?>
 <table class="table table-hover" >
        <thead>
          <tr>
              <th data-field="id">testname</th>
              <th data-field="name">price</th>
              <th data-field="price">Action</th>
          </tr>
        </thead>
		<tfoot>
          <tr>
              <th data-field="id">testname</th>
              <th data-field="name">price</th>
              <th data-field="price">Action</th>
          </tr>
        </tfoot>

        <tbody >
<?php 
	foreach ($_SESSION["cart"] as $key => $value) {
		$row=get_by_id("tests","testid",$value);
       $_SESSION["totalcost"]+=$row["price"];
?>

    <tr>
        <td>
			<?php echo $row["testname"];?> 
		</td>
        <td>
			<?php echo $row["price"];?> 
		</td>
		<td>
			<form action="#" method="POST"><button type="submit" value="<?php echo $row["testid"];?>" name="remove" class="btn btn-warning">Delete</button>
		</td>

</form>
      </tr>


<?php  

      }

           ?>

    
        </tbody>
      </table>

<h4 style="color:black; font-size:20px;font-weight:bold">Total:<?php echo $_SESSION["totalcost"]; ?></h4>

<a style="background:green; color:white"href="receptionist_orderop.php?patid=<?php echo $_GET["patid"]; ?>" class="btn confirmation">Confirm</a>



<?php  

      }

           ?>

    </div>
</div>

	

<?php
  
}
?>



</div>
 
	</div>
</div>
  
  </main>

  
<?php 


if (!empty($_GET["invid"])) {
?>
<div onload="window.open('<?php echo "receptionist_invoice.php?invid=".$_GET["invid"] ?>', '_blank')">
</div>
<?php  

}
?>
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
