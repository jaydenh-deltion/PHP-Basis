<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> login </h1>
    <form action="login.php" method="post">
        <label for="username">username:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="login">
    </form>
    


<?php

$servername = "lockalhost";
$username = "gebruikersnaam";
$password = "wachtwoord";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("verbinden is mislukt: " .$conn->connect_error);
}

$naam = $_POST['username'];
$wachtwoord = $_POST['password'];
?>

</body>
</html>