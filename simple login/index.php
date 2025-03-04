<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>inlog</title>

<link rel="stylesheet" href="style.css">
</head>
<body>

  <form method="POST" action="toegang.php">
<div>
    Username: <input type="text" name="name">
    </div>
    <div>
    Password: <input type="password" name="password">
    </div>
    <input type="submit"> 

    </form>
    </div>

<?php

session_start();
//start een sessie of hersteld een bestaande sessie.

  

if($_SERVER['REQUEST_METHOD']=='POST'){
  // deze regel controleert of het een POST verzoek is naar de server. zo ja dan gaat die naar if 
  if(!empty($_POST['klopt'])){
    //controleert of het veld klopt in het post verzoek niet leeg is. als het veld niet leeg is word de if uitgevoerd.
    // hier is die if er niet dus hij wordt niet uitgevoerd. 
    session_destroy();
    // deze regel vernietigd de huidige sessie alle gegevens die zijn opgeslagen worden verwijderd. 
  }
}
//ik weet nog niet precies hoe dit werkt de php maar als het er niet in staat werkt het niet meer zoals het hoort.

?>
</body>
</html>

