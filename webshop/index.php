<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>timmer bedrijf: About hout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h2>ons assortiment</h2>

    <form action="" method="post">
             <h3> berkenhout</h3>
         <img src="img/berken hout.jpeg" alt=" berken hout ">
       <input type="radio" name="berkenhout" name="berkenhout" value="berkenhout €10,99 per m2"> berkenhout €10,99 per m2
   
            <h3>walnoot hout</h3>
        <img src="img/walnoot hout.jpeg" alt="waloothout">
    <input type="radio" name="walnoot hout" name="walnoot" value="walnoot hout €14,99 per m2"> walnoot hout €14,99 per m2 

            <h3>eikenhout</h3>
        <img src="img/eikenhout.jpeg" alt="eikenhout">
    <input type="radio" name="eikenhout" name="eikenhout " value="eikenhout €12,99 per m2"> eikenhout €12,99 per m2 
   
             <h4>rechthoekige tafel</h4>
         <input type="radio" name="rechthoekige tafel" name="tafel rechthoek">
     <h4>breedte in mm is: </h4> <input type="number" name="breedte" >
   <h4>lengte in mm is:</h><input type="number" name="lengte"> <br>

<h4>rondetafel</h4><br>
    <input type="radio" name="rondetafel" name="tafel rond">
        <h4> diamater in mm</h4>
        <input type="number" name="diameter" >
        <br>

        <button type="button" onclick="location.href='winkelmandje.php'">bestel en ga naar mandje
</form>

</body>
</html>

<?php

session_start();

if ($_SERVER['REQUEST_METHOD']== "POST"){
    $berkenhout = $_POST['berkenhout'];
}


?>