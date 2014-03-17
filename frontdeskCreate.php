<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ds.dibiakcom.net/jquery/jquery-latest.js"></script>
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/reset.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/font-awesome.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />
	<meta http-equiv="refresh" content="120;url=frontdeskCreate.php" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Frontdesk Create</title>
</head>
<body>
	<form action="frontdeskC.php" enctype="multipart/form-data" method="post">
		<label>Query No: </label> 
		<input type="text" name="query" value="<?php
			require_once 'meekrodb.2.1.class.php';
			$row = DB::queryFirstRow("SELECT query FROM log WHERE DATE(start) = CURDATE() ORDER BY idlog DESC LIMIT 1");
			if ($row['query'] == null){
				echo 1;
			} else {
				echo $row['query']+1;
			}
		?>" readonly>
		<br>
		<label>Customer: </label> 
		<input type="text" name="customer" pattern="[A-Za-z ]*" required>
		<br>
		<label>Product: </label>
		<select name="product">		
		<option value=1>Document</option>
		<option value=2>Desktop</option>
		<option value=3>Laptop</option>
		<option value=4>Monitor</option>
		<option value=5>Printer</option>
		<option value=6>Scanner</option>
		<option value=7>Speaker</option>
		<option value=8>UPS</option>
		<option value=9>Other</option></select>
		<br>
		<!--label>Merek: </label> 
		<input type="text" name="model">
		<br-->
		<label>Service: </label>
		<select name="service">	
		<option value=1>Type & Print</option>
		<!--option value=2>Print</option>
		<option value=3>Jilid</option-->
		<option value=4>Install</option>
		<option value=5>Update</option>
		<option value=6>Maintenance</option>
		<option value=7>Repair</option>
		<option value=8>Part replacement</option></select>
		<br>
		<label>Fee: </label>
		<input type="number" name="fee" cols="10" step="1000" min="0">
		<br>
		<label>Notes: </label>
		<input type="text" name="notes" cols="50" rows="5">
		<br>
		<label>Officer: </label> 
		<select name="employee">
		<option value=null>-</option>
		<option value=1>Chris</option>
		<option value=2>Ali</option>
		<option value=3>Anes</option>
		<option value=4>Indah</option>
		<option value=5>Vina</option>
		<option value=6>Ruslan</option>
		<option value=7>Ansori</option>
		</select>
		<br>
		<label>File: </label> 
		<input type="file" name="file">
		<br>
		<label>&nbsp; </label><input id="submit" class="button" name="submit" type="submit" value="Submit">
	</form>
	<li id="bottom">
	<a href=frontdeskRead.php><i class="icon-list icon-4x"></i></a>	
	
	</li>
</body>
</html>
