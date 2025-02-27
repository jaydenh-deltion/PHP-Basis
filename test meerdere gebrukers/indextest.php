<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inlog</title>
</head>
<body>
  <form method="POST" action="toegang.php">
    <label for="name">Gebruikersnaam:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="password">Wachtwoord:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Inloggen">
  </form>
  <form method="POST" action="toegang.php">
    <label for="registreernaam">Gebruikersnaam:</label>
    <input type="text" id="registreernaam" name="registreernaam"><br><br>
    <label for="registreerwachtwoord">Wachtwoord:</label>
    <input type="password" id="registreerwachtwoord" name="registreerwachtwoord"><br><br>
    <input type="submit" name="registreer" value="Registreer">
  </form>


<?php
session_start();

// Database-verbinding
$servername = "localhost";
$username = "gebruikersnaam";
$password = "wachtwoord";
$dbname = "databasenaam";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check verbinding
if ($conn->connect_error) {
  die("Verbinding mislukt: " . $conn->connect_error);
}

// Gebruikersgegevens ophalen
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $naam = $_POST['name'];
  $wachtwoord = $_POST['password'];

  // Gebruiker opzoeken in database
  $sql = "SELECT * FROM gebruikers WHERE naam = '$naam' AND wachtwoord = '$wachtwoord'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Gebruiker gevonden, start sessie
    $_SESSION['gebruiker'] = $naam;
    header('Location: dashboard.php');
    exit;
  } else {
    // Gebruiker niet gevonden, foutmelding
    echo "Gebruikersnaam of wachtwoord incorrect";
  }
}

// Gebruiker aanmaken
if (isset($_POST['registreer'])) {
  $naam = $_POST['registreernaam'];
  $wachtwoord = $_POST['registreerwachtwoord'];

  // Gebruiker toevoegen aan database
  $sql = "INSERT INTO gebruikers (naam, wachtwoord) VALUES ('$naam', '$wachtwoord')";
  $conn->query($sql);

  echo "Gebruiker aangemaakt";
}

$conn->close();
?>
</body>
</html>