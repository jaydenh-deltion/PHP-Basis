<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>inlog</title>

   <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div></div>
  <form method="post">
     <input type="text" name="u" placeholder="Username"
    required="required"/>
    <input type="password" name="p"
    placeholder="passworld" required="required"/>
    <button type="submit" class=""> login</button> 
      </form>
    </div>
    <?php

if($_POST['name']=='jadyen' and $_POST['password']== '1234 '){
  header('location: toegang.php');
} else {
  header('location: geen_toegang.php');
}



?>
</body>
</html>