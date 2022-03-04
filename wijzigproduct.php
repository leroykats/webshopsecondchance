<?php
session_start();
include_once ("Config/config.php");
include_once ("Config/functions.php");


if(isset($_POST["submit"])){
    $num = $_POST["id"];
    $titel = $_POST["titel"];
    $omschrijving = $_POST["omschrijving"];
    $categorie = $_POST["categorie"];
    $prijs = $_POST["prijs"];
    $leeftijd = $_POST["leeftijd"];
    
    $num = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    $titel = filter_input(INPUT_POST,'titel', FILTER_SANITIZE_SPECIAL_CHARS);
    $omschrijving = filter_input(INPUT_POST, 'omschrijving',FILTER_SANITIZE_SPECIAL_CHARS);
    $categorie = filter_input(INPUT_POST,'categorie', FILTER_SANITIZE_SPECIAL_CHARS);
    $prijs = filter_input(INPUT_POST, 'prijs', FILTER_SANITIZE_SPECIAL_CHARS);
    $leeftijd = filter_input(INPUT_POST, 'leeftijd', FILTER_SANITIZE_SPECIAL_CHARS);

if(!empty($titel)){
    if(!empty($omschrijving)){
        if(!empty($categorie)){
            if(!empty($prijs)){
                if(!empty($leeftijd)){
                    if($_FILES["afbeelding"]["size"] <= 3000000000){
                    
                        $acceptAfbeelding = ["image/jpg", "image/jpeg", "image/png"];
                        $afbeeldingInfo = finfo_open(FILEINFO_MIME_TYPE);
                        $afbeeldingType = finfo_file($afbeeldingInfo, $_FILES["afbeelding"]["tmp_name"]);

                        if(in_array($afbeeldingType, $acceptAfbeelding)){
                            $path = "images/" . $_FILES["afbeelding"]["name"];

                            $query = "UPDATE product 
                                        SET `Titel` = ?,
                                            `Omschrijving` = ?,
                                            `Categorie` = ?,
                                            `Prijs` = ?,
                                            `Afbeelding` = ?,
                                            Leeftijd = ?
                                        WHERE product.ProductID = ?";

                                
                            if($stmt = mysqli_prepare($conn, $query)){
                                mysqli_stmt_bind_param($stmt, "sssisii", $titel, $omschrijving, $categorie, $prijs, $path, $leeftijd, $num);
                                
                                if(mysqli_stmt_execute($stmt)){
                                    echo "Product succesvol Gewijzigd.";
                                    header("Location: product.php?id=$num");
                                        mysqli_stmt_close($stmt);
                                        mysqli_close($conn);
                                    if(move_uploaded_file($_FILES["afbeelding"]["tmp_name"], "images/" . $_FILES["afbeelding"]["name"])){
                                        echo "Uploaden afbeelding gelukt";
                                    }else{
                                        echo "Uploaden afbeelding niet gelukt";
                                    }
                                }else{
                                    echo "Niet gelukt om product toe te voegen.";
                                }

                            }else{
                                //echo mysqli_error($stmt);
                            }  
                        }
                    
                    }else{
                        echo "Leeftijd vergeten!";
                    }
                }else{
                    echo "Afbeelding vergeten!";
                }
            }else{
                echo "Prijs vergeten!";
            }
        }else{
            echo "Categorie vergeten!";
        }
    }else{
        echo "Omschrijving vergeten!";
    }
}else{
    echo "Titel vergeten!";
}
}


$nummer = $_GET['num'];
$items = getCartProductInformation($conn, $nummer);


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
<body>

    <main>
        <h1>wijzig een product</h1>
        <hr>
        <form method="post" enctype="multipart/form-data">
    <?php
    foreach($items as $product)
    ?>
            <label for="id">productid</label>
          <input type="text" name="id" value="<?=$product["ProductID"]?>" id="id" readonly>

           <label for="titel">Titel</label>
          <input type="text" name="titel" value="<?=$product["Titel"]?>" id="titel">
            
            <label for="omschrijving">Omschrijving</label>
            <input type="textarea" name="omschrijving" value="<?=$product["Omschrijving"]?>" id="omschrijving">

            <label for="categorie">Categorie</label>
            <select name="categorie" id="categorie">
                <option value="phones">Phones</option>
                <option value="computers">Computers</option>
                <option value="components">Components</option>
                <option value="smartwatches">Smartwatches</option>
                <option value="smarthome">Smarthome</option>
            </select>
            
            <label for="prijs">Prijs</label>
            <input type="number" name="prijs" value="<?=$product["Prijs"]?>" id="prijs">
            
            <label for="afbeelding">Afbeelding(Verplicht)</label>
            <input type="file" name="afbeelding">
            
            <label for="leeftijd">Leeftijd</label>
            <input type="number" name="leeftijd" value="<?=$product["Leeftijd"]?>" id="leeftijd"> 
            
            <input type="submit" name="submit" value="Product wijzigen">
        </form>


        
    </main>
<footer>
</footer>  
</body>
</html>