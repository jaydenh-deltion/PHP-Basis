<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> u heeft geen toegang ga terug via deze link:</h1>
    <a href="index.php">terug</a>

    <?php
session_start();

if (!isset($_SESSION["ingelogd"])) {
  header("Location: inlog.php");
  exit;
}
?>
</body>
</html>