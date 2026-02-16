<?php
session_start();

$password = "HitTheGroundRunning.exe";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['password'] === $password) {
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KVIL Panel</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="login-body">
    <div class="login-container">
        <h2>KVIL Panel Login</h2>
        <?php if (isset($error)) {
            echo "<p class='error'>$error</p>";
        } ?>
        <form method="post">
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>