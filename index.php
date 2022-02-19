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
                <?php
                foreach($producten as $product){
                    echo "<div class='imgbox'>";
                     echo "<a href=\"product.php?id=$product[ProductID]\"><img src='".$product['Afbeelding']."' alt='".$product['Titel']."'><h2>".$product['Titel']."</h2><p><strong>€ ".$product['Prijs']."</strong></p></a>";
                     echo "</div>";
                }
                ?>
              

      </div>
    </main>
    <footer>
  
    </footer>
</body>
</html>