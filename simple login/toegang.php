<?php
session_start();


if($_SERVER['REQUEST_METHOD']=='POST'){
// controleert of het verzoek dat naar de server is gestuurd een POST verzoek is
// als dat zo is wordt de code hier onder uit gevoerd. 
    $username = $_POST['name'];
    $password = $_POST['password'];

// deze regels halen de gebruikersnaam en het wachtwoord op de de POST verzoek
// de gebruikersnaam en wachtwoord worden opgeslgen als variabelen


    $gebruikers = array(
        array('name'=> 'jan', 'password' => hash('sha1', '0000')),
        array('name' => 'peter', 'password' => hash('sha1', '5678')),
        array('name' => 'hans', 'password' => hash('sha1', '9012')),
        array('name' => 'klaasjan', 'password' => hash('sha1', '1111')),
        array('name' => 'admin', 'password' => hash('sha1', '1234')),
    );
    
    foreach($gebruikers as $gebruiker){
        if($gebruiker['name'] === $username && hash('sha1', $password) === $gebruiker['password']){ 
//deze regel controleert of de gebruikersnaam en wachtwoord overeenkomen mer het opgegeven.
// als de combinatie klopt wordt de code hieronder uitgevoerd. 

             echo "ingelogd" . $username;
             $_SESSION['is_ingelogd'] = 'ingelogt';
             // deze regel geeft een bericht dat de gebruiker is ingelogd.
             // de sessie-variable 'is_ingelogd ' wordt ingesteld op ingelogt.
        }
    }

    if(empty($_SESSION['is_ingelogd'])){
        header('location: geen_toegang.php');
        // deze regel controleerd of is_ingelogd is ingesteld.
        // als dat niet zo is wordt je doorgestuurd naar geen_toegang pagina 
    }
}
// heb deze code gemaakt met de uitleg van het filmpje die er stond. ook heeft gert geholpen 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <H1>Welkom op de toegang-pagina</H1>

    <form method="post" action="index.php">
<input type="hidden" value="klopt" name="klopt">
<input type="submit" value="ga terug "> 
    </form>

</body>
</html>
