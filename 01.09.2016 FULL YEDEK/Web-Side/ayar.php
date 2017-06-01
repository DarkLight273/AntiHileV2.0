<?php
$version = "0.4";
#http://s9.dosya.tc/server/bpdo5n/AntiHilePublic.jar&48296113
$Anti_Hile_Default = new stdClass();
$Anti_Hile_Default->URL = "http://s9.dosya.tc/server/bpdo5n/AntiHilePublic.jar.html";
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