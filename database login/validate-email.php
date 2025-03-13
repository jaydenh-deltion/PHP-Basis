<?php
// laat de database verbinding uit het bestant en slaat het op als variable $mysqli
$mysqli = require __DIR__ . "/database.php";

$sql = sprintf("SELECT * FROM user
                WHERE email = '%s'",
                $mysqli->real_escape_string($_GET["email"]));
    // deze regel bouwt een sql query op die de gebruikers gegevens ophaalt uit de database.
    //waarvan de emailadres overeenkomt met de email die is doorgegeven door de GET methode .
    // de rela escape string wordt gebruikt om het email adres te beschermen tegen SQL injectie.

$result = $mysqli->query($sql);
//deze regel voert de sql query uit en slaat het op met de variable $result 

$is_available = $result->num_rows === 0;
//deze regel controleert of het email al in gebruik is en door te kijken of resultaten zijn in de sql query.
// als die niet bestaan betekent daat het email nog niet is gebruikt en is kan die worden aangemaakt 

header("Content-Type: application/json");
//deze regel steld de conect type van de uitvoer in op json

echo json_encode(["available" => $is_available]);
//deze regel geeft een json uitvoer met engkel veld: available. als dat waar is is de niet in gebruik.
//en als dat onwaar is dan is het wel in gebruik.

//als de gebruiker een email invoert in het registratie ormulier wordt een GET aanvraag gestuurd.
//die wordt gestuurt naar validate-emal.php met het email als parameter. deze code controleert of het al in gebruik is en geeft een json uitvoer terug. 
//