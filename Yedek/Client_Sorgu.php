<?php
require_once 'ayar.php';
require_once 'Client_Islemler.php';
if (isset ( $_POST ['islem'] )) {
	switch ($_POST ['islem']) {
		case yeni :
			if (isset ( $_POST ['data'] )) {
				$arr = explode ( ":", $_POST ['data'] );
				if (count ( $arr ) == 6) {
					$session = new ClientSession ( $_SERVER ['REMOTE_ADDR'], $mysql );
					$session->YeniClient ( $arr [0], $arr [1], $arr [2], $arr [3], $arr [4], $arr [5] );
				}
			} // $username, $package, $version, $md5, $sunucuip, $sunucuport
			break;
	}
}
?>
<form METHOD="POST">
	<input type="text" name="islem"> <input type="text" name="data"> <input
		type="submit">
</form>
