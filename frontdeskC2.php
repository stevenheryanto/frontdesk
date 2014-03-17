<!DOCTYPE html>
<html width=151 height=265>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Frontdesk</title>
	<style>
		#form { width:265px; height:360px}
		#query { font-size: 4em; text-align:center }
		#title { font-size: 1em; text-align:center; font-family:courier }
		#content { font-size:1em; font-family:courier }	
		* { margin:0; padding: 0; list-style-type: none }
		label {
			width: 100px;
			display: block;
			float: left;
			text-align: right;
		}
	</style>
</head>
<body> 
<?php
	$query = $_POST['query'];
	$customer = $_POST['customer'];
	$product = $_POST['product'];	
	$service = $_POST['service'];
	$fee = $_POST['fee'];	
	$notes = $_POST['notes'];
	$employee = $_POST['employee'];	
	$date = date('d-M-y');
	require_once 'meekrodb.2.1.class.php';
	
	DB::insert('log', array(
		'query' => $query,
		'customer' => $customer,
		'product' => $product,
		'service' => $service,
		'fee' => $fee,
		'notes' => $notes,
		'employee' => $employee
	));
?>
<script>
	function printpage(){
		document.getElementById("hButton").style.display="none";
		window.print();
		document.getElementById("hButton").style.display="block";
		window.location.href = 'http://frontdesk.s.dibiak.net/frontdeskCreate.php';
		//window.opener.location.href='http://frontdesk.s.dibiak.net/frontdeskRead2.php';
		//window.history.back();
	}
</script>
	<form id="form">
		<div id="query"><?= $query ?></div>
		<div id="title">PT. DIMENSI INFOTEK BIAKCOM</div>
		<div id="content">
		<br>
		<label><?= $date ?> </label>
		<br>
		<label>Customer: </label> 
		<?= $customer ?>
		<br>
		<label>Product: </label>
		<?php
			switch ($product){
				case 1:
					echo "Document";
					break;
				case 2:
					echo "Desktop";
					break;
				case 3:
					echo "Laptop";
					break;
				case 4:
					echo "Monitor";	
					break;
				case 5:
					echo "Printer";
					break;
				case 6:
					echo "Scanner";
					break;
				case 7:
					echo "Speaker";
					break;
				case 8:
					echo "UPS";
					break;
				case 9:
					echo "Other";
					break;
			}				
		?>
		<br>
		<label>Service: </label>
		<?php
			switch ($service){
				case 1:
					echo "Type";
					break;
				case 2:
					echo "Print";
					break;
				case 3:
					echo "Jilid";
					break;
				case 4:
					echo "Install";	
					break;
				case 5:
					echo "Update";
					break;
				case 6:
					echo "Maintenance";
					break;
				case 7:
					echo "Repair";
					break;
				case 8:
					echo "Part replacement";	
					break;
			}
		?>
		<br>
		<label>Fee: </label>
		<?= $fee ?>
		<br>
		<label>Notes: </label>
		<?= $notes ?>
		<br>
		<label>Officer: </label>
		<?php
			switch ($employee){
				case 1:
					echo "Chris";
					break;
				case 2:
					echo "Ali";
					break;
				case 3:
					echo "Anes";
					break;
				case 4:
					echo "Indah";
					break;
				case 5:
					echo "Vina";
					break;
				case 6:
					echo "Ruslan";
					break;
				case 7:
					echo "Ansori";
					break;
			} 
		?>
		</div><br>
	</form>
	<input type="button" id="hButton" value="Print" onclick="printpage()">
</body>
</html>