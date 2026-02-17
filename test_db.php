<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<h1>Database Connection Test</h1>";

// 1. Check Environment Variables
echo "<h2>1. Environment Variables</h2>";
$dbUrl = getenv('DATABASE_URL');
$mysqlUrl = getenv('MYSQL_URL');
$host = getenv('MYSQLHOST');
$port = getenv('MYSQLPORT');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$dbname = getenv('MYSQLDATABASE');

echo "<ul>";
echo "<li><strong>DATABASE_URL:</strong> " . ($dbUrl ? "Set (Hidden)" : "<span style='color:red'>Not Set</span>") . "</li>";
echo "<li><strong>MYSQL_URL:</strong> " . ($mysqlUrl ? "Set (Hidden)" : "<span style='color:red'>Not Set</span>") . "</li>";
echo "<li><strong>MYSQLHOST:</strong> " . ($host ? htmlspecialchars($host) : "Not Set") . "</li>";
echo "<li><strong>MYSQLPORT:</strong> " . ($port ? htmlspecialchars($port) : "Not Set") . "</li>";
echo "<li><strong>MYSQLUSER:</strong> " . ($user ? htmlspecialchars($user) : "Not Set") . "</li>";
echo "<li><strong>MYSQLPASSWORD:</strong> " . ($pass ? "Set (Hidden)" : "Not Set") . "</li>";
echo "<li><strong>MYSQLDATABASE:</strong> " . ($dbname ? htmlspecialchars($dbname) : "Not Set") . "</li>";
echo "</ul>";

// Debug: Print ALL available environment keys (names only) to check for typos/alternatives
echo "<h3>Available Environment Keys:</h3>";
$allVars = getenv();
$keys = array_keys($allVars);
sort($keys);
echo "<div style='background:#eee; padding:10px; max-height: 200px; overflow:auto;'>";
foreach ($keys as $key) {
    if (strpos($key, 'MYSQL') !== false || strpos($key, 'DB') !== false || strpos($key, 'URL') !== false) {
        echo "<strong>$key</strong><br>";
    }
}
echo "</div>";

// Parse URL if available (prioritize this if vars are missing)
$urlToParse = $dbUrl ?: $mysqlUrl;
if ($urlToParse) {
    $dbOpts = parse_url($urlToParse);
    // Only override if we successfully parsed
    if (isset($dbOpts['host']))
        $host = $dbOpts['host'];
    if (isset($dbOpts['port']))
        $port = $dbOpts['port'];
    if (isset($dbOpts['user']))
        $user = $dbOpts['user'];
    if (isset($dbOpts['pass']))
        $pass = $dbOpts['pass'];
    if (isset($dbOpts['path']))
        $dbname = ltrim($dbOpts['path'], '/');
    echo "<p><em>Parsed credentials from URL variable.</em></p>";
}

// 2. Test Connection
echo "<h2>2. Connection Attempt</h2>";
if (!$host) {
    echo "<p style='color:red'>Cannot attempt connection: Host not found.</p>";
    exit;
}

try {
    $dsn = "mysql:host=$host;port=" . ($port ?: 3306) . ";dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:green'><strong>Success:</strong> Connected to database '$dbname' at '$host'.</p>";
} catch (PDOException $e) {
    echo "<p style='color:red'><strong>Connection Failed:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    exit;
}

// 3. Check Table
echo "<h2>3. Table Check: 'logs'</h2>";
try {
    $stmt = $pdo->query("SELECT COUNT(*) FROM logs");
    $count = $stmt->fetchColumn();
    echo "<p style='color:green'><strong>Success:</strong> Table 'logs' exists and contains $count records.</p>";
} catch (PDOException $e) {
    echo "<p style='color:orange'><strong>Notice:</strong> Table 'logs' not found (or error query).</p>";
    echo "<p>Attempting to create table...</p>";

    // Auto-create table
    try {
        $sql = "CREATE TABLE IF NOT EXISTS logs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            ip_address VARCHAR(45) NOT NULL,
            user_agent TEXT,
            details JSON,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $pdo->exec($sql);
        echo "<p style='color:green'><strong>Success:</strong> Table 'logs' created successfully!</p>";
    } catch (PDOException $ex) {
        echo "<p style='color:red'><strong>Error:</strong> Failed to create table. " . htmlspecialchars($ex->getMessage()) . "</p>";
    }
}
?>
