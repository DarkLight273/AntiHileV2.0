<?php
include 'ClientKey.php';
include 'sifreleme.php';
$KeySorgu = new ClientKey();
$Key = $KeySorgu->KeyUret();
echo jsoncikti($Key);
?>