<?php
session_start();


if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['name'];
    $password = $_POST['password'];


{ $gebruikers = array(
    array('name'=> 'jan', 'password' => '0000'),
    array('name' => 'peter', 'password' => '5678'),
    array('name' => 'hans', 'password' => '9012'),
    array('name' => 'klaasjan', 'password' => '1111'),
    array('name' => 'admin', 'password' => '1234'),
);

foreach($gebruikers as $gebruiker){
    if($gebruiker['name'] === $username && $gebruiker['password'] === $password){ 
         echo "ingelogd" . $username;
         $_SESSION['is_ingelogd'] = 'ingelogt';
    }
  }
    if(empty($_SESSION['is_ingelogd'])){
        header('location: geen_toegang.php');
    }
}
}
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
