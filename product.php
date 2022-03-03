<?php
session_start();
include_once ("Config/config.php");
include_once ("Config/functions.php");
$num = $_GET['id'];
$ticket = getOrderInformation($conn, $num);

if(isset($_POST["AddToCart"])){
    array_push($_SESSION["mandje"], $num);
    echo "toevoegen gelukt";
  
}

$userAge = getUserAge($_SESSION["gdatum"]);


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
         echo "<img src='" . $ticket["File"] . "'>";
         echo "<br>";
         echo "<br>";
        

      
    
    if($_SESSION["loggedIn"] && $ticket['Leeftijd'] < 18){
    echo '<form method="post">';
       echo '<input type="submit" name="AddToCart" value="Toevoegen aan winkelwagen">';
    echo "</form>";
    } elseif($_SESSION["loggedIn"] && $ticket['Leeftijd'] >= 18 && $userAge >= 18){
        echo '<form method="post">';
        echo '<input type="submit" name="AddToCart" value="Toevoegen aan winkelwagen">';
        echo "</form>";
    } elseif($_SESSION["loggedIn"] && $ticket['Leeftijd'] >= 18 && $userAge <= 17){
        echo "Dit product is voor 18 jaar en ouder";
    } else{
        echo "Login om te bestellen!";
    }
    
    
?>
</main>
<footer>

</footer>
</body>
</html>
