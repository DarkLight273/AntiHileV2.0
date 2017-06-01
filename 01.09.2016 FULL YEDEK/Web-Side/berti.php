<?php
Class BertiYontemi{
	public static function decrypt($key , $data){
		$encrypted = base64_decode($data);
		$bytearray = unpack("C*" , $encrypted);
		$string = "";
		foreach($bytearray as $byte){
			$nByte = $byte - $key;
			$string .= chr($nByte);
		}
		return $string;
	}
	public static function encrypt($key , $data){
		$bytearray = unpack("C*",$data);
		$string = "";
		foreach($bytearray as $byte){
			$nByte = $byte + $key;
			$string .= chr($nByte);
		}
		return base64_encode($string);
	}
	public static function random($num) {
		$alfabe = "1234567890";
		$alfabe = str_split ( $alfabe );
		$string = "";
		for($x = 0; $num > $x; $x ++) {
			$string = $string . $alfabe [rand ( 0, count ( $alfabe ) - 1 )];
		}
		return intval($string);
	}
}
?> 