<?php
include_once ("/Users/sarahvogelzang/Sites/localhost/webshopsecondchance/Config/config.php");
include_once ("/Users/sarahvogelzang/Sites/localhost/webshopsecondchance/Config/functions.php");
$num = $_GET['id'];
$ticket = getOrderInformation($conn, $num);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php"?>
</head>
<body>
<header>
    <?php include "header.php"?>
</header>
<main>
    <?php
         echo $ticket["ProductID"];
         echo "<br>";
         echo $ticket["Titel"];
         echo "<br>";
         echo $ticket["Desc"];
         echo "<br>";
         echo $ticket["Categorie"];
         echo "<br>";
         echo $ticket["Prijs"];
         echo "<br>";
         echo $ticket["File"];
  
         echo $ticket["Leeftijd"];

    ?>

</main>
<footer>
    <p>2022 Bings Cars<br>
        <a href="">Send us a direct e-mail!</a>
    </p>
    <ul>
        <li>Monday 13:00 - 18:00</li>
        <li>Tuesday 9:00 - 18:00</li>
        <li>Wednesday 9:00 - 18:00</li>
        <li>Thursday 9:00 - 21:00</li>
        <li>Friday 9:00 - 21:00</li>
        <li>Saterday 9:00 - 17:00</li>
    </ul>
</footer>
</body>
</html>
