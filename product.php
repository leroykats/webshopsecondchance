<?php
session_start();

include_once ("Config/config.php");
include_once ("Config/functions.php");
$num = $_GET['id'];
$ticket = getOrderInformation($conn, $num);

if(isset($_POST["AddToCart"])){
    array_push($_SESSION['mandje'], $ticket["Titel"]);
    echo "toevoegen gelukt";
    //var_dump($_SESSION['mandje']);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "Pages/head.php"?>
</head>
<body>
    <header>
        <?php include "Pages/header.php"?>
    </header>
<main>
    <?php
        echo $ticket["Categorie"];
          echo "<br>";
         echo "<h1>".$ticket["Titel"]."</h1>";
         echo "<br>";
         echo "<p>".$ticket["Desc"]."</p>";
         echo "<br>";
         echo "<h3> &euro; ".$ticket["Prijs"]."</h3>";
         echo "<br>";
         echo $ticket["File"];
    ?>
    <form method="post">
        <input type="submit" name="AddToCart" value="Toevoegen aan winkelwagen">
    </form>

</main>
<footer>

</footer>
</body>
</html>
