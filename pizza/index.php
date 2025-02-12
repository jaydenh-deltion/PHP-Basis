<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>circulare delicioso</title>
</head>
<body>
    <h2>circulare delicioso</h2>
    <form action="winkelmandje.php" method="post">
        <h3>Pizza's</h3>

        <label>
        <img src="img/Pizza Tirato.jpeg" alt=" De pizza tirato">
            <input type="checkbox" name="pizza[]" value="Pizza Tirato,10.50"> Pizza Tirato (€ 10,50)
        </label>

        <br>
        <img src="img/Pizza-Seppi.jpg" alt="De Pizza Seppi">
        <br>
        <label>
            <input type="checkbox" name="pizza[]" value="Pizza Seppi,11.50"> Pizza Seppi (€ 11,50)
        </label>
        <br>
            <img src="img/Pizza Spianata Piccante.jpeg" alt=" De pizza Spianata Piccante">
        <label>
            <input type="checkbox" name="pizza[]" value="Pizza Spianata Piccante,12.50"> Pizza Spianata Piccante (€ 12,50)
        </label>
        <br>
        <h3>Extra's</h3>
        <label>
            <input type="checkbox" name="extra[]" value="Ik wil extra olijven bijbestellen,2.50"> Ik wil extra olijven bijbestellen (€ 2,50)
        </label>
        <br>
        <label>
            <input type="checkbox" name="extra[]" value="Ik wil extra kaas bijbestellen,1.50"> Ik wil extra kaas bijbestellen (€ 1,50)
        </label>
        <br>
        <h3>Bezorging</h3>
        <label>
            <input type="checkbox" name="bezorgen" value="Ik wil de pizza laten bezorgen,3.50"> Ik wil de pizza laten bezorgen (€ 3,50)
        </label>
        <br>
        <input type="submit" value="Toevoegen aan winkelmandje">
    </form>

</body>
</html>

<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $pizza = $_POST["pizza"];
    $extra = $_POST["extra"];
    $bezorgen = $_POST["bezorgen"];

    if(!empty($pizza)){
        foreach ($pizza as $p){
            list($name, $prijs) = explode(",", $p);
            $_SESSION['winkelmandje'][] = array('name' => $name, 'prijs' => $prijs);
        }
    }

    if (!empty($extra)){
        foreach ($extra as $e){
            list($name, $prijs) = explode(",", $e);
            $_SESSION['winkelmandje'][] = array('name' => $name, 'prijs' => $prijs);
        }
    }

    if (!empty($bezorgen)){
        list($name, $prijs) = explode(",", $bezorgen);
        $_SESSION['winkelmandje'][] = array('name' => $name, 'prijs' => $prijs);
    }
}
if(isset($_SESSION['winkelmandje'])) {
    echo "Uw winkelmandje:<br>";
    foreach ($_SESSION['winkelmandje'] as $item) {
        echo $item['name'] . ": € " . $item['prijs'] . "<br>";
    }
    echo "<form action='bestellen.php' method='post'><input type='submit' value='Bestellen'></form>";
} else {
    echo "Uw winkelmandje is leeg.";
}
session_start();

if(isset($_SESSION['winkelmandje'])) {
    echo "Bedankt voor uw bestelling!<br>";
    $totaal = 0;
    foreach ($_SESSION['winkelmandje'] as $item) {
        echo "U heeft een " . $item['name'] . " besteld: € " . $item['prijs'] . "<br>";
        $totaal += $item['prijs'];
    }
    if ($totaal > 0) {
        echo "Als de pizzabezorger komt moet u € " . $totaal . " betalen!";
    }
    unset($_SESSION['winkelmandje']);
} else {
    echo "Uw winkelmandje is leeg.";
}
?>
</body>
</html>