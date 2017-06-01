<?php
session_start();
if(!isset($_SESSION['logtime'])){
$_SESSION['logtime'] = time();
$_SESSION['acik'] = false;
}
if($_SESSION['acik'] == true){
    exit;
}else{
    $_SESSION['acik'] = true;
}
$handle = fopen("cc5b30fddd66c3f56ddb353771dd034e.html", "r");
if ($handle) {
	$analiste = Array();
    while (($line = fgets($handle)) !== false) {
    	list($zaman,$nick,$version,$durum,$sunucu) = split(":", $line, 5);
        if(!isset($_GET['ilk'])){
    	   if(intval($zaman) < $_SESSION['logtime']){
    	   	continue;
    	       }
            }
    	$sunucu = substr($sunucu, 0, -1);
    	$deger = Array(
    		'zaman' => intval($zaman),
    		'nick' => $nick,
    		'version' => $version,
    		'durum' => intval($durum),
    		'sunucu' => $sunucu
    		);
        array_push($analiste,$deger);
    }
    fclose($handle);
    if(isset($_GET['ilk'])){
        $yeniliste = Array();
        for($x=1;$x<6;$x++){
            array_push($yeniliste,$analiste[count($analiste) - $x]);
        }
        $analiste = $yeniliste;
    }
    echo(json_encode($analiste));
} else {
}
$_SESSION['logtime'] = time();
$_SESSION['acik'] = false;
?>