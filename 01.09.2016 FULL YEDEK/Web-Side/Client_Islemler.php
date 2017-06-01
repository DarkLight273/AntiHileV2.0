<?php
include 'sifreleme.php';
include 'ClientKey.php';
class ClientSession {
	private $default;
	private $ip;
	private $db;
	function __construct($ip,$DefaultAyarlar) {
		$this->default = $DefaultAyarlar;
		$this->ip = $ip;
		$mysql = $this->default;
		$this->db = new PDO ( 'mysql:host=' . $mysql->host . ';port=' . $mysql->port . ';dbname=' . $mysql->database . ';charset=utf8;"', $mysql->user, $mysql->password );
	}
	private function SunucuKontrol($ip, $port) {
		$sorgu = $this->db->prepare ( "SELECT * FROM lisanslar WHERE SUNUCU_IP= ? AND SUNUCU_PORT= ?" );
		$sorgu->execute ( array (
				$ip,
				$port 
		) );
		if ($sorgu->rowCount () == 0) {
			return null;
		} else {
			foreach ($sorgu as $row){
				return $row['LISANS'];
			}
		}
	}
	private function MD5izinlimi($md5,$lisans){
		$sorgu = $this->db->prepare("SELECT `MD5` FROM `MD5Liste` WHERE `Lisans`= ?");
		$sorgu->execute(array(
				$lisans,
		));
		if($sorgu->rowCount() == 0){
			return false;
		}else{
			foreach ($sorgu as $row){
				$md5list = explode(":", $row['MD5']);
				foreach ($md5list as $validatemd5){
					if($validatemd5 == $md5){
						return true;
					}
				}
		}
		return false;
		}
	}
	private Function HataUret($hatamesaji) {
		$arr = array (
				'Hata' => true,
				'Mesaj' => $hatamesaji 
		);
		jsoncikti ( $arr );
		exit ();
	}
	public function SifreliYeniClient($Sira,$GuvenlikKodu,$data){
	    $KeySorgu = new ClientKey();
        $Key = $KeySorgu->KeyCek($Sira,$GuvenlikKodu);
        if(!$Key) {
            $this->HataUret("Site ile Iletisim Sorunu (key)");
        }
        $KeySorgu->KeySil($Key);
        $data = BertiYontemi::decrypt($Key,$data);
        $arr = explode(":",$data);
        if(count($arr) == 6){
            $this->YeniClient($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5]);
        }else{
            $this->HataUret("Gonderdigin Veri Bozuk");
        }
    }
	private function YeniClient($username, $package, $version, $md5, $sunucuip, $sunucuport) {
		$sunuculisans = $this->SunucuKontrol($sunucuip, $sunucuport);
		if($sunuculisans == null){
			$this->HataUret("Baglandigin Sunucu Anti-Hile Kullanmiyor.Eger Bir Yanlislik Oldugunu Dusunuyorsan Lutfen Tekrar Dene.");
		}
		$durum = $this->MD5izinlimi($md5, $sunuculisans);
		$sorgu = $this->db->prepare ( "SELECT * FROM client WHERE CLIENT_IP= ?" );
		$sorgu->execute ( array (
				$this->ip 
		) );
		if ($sorgu->rowCount () >= 1) {
			$sorgu = $this->db->prepare ( "DELETE FROM client WHERE CLIENT_IP= ?" );
			$sorgu->execute ( array (
					$this->ip 
			) );
		}
			$sorgu = $this->db->prepare ( "INSERT INTO `client`(`MC_USERNAME`, `MC_PACKAGE`, `MC_VERSION`, `MC_MD5`, `CLIENT_IP`, `SUNUCU_IP`, `SUNUCU_PORT`, `TIMESTAMP`, `DURUM`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)" );
			$sorgu->execute ( array (
					$username,
					$package,
					$version,
					$md5,
					$this->ip,
					$sunucuip,
					$sunucuport,
					time(),
					$durum
			)
			 );
			$arr = array(
					'Hata' => false,
					'Sunucu' => $sunucuip,
					'Time' => time()
			);
			jsoncikti($arr);
			exit();
	}
	private function oncedenvarmi(){
		return false;
	}
}