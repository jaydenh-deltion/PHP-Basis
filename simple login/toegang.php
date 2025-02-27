<?php
session_start();
if(!isset($_SESSION['is_ingelogd'])) {
    header ('location: index.php');
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['name'])&& isset($_POST['password'])){

        if($_POST['name']=='admin' and $_POST['password']== '1234 '){
          $_SESSION['is_ingelogd']= true;
          header('location: toegang.php');
        } else {
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
</head>
<body>
    <H1>Welkom op de toegang-pagina</H1>

    <form method="post"  action="index.php">
<input type="submit" name="log out">
    </form>

</body>
</html>
