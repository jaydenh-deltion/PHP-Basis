<?php

$is_invalid = false;

// controleert of de gebruker heeft geprobeert in te loggen 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    //deze regel maakt de conectie met de database 
    $mysqli = require __DIR__ . "/database.php";
    
    // deze regel zoekt de gebruiker door middel van het ingevulde email adres
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);// deze regel voert de SQL-query uit en slaat het resultaat op in de $result  
    
    $user = $result->fetch_assoc();// de regel controleert of de gebruiker is gevonden als dat zo is komt de if code aan de beurt 
    
    if ($user) {
        
        //deze regel controleet het ingevoerde wachtwoord of die ook klopt met die in de database staat
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();// start een nieuwe sessie 
            
            session_regenerate_id();// de regel regenereert de sessie id om sesie hijacking te voorkomen
            
            $_SESSION["user_id"] = $user["id"];// deze regel slaat de gebruiker id op in de sessie 
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registratie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button> 
        <button type="button" onclick="location.href='registratie.html'">if you don't have a account dont worry sign in hear</button>
</form>
    
</body>
</html>