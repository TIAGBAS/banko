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

    // Grouping strictly by IP Address, but displaying helpful title
    foreach ($allLogs as $log) {
        $details = json_decode($log['details'], true) ?: [];
        // Unique key per DB row (which is already per-IP-session)
        $key = $log['ip_address'];

        // Construct a display title: "IP | Username"
        $username = isset($details['username']) ? $details['username'] : (isset($details['user']) ? $details['user'] : '');
        $displayTitle = $log['ip_address'];
        if ($username) {
            $displayTitle .= " | " . $username;
        }

        if (!isset($logs[$key])) {
            $logs[$key] = [
                'title' => $displayTitle,
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
                                <i class="fas fa-network-wired"></i> <?php echo htmlspecialchars($group['title']); ?>
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
                        <p><strong>User Agent:</strong>
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
