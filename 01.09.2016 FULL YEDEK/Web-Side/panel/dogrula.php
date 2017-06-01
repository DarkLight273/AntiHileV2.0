<?php
include 'session.php';
CikisLazim($link);
if(isset($_POST['kadi']) && isset($_POST['parola'])){
	SessionTanimla();
	header('Location: ' . $link->genel);
}else{
	header('Location: ' . $link->Error);
}
?>