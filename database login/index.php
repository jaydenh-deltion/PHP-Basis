<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
                WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>home</h1>

    <?php if (isset($user)): ?>

    <p>hello <?= htmlspecialchars($user["name"]) ?></p>

    <p><a href="logout.php"> log out</a></p>

    <?php else: ?>

    <p><a href="login.php"> login</a> or <a href="registratie.html"> sign up </a></p>

<?php endif; ?>

</body>
</html>