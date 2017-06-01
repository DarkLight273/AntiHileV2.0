<?php
function random($num) {
	$alfabe = "1234567890asdfghjklizxcvbnnmQWERTYUIOPASDFGHJKLZXCVBNM";
	$alfabe = str_split ( $alfabe );
	$string = "";
	for($x = 0; $num > $x; $x ++) {
		$string = $string . $alfabe [rand ( 0, count ( $alfabe ) - 1 )];
	}
	return $string;
}
function SpeacialCrypt($Mesaj) {
	try {
		$key = random ( 10 ) . base64_encode ( $Mesaj ) . random ( 10 );
		$key = base64_encode ( $key );
	} catch ( Exception $e ) {
		return "";
	}
	return $key;
}
function SpeacialDeCrypt($Mesaj) {
	try {
		$key = base64_decode ( $Mesaj );
		$key = str_split ( $key );
		$newkey = "";
		for($x = 0; count ( $key ) > $x; $x ++) {
			if ($x > 9 && $x < count ( $key ) - 10)
				$newkey = $newkey . $key [$x];
		}
		$newkey = base64_decode ( $newkey );
	} catch ( Exception $e ) {
		return "";
	}
	return $newkey;
}
function jsoncikti($message) {
	print SpeacialCrypt ( json_encode ( $message ) );
}
?>