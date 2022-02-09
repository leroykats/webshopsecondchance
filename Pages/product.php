<?php
include_once "Config/config.php";
include "Config/functions.php";

$ticket = getOrderInformation($conn, $_GET['id']);


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
