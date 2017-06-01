<?php
include 'sifreleme.php';
class PluginSession {
	private $IP;
	private $Uniqeid;
	private $db;
	private $sunucu;
	private $default;
	function __construct($IP, $Uniqueid, $mysql, $DefaultAyarlar) {
		$this->default = $DefaultAyarlar;
		$this->IP = $IP;
		$this->Uniqeid = $Uniqueid;
		$this->sunucu = new stdClass ();
		$this->db = new PDO ( 'mysql:host=' . $mysql->host . ';port=' . $mysql->port . ';dbname=' . $mysql->database . ';charset=utf8;"', $mysql->user, $mysql->password );
		$this->Lisans ();
	}
	private Function Lisans() {
		$sorgu = $this->db->prepare ( "SELECT * FROM lisanslar WHERE LISANS= ?" );
		$sorgu->execute ( array (
				$this->Uniqeid 
		) );
		if ($sorgu->rowCount () != 1) {
			$this->HataUret ( "Lisans Sisteme Kayitli Degil", true );
		}
		foreach ( $sorgu as $row ) {
			if ($row ['URL'] == null) {
				$this->sunucu->URL = $this->default->URL;
			} else {
				$this->sunucu->URL = $row ['URL'];
			}
			if ($row ['Aktif'] == 0) {
				$this->HataUret ( "Lisans Aktif Degil", true );
			}
			if ($row ['Aktif'] == 2) {
				$this->HataUret ( "Lisans Askiya Alinmis", true );
			}
			if ($row ['SUNUCU_IP'] != $this->IP) {
				$this->HataUret ( "Yetkisiz Plugin", true );
			}
			if ($row ['SON_ZAMAN'] < time ()) {
				$this->HataUret ( "Lisans Suresi Dolmus", true );
			}
			$this->sunucu->Aktif = $row ['Aktif'];
			$this->sunucu->Lisans = $row ['LISANS'];
			$this->sunucu->Musteri = $row ['MUSTERI'];
			$this->sunucu->Sunucu_IP = $row ['SUNUCU_IP'];
			$this->sunucu->Sunucu_PORT = $row ['SUNUCU_PORT'];
			$this->sunucu->Sunucu = $row ['SUNUCU_ISMI'];
			$this->sunucu->BAS_ZAMAN = $row ['BAS_ZAMAN'];
			$this->sunucu->SON_ZAMAN = $row ['SON_ZAMAN'];
		}
	}
	private Function HataUret($hatamesaji, $devredisi) {
		$arr = array (
				'Hata' => true,
				'Critical_Error' => $devredisi,
				'Mesaj' => $hatamesaji 
		);
		jsoncikti ( $arr );
		exit ();
	}
	public function LisansBilgi() {
		$mesaj = array (
				'Hata' => false,
				'Musteri' => $this->sunucu->Musteri,
				'SUNUCU' => $this->sunucu->Sunucu,
				'START_TIME' => $this->sunucu->BAS_ZAMAN,
				'Uygulama_URL' => $this->sunucu->URL,
				'END_TIME' => $this->sunucu->SON_ZAMAN 
		);
		jsoncikti ( $mesaj );
		exit ();
	}
	public function Client($username, $clientip) {
		$sorgu = $this->db->prepare ( "SELECT * FROM client WHERE MC_USERNAME= ? AND CLIENT_IP= ? AND SUNUCU_IP=? AND SUNUCU_PORT=?" );
		$sorgu->execute ( array (
				$username,
				$clientip,
				$this->sunucu->Sunucu_IP,
				$this->sunucu->Sunucu_PORT 
		) );
		if ($sorgu->rowCount () != 1) {
			$this->HataUret ( "Bulunamadi", false );
		}
		foreach ( $sorgu as $row ) {
			if ($row ['TIMESTAMP'] < time () - 15) {
				$sorgu = $this->db->prepare ( "DELETE FROM client WHERE MC_USERNAME= ? AND CLIENT_IP= ? AND SUNUCU_IP=? AND SUNUCU_PORT=?" );
				$sorgu->execute ( array (
						$username,
						$clientip,
						$this->sunucu->Sunucu_IP,
						$this->sunucu->Sunucu_PORT 
				) );
				$this->HataUret ( "Timeout", false );
			}
			$arr = array (
					'Hata' => false,
					'PlayerName' => $row ['MC_USERNAME'],
					'Client' => $row ['MC_VERSION'],
					'Durum' => ($row ['DURUM'] == 1 ? true : false) 
			);
			$sorgu = $this->db->prepare ( "DELETE FROM client WHERE MC_USERNAME= ? AND CLIENT_IP= ? AND SUNUCU_IP=? AND SUNUCU_PORT=?" );
			$sorgu->execute ( array (
					$username,
					$clientip,
					$this->sunucu->Sunucu_IP,
					$this->sunucu->Sunucu_PORT 
			) );
			jsoncikti ( $arr );
			exit ();
		}
	}
}