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
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body>
<?php include_once("header.php"); ?>
<?php $type= 'receptionist'; include_once("login_check.php"); ?>
<?php include_once("receptionist_menu.php"); 
include_once("include/basicdb.php");?>

<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding:0">
			<div class="form" style="background:white; color:black">
   
<?php 
$test=get_by_id("testlist","testlistid",$_GET["testlistid"]);
?>
            <h3 align="center">TEST REPORT</h3>

			<form method="POST" action="receptionist_reportop.php" enctype="multipart/form-data">
				<textarea name= "template"  class="ckeditor" id="editor" ><?php echo $test['report']; ?></textarea>

					
						<a class="btn btn-primary" href="receptionist_testprocess.php?invid=<?php echo $test["invid"]; ?>"  name="update"><i class="fas fa-hand-point-left"></i> Back</a>
					
					
						<button class="btn btn-success" type="submit" value="<?php echo $_GET["testlistid"]; ?>" name="update"><i class="fas fa-save"></i> Save</button>
							
			</form>
			</div>
		</div>
	</div>
</div>
 


<?php include_once("footer.php"); ?>
	<script type="text/javascript"src="js/jquery.js"></script>
	<script type="text/javascript"src="js/bootstrap.min.js"></script>
	
</body>
</html>
