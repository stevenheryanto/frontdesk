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
<?php
	ini_set('error_reporting', E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require_once('php/uni-function.php'); 
require_once('php/uni-db.php'); 
require_once('php/html.php'); 
/*
$US = array(); 
$WL = array();

$res=0;
$x = ""; $x = @$_POST["x"]; if ($x==''){$x=@$_GET["x"]; } //command query string
$q=@$_GET["q"]; // iframe code

if ($x=="logout") { us_delCookies(); html_loginForm(); exit; }


if (isset($_COOKIE[us_COOKIE])) {
	$US = init_us_cookies(); $res=1;
	if ($US[0]=="uni") { $A = get_user($US[1]); if ($US[2] == $A[2]) { $res=2; } } 
}

if ($res < 2) {

	if ($x=="signup") { html_signupForm(); exit; }
	else if ($x=="register") { register($US); }
	else if ($x=="login") { login($_POST['us_u'],$_POST['us_p']); }
	else { html_loginForm(); exit; }

} else {

	if ($q) {
		// must via jquery iframe;
		if($q=="auth") { 
				// cookies only 
				echo "usq:ok"; 
		} else if($q=="auth2") {
				// ip check for administrative func
				// $lock = get_lockIP($uid);
				if ($lock ==  $_SERVER['REMOTE_ADDR']) { echo "usq:ok"; } else { echo "usq:out"; } 
		}
		else if($q=="check") {  if ($_GET['pwd']==$A[2]) { echo "usq:ok"; } }
		else if($q=="pwd")   { echo "usq:".$A[2]; }
		exit;
	}
	
	if ($x=="edit")      { edit($US); us_delCookies(); login($uid,$pwd); }
	else if ($x=="acl")  { ACL($US); us_delCookies(); login($uid,$pwd); }
	else if ($x=="profile") { $A = get_user(us_getCookies(1)); html_profile($A); exit; }
	else { html_landing($US[1]); exit; }

}
*/
?>
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