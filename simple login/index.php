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

  

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(!empty($_POST['klopt'])){
    session_destroy();
  }
}

?>
</body>
</html>

