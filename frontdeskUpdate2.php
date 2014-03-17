<?php	
include_once("php/_function.php");
$dsn = dsn_auth();
//echo "<br>id: ".$dsn['id'];
if ( 0+$dsn['level'] > 2 ) { $can_admin = 1; } 
else { header("location:http://us.dibiakcom.net/wp") ;}
?><!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ds.dibiakcom.net/jquery/jquery-latest.js"></script>
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/reset.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/font-awesome.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Frontdesk Update</title>
<style>
	input[type=checkbox] { width: 120px; height: 24px;}
	input[type=radio] {  width: 20px;height: 24px;}     
</style>
<script>
function submitAction(act) {
	document.myForm.action = act;
	//document.myForm.submit();
}	
</script>
</head>
<body>
	<?php
		require_once 'meekrodb.2.1.class.php';
		$id = $_GET['id'];
		$row = DB::queryFirstRow("SELECT * FROM log WHERE idlog=%i", $id);
	?>
	<form name="myForm" method="post">
		<label>Query No: </label> 
		<input type="text" name="query" value="<?= $row['query'] ?>" readonly>
		<br>
		<input type="hidden" name="id" value="<?= $id ?>">
		<label>Customer: </label> 
		<input type="text" name="customer" pattern="[A-Za-z ]*" value="<?= $row['customer']?>" required>
		<br>
		<label>Product: </label><select name="product">		
		<option value=1 <?php if($row['product']==1) echo 'selected' ?>>Document</option>
		<option value=2 <?php if($row['product']==2) echo 'selected' ?>>Desktop</option>
		<option value=3 <?php if($row['product']==3) echo 'selected' ?>>Laptop</option>
		<option value=4 <?php if($row['product']==4) echo 'selected' ?>>Monitor</option>
		<option value=5 <?php if($row['product']==5) echo 'selected' ?>>Printer</option>
		<option value=6 <?php if($row['product']==6) echo 'selected' ?>>Scanner</option>
		<option value=7 <?php if($row['product']==7) echo 'selected' ?>>Speaker</option>
		<option value=8 <?php if($row['product']==8) echo 'selected' ?>>UPS</option>
		<option value=9 <?php if($row['product']==9) echo 'selected' ?>>ISP</option>
		<option value=10 <?php if($row['product']==10) echo 'selected' ?>>Other</option>
		</select>
		<br>
		<label>Service: </label>
		<select name="service">	
		<option value=1 <?php if($row['service']==1) echo 'selected' ?>>Type & Print</option>
		<option value=2 <?php if($row['service']==2) echo 'selected' ?>>Scan & Email</option>
		<!--<option value=3 <php if($row['service']==3) echo 'selected' ?>>Jilid</option-->
		<option value=4 <?php if($row['service']==4) echo 'selected' ?>>Install</option>
		<option value=5 <?php if($row['service']==5) echo 'selected' ?>>Update</option>
		<option value=6 <?php if($row['service']==6) echo 'selected' ?>>Maintenance</option>
		<option value=7 <?php if($row['service']==7) echo 'selected' ?>>Repair</option>
		<option value=8 <?php if($row['service']==8) echo 'selected' ?>>Part replacement</option>
		<option value=10 <?php if($row['service']==10) echo 'selected' ?>>Other</option>
		</select>
		<br>
		<label id="hLabel">Fee: </label>
		<input type="number" name="fee" value="<?= $row['fee']?>" cols="10" step="1000" min="0">
		<br>
		<label>Notes: </label>
		<input type="text" name="notes" value="<?= $row['notes']?>" cols="50" rows="5">
		<br>
		<label>Phone: </label>
		<input type="number" name="phone" value="<?= $row['phone']?>" cols="50" rows="5">
		<br>
		<label>Officer: </label> 
		<input value="<?= $dsn['id']?>" disabled>
		<!--select name="employee">
		<option value=0>-</option>
		<option value=1 <php if($row['employee']==1) echo 'selected'?>>Chris</option>
		<option value=2 <php if($row['employee']==2) echo 'selected'?>>Ali</option>
		<option value=3 <php if($row['employee']==3) echo 'selected'?>>Anes</option>
		<option value=4 <php if($row['employee']==4) echo 'selected'?>>Indah</option>
		<option value=5 <php if($row['employee']==5) echo 'selected'?>>Vina</option>
		<option value=6 <php if($row['employee']==6) echo 'selected'?>>Ruslan</option>
		<option value=7 <php if($row['employee']==7) echo 'selected'?>>Ansori</option>
		<option value=8 <php if($row['employee']==8) echo 'selected'?>>Aisah</option>
		<option value=9 <php if($row['employee']==9) echo 'selected'?>>Hidayat</option>
		</select-->
		<br>
		<label>Paid: </label>
		<input type="radio" name="ispaid" value="0" <?php if ($row['ispaid'] == 0) echo 'checked' ?>>No
		<br><label>&nbsp; </label>
		<input type="radio" name="ispaid" value="1" <?php if ($row['ispaid'] == 1) echo 'checked' ?>>Yes
		<br>
		<label>Taken: </label>
		<input type="radio" name="istaken" value="0" <?php if ($row['istaken'] == 0) echo 'checked' ?>>No
		<br><label>&nbsp; </label>
		<input type="radio" name="istaken" value="1" <?php if ($row['istaken'] == 1) echo 'checked' ?>>Yes
		<br>
		<label>&nbsp; </label>
		<input type="submit" class="button"  value="Submit" onClick="submitAction('frontdeskU.php')">
		<input type="submit" class="button"  value="Print" onClick="submitAction('frontdeskReprint.php')">
		
	</form>
</body>
</html>