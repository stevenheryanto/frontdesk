<?php
/* must SAME in every Universe connected sites
   xdm parameter
*/

define('us_SALT', 'dBCkU53n001'); 		//Max 32 Char
define('us_COOKIE','dsn-universe');
define('us_DOMAIN','dibiakcom.net');
define('us_TVAR',1394090000);

function us_decrypt($text) {
	$text = str_replace("#","a",$text);
	$mid = floor(strlen($text)/2); $a = array(); $A[0] = substr($text,0,$mid); $A[1] = substr($text,$mid,strlen($text)); $text = strrev($A[1].$A[0]);
	return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, us_SALT, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}	

function us_encrypt($text) {
	$A = array(); $a = strrev(trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, us_SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))));
	$mid = floor(strlen($a)/2); $A[1] = substr($a,0,$mid); $A[0] = substr($a,$mid,strlen($a));
	return str_replace("a","#",$A[0].$A[1]);
}

function us_setCookies($msg,$time=0) {
	if ($time == 0) { $time = time()+(60*60)*24*30*12; } //store cookie for one year
	setcookie(us_COOKIE, us_encrypt($msg),$time,'/',us_DOMAIN);
}

function us_delCookies() { us_setCookies("",1); }

function us_getCookies_json($c) {
		$a = us_decrypt(us_decrypt($c)); 
		$A = explode("|",$a);
		// $n = 0 loginame | 1 = role | 2 = xmpp-pass | 3 = junk | 4 = ip
		return array(
			'id'    => $A[0],
			'level' => $A[1],
			'xmppp'   => $A[2],
			'sec' => $A[3],
			'ip'    => $A[4]
		);
}

function us_getCookies($n=-1) {
	if (isset($_COOKIE[us_COOKIE])) { 
		$a = us_decrypt( us_decrypt( $_COOKIE[us_COOKIE]) );
		$A = explode("|",$a);
		// $n = 0 loginame | 1 = role | 2 = xmpp-pass | 3 = junk | 4 = ip
		if ($n > -1) { return $A[$n]; } else { return $A; }
	}
}

?>