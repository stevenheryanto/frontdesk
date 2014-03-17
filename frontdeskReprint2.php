<!DOCTYPE html>
<html width=151 height=265>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Frontdesk</title>
	<style>
		#form { width:265px; height:360px}
		#query { font-size: 4em; text-align:center }
		#title { font-size: 1em; text-align:center; font-family:courier }
		#content { font-size: 1.01em; font-family:courier; font-weight:bold }	
		* { margin:0; padding: 0; list-style-type: none }
		label {
			width: 110px;
			display: block;
			float: left;
			text-align: right;
		}
	</style>
</head>
<body> 
<?php
	function chkymd($ymd){
		if(!is_dir($ymd)){
			mkdir($ymd);
		}
		chdir($ymd);
	}
	
	$query = $_POST['query'];
	$customer = $_POST['customer'];
	$product = $_POST['product'];	
	$service = $_POST['service'];
	$fee = $_POST['fee'];	
	$notes = $_POST['notes'];
	$employee = $_POST['employee'];	
?>
<script>
	function printpage(){
		document.getElementById("hButton").style.display="none";
		var rFee = document.myForm.hfee.value;
		if ((rFee == 0) || (rFee == null)){
			document.getElementById("hLabel").style.display="none";
		}
		window.print();
		document.getElementById("hButton").style.display="block";
		if ((rFee == 0) || (rFee == null)){
			document.getElementById("hLabel").style.display="block";
		}
		window.location.href = 'http://frontdesk.s.dibiak.net/frontdeskCreate.php';
	}
</script>
	<form id="form" name="myForm">
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
					echo "ISP";
					break;
				case 10:
					echo "Other";
					break;
			}				
		?>
		<br>
		<label>Service: </label>
		<?php
			switch ($service){
				case 1:
					echo "Type & Print";
					break;
				case 2:
					echo "Scan & Email";
					break;
				/*case 3:
					echo "Jilid";
					break;
					*/
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
				case 10:
					echo "Other";	
					break;
			}
		?>
		<br>
		<label id="hLabel">Fee: </label><?php echo number_format($fee,0) ?>
		<input id="hFee" type="hidden" name="hfee" value="<?= $fee ?>" readonly>
		<br>
		<label>Notes: </label>
		<?= $notes ?>
		<br>
		<label>Officer: </label>
		<?= $employee ?>
		</div><br>
	</form>
	<input type="button" id="hButton" value="Print" onclick="printpage()">
</body>
</html>