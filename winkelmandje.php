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

    
    //var_dump($inhoud);
    foreach ($inhoud as $p){
       // echo $p;
        $id = intval($p);
       $items =  getCartProductInformation($conn, $id);
       foreach($items as $item)
       //print_r ($item);
        echo $item['Titel']. "  ___________________________________  " . $item['Prijs'];
        echo "<br>";
        };

        
    
        
    ?>


</main>
<footer>

</footer>
</body>
</html>