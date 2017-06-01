<?php
require_once 'ayar.php';
require_once 'Client_Islemler.php';
if (isset ($_POST ['islem'])) {
    switch ($_POST ['islem']) {
        case "yeni" :
            if (isset ($_POST ['data']) && isset ($_POST['Sira']) && isset($_POST['GuvenlikKodu'])) {
                    $session = new ClientSession ($_SERVER ['REMOTE_ADDR'], $mysql);
                    $session->SifreliYeniClient($_POST['Sira'], $_POST['GuvenlikKodu'], rawurldecode($_POST['data']));
            } // $username, $package, $version, $md5, $sunucuip, $sunucuport
            break;
    }
}
?>
