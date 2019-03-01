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


if(!empty($_POST["update"]))
{
 $date= date($_POST["date"]);

  updation("testlist","testlistid",$_POST['update'],array(null,null,null,null,1, $date,null));

}

if(!empty($_GET["delivered"]))
{


  updation("testlist","testlistid",$_GET["delivered"],array(null,null,null,null,3, null,null));

}



?>
<div class="container">
<div class="row">
    <div class="col-md-12" style="padding:0" >
    
   
    

    <?php
if (!empty($_GET["patid"])||!empty($_GET["invid"]) )
{
 
?>
<div class="container">
	<div class="row">
		<div class="green">
			<div class="col-md-12">
				<h3>
					<?php 
						$link="";
						if (!empty($_GET["patid"])) {
						$link="patid=".$_GET["patid"];
						$row3=get_by_id("patients","patid",$_GET["patid"]);
						echo "Test List of ".$row3['fullname'];
						}
						if (!empty($_GET["invid"])) {
						$link="invid=".$_GET["invid"];
						$row4=get_by_id("invoice","invid",$_GET["invid"]);
						$row3=get_by_id("patients","patid",$row4["patid"]);
						echo "Test List of ".$row3['fullname']." Invoice No".$row4["invid"];
						}          
					?>
				</h3>
			</div>
		</div>
	</div>
</div>

<div class="form ">
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
            <th>Test ID</th>
            <th>Test Name</th>
            <th>Test Status</th>
            <th>Delivery Date</th>
            <th>Action</th>
		</tr>
    </thead>
    <tfoot>
        <tr>
            <th>Invoice ID</th>
            <th>Test ID</th>
            <th>Test Name</th>
            <th>Test Status</th>
            <th>Delivery Date</th>
            <th></th>
        </tr>
    </tfoot>
    <tbody id="myTable">

<?php 
if (!empty($_GET["patid"])){
	$testlist=get_by_any("testlist","patid",$_GET["patid"]);
	}
    if (!empty($_GET["invid"])){
	$testlist=get_by_any("testlist","invid",$_GET["invid"]);
	}  
        if($testlist){
			while($row=mysqli_fetch_array($testlist)){
            $row2=get_by_id("tests","testid",$row["testid"]);
?>


        <tr>
			<td> <?php echo $row["invid"]; ?> </td>  
            <td> <?php echo $row["testid"]; ?> </td>
            <td> <?php echo $row2["testname"]; ?> </td>
            <td> <?php 

                    switch ($row["status"] ) {
						case 0:
                        echo "paid";
							break;
                        case 1:
                        echo "tested";
							break;
                        case 2:
                        echo "reported";
                         # code...
                        break;
                        case 3:
                        echo "delived";
                         # code...
							break;
                    default:
                         # code...
                        break;
                     }
?> 
			</td>
            <td> <?php echo $row["deliverydate"]; ?> </td>
            <td> 
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"data-activates='dropdown<?php echo $row["testlistid"];?>'>Action
					<span class="caret"></span></button>
					<ul class="dropdown-menu"id='dropdown<?php echo $row["testlistid"]; ?>'>
						<li><a href="#update<?php echo $row["testlistid"]; ?>"data-toggle="modal">Testing</a></li>
						<li><a  href="receptionist_report.php?testlistid=<?php echo $row["testlistid"]; ?>">Reporting</a></li>
						<li><a  href="receptionist_testprocess.php?<?php echo $link; ?>&delivered=<?php echo $row["testlistid"]; ?>">delivery</a></li>	
					</ul>
				</div>	
			</td>           
		</tr>

<div id="update<?php echo $row["testlistid"]; ?>" class="modal modal-fixed-footer">
    <div class="container">
	<div class="row">
		<div class="col-md-12">
		<br />
			<form action="" method="post">
			<div class="form" style="display: block;width:50%;margin:auto; background:green" >
				<h3 style="text-align:center">update Test</h3>
				<div>
					<label class="active" for="datepicker">Delivery Date</label>
				</div>
				<input style="color:black" min="<?php echo date("Y-m-d"); ?>"id="datepicker"  value="<?php echo date($row["deliverydate"]); ?>"  type="date" name="date" >
				<div>
				<button style="background:#2D6A9F;width:150px" type="submit" name="update" value="<?php echo $row["testlistid"]; ?>" class="btn">Submit</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	</div>
</div>
<?php }

} ?>
	</tbody>
</table>
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
