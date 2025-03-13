<?php

session_start();//start of hersteld de sessie 

if (isset($_SESSION["user_id"])) { // controleert of de variable user_id bestaat zo ja dan wordt de if uitgevoerd 
    $mysqli = require __DIR__ . "/database.php"; // haalt de dabse verbinding en slaat de op in mysqli

    $sql = "SELECT * FROM user
                WHERE id = {$_SESSION["user_id"]}";
//deze regel bouwt de SQl query op die de gebruikers gegevens ophalt ui de database die met id overeenkomt met de id van de sessie 
    $result = $mysqli->query($sql);
// deze regel voert de sql query uit en slaat deze op in de variable $result 
    $user = $result->fetch_assoc();
    // deze regel haal de gebruikersgegevens op uit het resultaat van de sql query en slaat het op als variable $user
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
    
    <h1>Home </h1>

    <?php if (isset($user)): // deze regel controleer of de variable user is ingesteld ?>

    <p>Hello, <?= htmlspecialchars($user["name"]) // toont het welkoms bericht met naam  ?><br>Welcome to the home page</p>

    <p><a href="logout.php"> you can log out hear</a></p>

    <?php else: ?>

    <p><a href="login.php"> you can login hear</a> or <a href="registratie.html"> sign up </a></p>

<?php endif; //sluit de if statment ?>

</body>
</html>