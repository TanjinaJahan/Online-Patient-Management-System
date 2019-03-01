<?php 
include_once("include/basicdb.php");
if (!empty($_GET["invid"])) {
 $invoice=get_by_id("invoice","invid",$_GET["invid"]);
$patient=get_by_id("patients","patid",$invoice["patid"]);
$testlist=get_by_any("testlist","invid",$_GET["invid"]);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Invoice</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="all" />
	<link href="css/light/light.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css2/dashboard.css" media="all" />
</head>
<body>
	
<?php $type= 'receptionist'; include_once("login_check.php"); ?>	
	<div class="container">
	<div class="row">
	<div class="col-md-12">
	<div class="form"style="background:white;color:black">
 <div id="printer">
 <div class="row">
 <div class="col-md-12">
			<div class=""style="text-align:center; color:blue"><h1>Ibn Sina Diagnostic & Consultation Center, Uttara</h1></div>
		</div>
	<div class="col-md-12 col-sm-12">
		<div class="col-md-6 col-sm-6 col-xs-6">
		<div class="logo">
        <img src="image/logo.png">
      </div>
		</div>
		
		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="" align="right">
				<h2 class="">Diagnostic Center </h2>
				<div>13/12, 14/b Uttara-10, Bangladesh</div>
				<div>+8801924533566</div>
				<div><a href="mailto:diagnostic@center.com">diagnostic@center.com</a></div>
				<br />
			</div>
		</div>
	</div>
	
	
</div>
<div class="col-md-12"><hr /><br /></div>
<div class="row">
	<div class="col-md-12 ">
		<div class="col-md-6 col-sm-6 col-xs-6">
		<div id="client">
          <h1>INVOICE TO:</h1>
          
          <h2 style="margin:0;padding:0"><?php echo $patient["fullname"];?></h2>
          <div class="address"><?php echo $patient["address"];?></div>
          <div class="phone"><a href="phone:john@example.com"><?php echo $patient["phone"];?></a></div>
        </div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="" align="right">
				<h1>INVOICE </h1>
          <div class="date">Date of Invoice: <?php $date = strtotime($invoice["datetime"]);  echo date('m/d/y',$date ); ?></div>
          <div class="ID">Invoice ID: <?php echo $invoice["invid"];?> </div>
          <div class="ID">Patient ID:<?php echo $patient["patid"];?></div><br /><br />
			</div>
		</div>
	</div>
</div>     
    <main>
      
      <table class="table table-hover" >
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          $no=1;
            if ($testlist) {
       while ($row=mysqli_fetch_array($testlist)) {
        $test=get_by_id("tests","testid",$row["testid"]);



 ?>


    <tr>
            <td class="no"><?php echo $no++; ?></td>
            <td class="desc"><?php echo $test["testname"]; ?></td>
            <td class="unit"><?php echo $test["price"]; ?></td>
            <td class="qty">1</td>
            <td class="total"><?php echo $test["price"]; ?></td>
          </tr>



 <?php
       }
            }

           ?>
      
          
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td><?php echo $invoice["total"]; ?></td>
          </tr>
              <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX</td>
            <td><?php echo 0; ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td><?php echo $invoice["total"]; ?></td>
          </tr>
        </tfoot>
      </table>
	  <div class="col-md-12 col-sm-12">
	  <h2>Thank you!</h2>
	  </div>
      <div class="col-md-12">
	  <div id="notices">
        <div>TERM & CONDITION:</div>
        <div class="notice">Money cannot be back .</div>
        <div class="notice">Love is the source of energy</div><br />
      </div>
	  </div>
      <div class="col-md-12"><hr /></div>
    </main>
    <footer style="text-align:center">
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
	
    </div><br /><br />
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<button onclick='vai("printer")' href="#" type="button" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
				
				<a href="receptionist_invoices.php"><button type="button" href="#" class="btn btn-success"><i class="fas fa-hand-point-left"></i> Back</button></a>
			</div>
		</div>
	</div>	
    </div>	
    </div>
    </div>	
    </div>

	
  
<script type="text/javascript">
function vai(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;

  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;

}
    </script>

	<script type="text/javascript"src="js/jquery.js"></script>
	<script type="text/javascript"src="js/bootstrap.min.js"></script>
	
</body>
</html>

<?php } ?>
