<?php
$host = getenv('MYSQLHOST') ?: 'localhost';
$port = getenv('MYSQLPORT') ?: '3306';
$user = getenv('MYSQLUSER') ?: 'root';
$pass = getenv('MYSQLPASSWORD') ?: '';
$dbname = getenv('MYSQLDATABASE') ?: 'railway';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Silent fail in production or log to file, don't expose error to user
    // die("Connection failed: " . $e->getMessage());
    $pdo = null;
}

function upsertLog($pdo, $ip, $userAgent, $data)
{
    if (!$pdo)
        return;

    // Try to find an existing active session for this IP within the last hour
    $stmt = $pdo->prepare("SELECT id, details FROM logs WHERE ip_address = ? AND created_at > (NOW() - INTERVAL 1 HOUR) ORDER BY id DESC LIMIT 1");
    $stmt->execute([$ip]);
    $row = $stmt->fetch();

    if ($row) {
        // Update existing record
        $newDetails = array_merge(json_decode($row['details'], true) ?: [], $data);
        $update = $pdo->prepare("UPDATE logs SET details = ?, updated_at = NOW() WHERE id = ?");
        $update->execute([json_encode($newDetails), $row['id']]);
        return $row['id'];
    } else {
        // Insert new record
        $insert = $pdo->prepare("INSERT INTO logs (ip_address, user_agent, details, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
        $insert->execute([$ip, $userAgent, json_encode($data)]);
        return $pdo->lastInsertId();
    }
}
?>