<?php
$version = "0.2";
#http://s2.dosya.tc/server2/xby6ou/AntiHilePublic.jar&249697
$Anti_Hile_Default = new stdClass();
$Anti_Hile_Default->URL = "http://s2.dosya.tc/server2/xby6ou/AntiHilePublic.jar.html";
$mysql = new stdClass();
$mysql->host = "localhost";
$mysql->port = 3306;
$mysql->user = "986362";
$mysql->password = "MRBH2727";
$mysql->database = "986362";
try {
$db = new PDO('mysql:host='.$mysql->host.';port='.$mysql->port.';dbname='.$mysql->database.';charset=utf8;"', $mysql->user, $mysql->password);
} catch ( PDOException $e ){
     print $e->getMessage();
     exit();
}
?>