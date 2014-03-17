<!DOCTYPE html>
<html>
<head>

<meta http-equiv="refresh" content="0;url=frontdeskRead.php" />
<title>Biakcom</title>
<a href="frontdeskRead.php">redirecting...</a>
</head>
<body>
    <header class="main">
        <h1>Frontdesk</h1>
    </header>
    <section class="main">

	<?php 
		$con = mysqli_connect("127.0.0.1:3306","adminfd","adminfd","frontdesk");
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$id = $_GET['id'];		
		$delrow = mysqli_query($con, "DELETE FROM log WHERE idlog='$id'");
		$row = mysqli_fetch_array($delrow);
		
		mysqli_close($con);
	?>
    </section>
</body>
</html>
