<?php
	$id =$_POST['id'];
	$query = $_POST['query'];
	$customer = $_POST['customer'];
	$product = $_POST['product'];
	$service = $_POST['service'];
	$fee = $_POST['fee'];	
	$notes = $_POST['notes'];
	$phone = $_POST['phone'];
	$employee = $_POST['employee'];
	$ispaid = $_POST['ispaid'];
	$istaken = $_POST['istaken'];
	//$date = date('d-M-y');
	require_once 'meekrodb.2.1.class.php';
	
	DB::update('log', array(
		'query' => $query,
		'customer' => $customer,
		'product' => $product,
		'service' => $service,
		'fee' => $fee,
		'notes' => $notes,
		'phone' => $phone,
		'employee' => $employee,
		'ispaid' => $ispaid,
		'istaken' => $istaken
	),'idlog=%i', $id);

?>

<html>
<head>
<title>Frontdesk Update</title>
<meta http-equiv="refresh" content="0;url=frontdeskRead.php" />
</head>
<body>
<a href="frontdeskRead.php">Updating...</a>
</body>
</html>