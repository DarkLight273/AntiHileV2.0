<?php
session_start();
 # ---------------------------------------------------------------------- URL
$link = new stdClass();
$link->domain = "http://Anti-Hile.eu5.org/panel";
$link->login = $link->domain . "/index.php";
$link->Error = $link->domain . "/Hata.php";
$link->genel = $link->domain . "/Genel.php";
$link->bilgilerim = $link->domain . "/Bilgilerim.php";
$link->log = $link->domain ."/Rapor.php";
$link->cikisyap = $link->domain . "/Cikisyap.php";
 # ---------------------------------------------------------------------- URL
 # ---------------------------------------------------------------------- Session Api
function SessionTanimla(){
	$_SESSION['giris'] = true;
	$_SESSION['kisisel'] = Array(
		'Musteri' => "Kemal Tuan Özel",
		'Sunucu_ISIM' => "Anadolu Network",
		'Sunucu_IP' => "87.98.146.53",
		"Minecraft_Nick" => "kemal895",
		'Sunucu_PORT' => "25565",
		'Sunucu_URL' => "Default",
		'Sunucu_BZ' => 1471737600,
		'Sunucu_SZ' => 1472947200,
		'Durum' => 1);
}
function GirisLazim($link){
	if(!isset($_SESSION['kisisel']) || @$_SESSION['giris'] != true){
		header('Location: ' . $link->domain);
		exit;
	}
}
function CikisLazim($link){
	if(isset($_SESSION['kisisel']) || @$_SESSION['giris'] != false){
		header('Location: ' . $link->genel);
		exit;
	}
}
function SessionYoket(){
	$_SESSION['giris'] = false;
	session_destroy();
}
 # ---------------------------------------------------------------------- Session Api
?>