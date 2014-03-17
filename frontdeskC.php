<!DOCTYPE html>
<html width=151 height=265>
<head>
	<script src="js/modernizr-latest.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Biakcom</title>
	<style>
		#form { width:265px; height:300px}
		#query { font-size: 4em; text-align:center }
		#title { font-size: 1em; text-align:center }
		#content { font-size:1em; font-family:courier  }		
	</style>
</head>
<body> 
<?php
	$con = mysqli_connect("127.0.0.1:3306","adminfd","adminfd","frontdesk");
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$product = implode(",",$_POST['product']);
	$service = implode(",",$_POST['service']);
	
	$query = $_POST['query'];
	$customer = $_POST['customer'];
	$fee = $_POST['fee'];	
	$notes = $_POST['notes'];	
	$date = date('d-M-y');	
	$insert = mysqli_query($con, "INSERT INTO log(query, customer, employee, product, service, fee, notes) 
	VALUES ('$query', '$customer', '1', '$product', '$service', '$fee','$notes')");
	mysqli_close($con);
	
?>
<script>
	function printpage(){
		document.getElementById("hButton").style.display="none";
		window.print();
		document.getElementById("hButton").style.display="block";
	}
</script>
	<form id="form">
		<div id="query"><?= $query ?></div>
		<div id="title">PT. DIMENSI INFOTEK BIAKCOM</div>
		<div id="content">
		<br>
		<?= $date ?>
		<br>
		<label>Customer Name: </label> 
		<?= $customer ?>
		<br>
		<label>Product: </label>
		<?php
		foreach ($_POST['product'] as $pr){
			switch ($pr){
				case 1:
					echo "Document.";
					break;
				case 2:
					echo "Desktop / Laptop. ";
					break;
				case 3:
					echo "Monitor. ";
					break;
				case 4:
					echo "Printer / Scanner / Copier / Fax. ";	
					break;
				case 5:
					echo "Speaker / Microphone. ";
					break;
				case 6:
					echo "Adaptor / Battery / Charger. ";
					break;
				case 7:
					echo "Power Supply / UPS. ";
					break;
				case 8:
					echo "ISP. ";	
					break;
			}
		}				
		?>
		<br>
		<label>Service: </label>
		<?php
		foreach ($_POST['service'] as $se){
			switch ($se){
				case 1:
					echo "Type. ";
					break;
				case 2:
					echo "Print. ";
					break;
				case 3:
					echo "Jilid. ";
					break;
				case 4:
					echo "Install/repair/update OS. ";	
					break;
				case 5:
					echo "Install/update driver. ";
					break;
				case 6:
					echo "Install/update anti-virus. ";
					break;
				case 7:
					echo "Install application. ";
					break;
				case 8:
					echo "Replace cartridge. ";	
					break;
				case 9:
					echo "Maintenance / repair / part replacement. ";	
					break;
			}				
		}
		?>
		<br>
		<label>Fee: </label>
		<?= $fee ?>
		<br>
		<label>Notes: </label>
		<?= $notes ?>
		</div><br>
	</form>
	<input type="button" id="hButton" value="Thank You" onclick="printpage()">
</body>
</html>