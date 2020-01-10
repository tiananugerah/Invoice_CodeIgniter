<?php
date_default_timezone_set('Asia/Jakarta');
$msisdn = $_GET['no_hp'];
//$msisdn = "081321910880";
$message = "Nsbh Yth, per @dd/@mm/@yy kami belum menerima pembayaran angsuran ke @angsuran Anda PK @kontrak. Mhn segera lakukan pembayaran. Abaikan SMS ini jk sudah bayar. Tks";

//------- API Provider SME
$url = "https://sms.smartme.co.id:43452/smsjson/?username=adminsmsolusi&password=S3lamatP4gi&sender=LONGNUMBER&msisdn=%s&message=%s";
// $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=js4kir&passkey=F@t4yaku77&nohp=%s&pesan=%s";

//-------------------------------------------------------------------------------------------------
// API Provider Zenziva
//$url = "https://reguler.zenziva.net/apps/smsapi.php";
//contoh :
//Perintah:https://reguler.zenziva.net/apps/smsapi.php?userkey=xxx&passkey=xxx&nohp=xxx&pesan=xxx

//Userkey	:	js4kir
//Passkey	:	F@t4yaku77
//--------------------------------------------------------------------------------------------------

$message = str_replace("@dd", date('d'), $message);
$message = str_replace("@mm", date('m'), $message);
$message = str_replace("@yy", date('y'), $message);
$message = str_replace("@angsuran", $_GET['angsuran'], $message);
$message = str_replace("@kontrak", $_GET['no_kontrak'], $message);
$message = urlencode($message);

$url = sprintf($url, $msisdn, $message);

$ch = curl_init();
curl_setopt_array($ch, array(
	CURLOPT_USERAGENT=>"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36",
	CURLOPT_URL=>$url,
	CURLOPT_HEADER=>0,
	CURLOPT_RETURNTRANSFER=>1,
	CURLOPT_DNS_USE_GLOBAL_CACHE=>0,
	CURLOPT_DNS_CACHE_TIMEOUT=>2
));

$body = curl_exec($ch);
if($body === false){
	echo curl_error($ch)."<br>";
}
curl_close($ch);

echo $body;

// echo $url;
// echo $body;
