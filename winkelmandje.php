<?php
session_start();
include_once ("Config/config.php");
include_once ("Config/functions.php");
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
    $inhoud = $_SESSION['mandje'];
    foreach ($inhoud as $p){
        echo $p;
        echo "<br>";
    }
    ?>


</main>
<footer>

</footer>
</body>
</html>