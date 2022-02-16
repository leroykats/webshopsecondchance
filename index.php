<?php
session_start();
include_once("Config/config.php");
include_once("Config/functions.php");
$producten = getProductInformation($conn);
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
        <h1> Welkom <?php echo($_SESSION["naam"])?> </h1>
        
        <hr>
        <div class="categories">
            <b>Please select one of the following categories: </b> <p></p>
            <ul>
                <a href="index.php">Phones</a> -
                <a href="">Computers</a> -
                <a href="">Components</a> -
                <a href="">Smart Watches</a> -
                <a href="">Smart Home</a>
            </ul>
        </div>
        <div class="images">
  
            <div class="imgbox">
                <?php
               echo "<img src='".$producten['File']."' alt='".$producten['Titel']."'><h2>".$producten['Desc']."</h2><p><strong>€ ".$producten['Prijs']."</strong></p>";
                ?>
               </div>

      </div>
    </main>
    <footer>
  
    </footer>
</body>
</html>