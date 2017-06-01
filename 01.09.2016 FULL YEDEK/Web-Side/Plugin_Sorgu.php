<?php
/*
 *
 */
require_once 'ayar.php';
require_once 'Plugin_Islemler.php';
if (isset ( $_POST ['islem'] ) && isset ( $_POST ['lisans'] )) {
	switch (SpeacialDeCrypt ( $_POST ['islem'] )) {
		case "lisanskontrol" :
			$sorgu = new PluginSession ( $_SERVER ['REMOTE_ADDR'], $_POST ['lisans'], $mysql, $Anti_Hile_Default );
			$sorgu->LisansBilgi ();
			break;
		case "client" :
			if (isset ( $_POST ['PlayerName'] ) && isset ( $_POST ['PlayerIP'] )) {
				$sorgu = new PluginSession ( $_SERVER ['REMOTE_ADDR'], $_POST ['lisans'], $mysql, $Anti_Hile_Default );
				$sorgu->Client ( $_POST ['PlayerName'], $_POST ['PlayerIP'] );
			}
			break;
		default :
			
			break;
	}
}
?>
<form METHOD="POST">
	<input type="text" name="islem"> <input type="text" name="lisans"> <input
		type="text" name="PlayerName"> <input type="text" name="PlayerIP"> <input
		type="submit">
</form>
