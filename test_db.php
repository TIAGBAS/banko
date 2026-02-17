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

// Parse URL if available (same logic as db.php used to test)
$urlToParse = $dbUrl ?: $mysqlUrl;
if ($urlToParse && !$host) {
    $dbOpts = parse_url($urlToParse);
    $host = $dbOpts['host'];
    $port = $dbOpts['port'];
    $user = $dbOpts['user'];
    $pass = $dbOpts['pass'];
    $dbname = ltrim($dbOpts['path'], '/');
    echo "<p><em>Parsed credentials from URL variable.</em></p>";
}

// 2. Test Connection
echo "<h2>2. Connection Attempt</h2>";
if (!$host || !$user || !$dbname) {
    echo "<p style='color:red'>Cannot attempt connection: Missing required environment variables.</p>";
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
    echo "<p style='color:red'><strong>Error:</strong> Could not query 'logs' table. It might not exist.</p>";
    echo "<p>PDO Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<hr><h3>Suggested Action:</h3>";
    echo "<p>Run the SQL from <code>schema.sql</code> to create the table.</p>";
}
?>
