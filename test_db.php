<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<h1>Database Connection Test</h1>";

// 1. Check Environment Variables
echo "<h2>1. Environment Variables</h2>";
$host = getenv('MYSQLHOST');
$port = getenv('MYSQLPORT');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$dbname = getenv('MYSQLDATABASE');

echo "<ul>";
echo "<li><strong>MYSQLHOST:</strong> " . ($host ? htmlspecialchars($host) : "<span style='color:red'>Not Set</span>") . "</li>";
echo "<li><strong>MYSQLPORT:</strong> " . ($port ? htmlspecialchars($port) : "<span style='color:red'>Not Set (Default 3306)</span>") . "</li>";
echo "<li><strong>MYSQLUSER:</strong> " . ($user ? htmlspecialchars($user) : "<span style='color:red'>Not Set</span>") . "</li>";
echo "<li><strong>MYSQLPASSWORD:</strong> " . ($pass ? "Provide (Hidden)" : "<span style='color:red'>Not Set</span>") . "</li>";
echo "<li><strong>MYSQLDATABASE:</strong> " . ($dbname ? htmlspecialchars($dbname) : "<span style='color:red'>Not Set</span>") . "</li>";
echo "</ul>";

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
