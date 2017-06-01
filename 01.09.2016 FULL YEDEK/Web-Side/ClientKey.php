<?php
include 'ayar.php';
include 'berti.php';
class ClientKey{
	private $SiraNo;
	private $Key;
	private $GuvenlikKodu;
	private $db;
	function __construct(){
		global $db;
		$this->db = $db;
	}
	private function Uret(){
		$this->Key = BertiYontemi::random(2);
		$this->GuvenlikKodu = $this->random(5);
	}
	private function KeyKaydet(){
		global $db;
		do{
			$this->Uret();
			$sorgu = $db->prepare("SELECT * FROM clientanahtar WHERE Anahtar= ?");
			$sorgu->execute(array($this->Key));
		}while($sorgu->rowCount() == 1);
		$sorgu = $db->prepare("INSERT INTO `clientanahtar`(`Anahtar`, `GuvenlikKodu`) VALUES (?,?)");
		$sorgu->execute(array($this->Key,$this->GuvenlikKodu));
	}
	public function KeyUret(){
		$this->KeyKaydet();
        $sorgu = $this->db->prepare("SELECT * from clientanahtar WHERE Anahtar= ? AND GuvenlikKodu= ?");
        $sorgu->execute(Array($this->Key,$this->GuvenlikKodu));
        foreach ($sorgu as $row){
            return Array(
                'Hata' => false,
                'Sira' => intval($row['Sira']),
                'Anahtar' => intval($row['Anahtar']),
                'GuvenlikKodu' => $row['GuvenlikKodu']
            );
        }
	}
	public function KeyCek($Sira,$Guvenlik){
	    $sorgu = $this->db->prepare("SELECT * from clientanahtar WHERE Sira= ? AND GuvenlikKodu= ?");
        $sorgu->execute(Array($Sira,$Guvenlik));
        if($sorgu->rowCount() == 1){
            foreach($sorgu as $row){
                return $row['Anahtar'];
            }
        }else{
            return false;
        }
	}
	public function KeySil($Anahtar){
	    $sorgu = $this->db->prepare("DELETE FROM `clientanahtar` WHERE Anahtar= ?");
        $sorgu->execute(Array($Anahtar));
    }
	private function random($num) {
	$alfabe = "1234567890asdfghjklizxcvbnnmQWERTYUIOPASDFGHJKLZXCVBNM";
	$alfabe = str_split ( $alfabe );
	$string = "";
	for($x = 0; $num > $x; $x ++) {
		$string = $string . $alfabe [rand ( 0, count ( $alfabe ) - 1 )];
	}
	return $string;
}
}
?>