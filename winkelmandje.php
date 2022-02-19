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
       //print_r ($inhoud);
        $id = intval($p);
       $items =  getCartProductInformation($conn, $id);
       foreach($items as $item){
      // print_r ($items);
        echo"<form method='post'>";
        echo $item['Titel']. "  ----------------------------- &euro;" . $item['Prijs']; 
        echo "<input type='submit' id='verwijder' name='verwijder' value='Verwijder'>";
        echo "</form>";
        echo "<br>";

            if(isset($_POST['verwijder'])){ 
                unset($_SESSION['mandje']);
                //set array opnieuw, anders gaat de sessie kapot en kan je pas weer wat toevoegen nadat je opnieuw inlogt
                $_SESSION['mandje'] = array();
            }
        }
    }
        
    
        
    ?>


</main>
<footer>

</footer>
</body>
</html>