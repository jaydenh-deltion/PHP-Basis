<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1> Welcome op de Pagina</h1>

    <?php

if (isset($_SESSION["ingelogd"])) {
  echo "U bent ingelogd!";
} else {
  echo "U bent niet ingelogd!";
}
?>
    
</body>
</html>