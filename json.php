<?php
header('Content-Type: application/json');
require ("/var/www/uni/uni/uni-function.php");
$user = array();
$user = us_getCookies_json(@$_GET['i']);
echo json_encode($user);
exit;
?>