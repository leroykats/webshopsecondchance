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
    <h1> Winkemandje </h1>
    <?php
    $inhoud = $_SESSION['mandje'];

    if($inhoud == NULL){
        echo "je winkemandje is leeg";
    }else{
        foreach ($inhoud as $p){
            //maak van $p een int
            $id = intval($p);
            $items =  getCartProductInformation($conn, $id);
                foreach($items as $item){
                    //echo "<a href='winkelmandje.php?delid=". $p ."'>Verwijder</a>";
                    echo"<form method='post'>";
                    echo $item['Titel']. "  ----------------------------- &euro;" . $item['Prijs'];
                    echo "<input type='submit' id='verwijder' name='verwijder' value='Verwijder'>";
                    echo "</form>";
                    echo "<br>";

                    if(isset($_POST['verwijder'])){ 
                        //unset($items);
                        unset($_SESSION['mandje']);
                        //set array opnieuw, anders gaat de sessie kapot en kan je pas weer wat toevoegen nadat je opnieuw inlogt
                        $_SESSION['mandje'] = array();
                    }
                }
               /* echo "<pre>";
                var_dump($_SESSION);
                echo "</pre>";*/
                if(isset($_GET['delid'])){
                    $toDel = $_GET['delid'];
                    for($x = 0; $x < count($_SESSION['mandje']); $x++){
                        if($_SESSION['mandje'][$x] == $toDel)
                            unset($_SESSION['mandje'][$x]);

                    }
                }

        }
} 
    
        
    ?>


</main>
<footer>

</footer>
</body>
</html>