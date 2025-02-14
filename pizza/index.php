<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>circulare delicioso</title>
</head>
<body>
    <h2>circulare delicioso</h2>
    <form action="" method="post">
        <h3>Pizza's</h3>

        <label>
        <img src="img/Pizza Tirato.jpeg" alt=" De pizza tirato">
            <input type="radio" name="pizza" value="Pizza Tirato,10.50"> Pizza Tirato (€ 10,50)
        </label>

        <br>
        <img src="img/Pizza-Seppi.jpg" alt="De Pizza Seppi">
        <br>
        <label>
            <input type="radio" name="pizza" value="Pizza Seppi,11.50"> Pizza Seppi (€ 11,50)
        </label>
        <br>
            <img src="img/Pizza Spianata Piccante.jpeg" alt=" De pizza Spianata Piccante">
        <label>
            <input type="radio" name="pizza" value="Pizza Spianata Piccante,12.50"> Pizza Spianata Piccante (€ 12,50)
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
        <input type="submit" value="bestellen ">
        <br></br>
        <h2> u heeft dit besteld:</h2>
    </form>

</body>
</html>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pizza = $_POST["pizza"];
    $extra = $_POST["extra"];
    $bezorgen = $_POST["bezorgen"];

    list($pizzaNaam, $pizzaPrijs) = explode(",", $pizza);
    list($bezorgenNaam, $bezorgenPrijs) = explode(",", $bezorgen);

    $totaalPrijs = $pizzaPrijs;

    if (!empty($extra)) {
        foreach ($extra as $e) {
            list($extraNaam, $extraPrijs) = explode(",", $e);
            $totaalPrijs += $extraPrijs;
        }
    }

    $totaalPrijs += $bezorgenPrijs;

    echo "Bedankt voor uw bestelling!<br>";
    echo "U heeft een " . $pizzaNaam . " besteld: € " . $pizzaPrijs . "<br>";

    if (!empty($extra)) {
        foreach ($extra as $e) {
            list($extraNaam, $extraPrijs) = explode(",", $e);
            echo "U heeft " . $extraNaam . " besteld: € " . $extraPrijs . "<br>";
        }
    }

    if ($bezorgenPrijs > 0) {
        echo "U wilt de pizza laten bezorgen: € " . $bezorgenPrijs . "<br>";
        echo "Als de pizzabezorger komt moet u € " . $totaalPrijs . " betalen!";
    } else {
        echo "U komt de pizza zelf afhalen<br>";
        echo "U betaalt € " . $totaalPrijs . " aan onze kassa.";
    }
    
}
?>
</body>
</html>