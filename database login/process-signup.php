<?php
// als er 1 van deze niet is ingevoerd dan krijgt die de die melding 

// regel 1 controleert of het naam veld is ingevuld is zo niet wordt de foutmelding getoond
if(empty($_POST["name"])){
    die("name is required");
}

//deze regel controleert of het email veld geldig is ingevuld is zo niet wordt de foutmelding getoond
if( ! filter_var( $_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("valid email is required");
}

//controleert of het wachtwoord minimaal 8 tekens heeft anders wordt de melding getoond 
if(strlen($_POST["password"]) < 8){
    die("password should be at least 8 characters long");
}

// controleert het wachtwoord minimaal 1 kleine letter bevat anders wordt de melding getoond
if (! preg_match("/[a-z]/i", $_POST["password"])) {
    die("password must contain at least one letter");
}

//controleert of het wachtwoord minimaal 1 cijfer bevat anders wordt de melding getoond
if (! preg_match("/[0-9]/", $_POST["password"])) {
    die("password must contain at least one number");
}

//deze regel controleert of de wachtwoorden het zelfde zijn ter controle er of ze het zelfde zijn wordt de melding getoond
if ($_POST["password"] !== $_POST["password_confirmation"]){
    die("passwords must match");
}

//deze regel hash't het wachtwoord zodat je het wachtwoord niet ziet in de database 
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

//deze regel laat het bastand database.php 
$mysqli = require __DIR__ . "/database.php";

//deze regel definieert een SQL-query die wordt gebruikt om een nieuwe gebruiker toe te voegen
$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";

 //deze regel maakt een nieuwe vraag object aan 
$stmt = $mysqli-> stmt_init();

//controleert of de Query kan worden voorbereid als dat niet kan wordt de foutmelding getoond 
if ( ! $stmt ->prepare($sql)){
    die ("SQL error: " . $mysqli->error);
}

//deze regel bindt de parameters aan de query
$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);
                  
 // deze regel voert de query uit
if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;

    // als de SQL query niet kan worden uitgevoed word dit in gang gezet 
} else {
    
    // controleert of de mail al in gebruik is door de 1062 foutmelding (duplicatie entry fout)
    if ($mysqli->errno === 1062) {
        die("email already taken");

        //geen 1062 dan wordt de error weer gegeven 
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>