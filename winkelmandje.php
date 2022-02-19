<?php
session_start();
include_once ("Config/config.php");
include_once ("Config/functions.php");

if(isset($_POST['verwijder'])){
    unset($item);
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
    $inhoud = $_SESSION['mandje'];

    
    //var_dump($inhoud);
    foreach ($inhoud as $p){
       // echo $p;
        $id = intval($p);
       $items =  getCartProductInformation($conn, $id);
       foreach($items as $item)
       //print_r ($item);
        echo"<form method='post'>";
        echo $item['Titel']. "  ----------------------------- &euro;" . $item['Prijs']; 
        echo "<input type='submit' id='verwijder' name='verwijder' value='Verwijder'>";
        echo "</form>";
        echo "<br>";
        };

        
    
        
    ?>


</main>
<footer>

</footer>
</body>
</html>