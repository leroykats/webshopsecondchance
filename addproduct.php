<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Bing's cars</title>
</head>
<body>
    <header>
        <div class="headerlogo">
            <a href="index.html"><img alt="logo" src="images/logo.jpg" height="90" width="100"/></a>
        </div>
        <div class="headernav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">Most hired cars</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>
    <main>
        <h1>Voeg producten toe</h1>
        <hr>
        <form action=<?php echo $_SERVER['PHP_SELF']?> method="post" enctype="multipart/form-data">

            <label for="titel">Titel</label>
            <input type="text" name="titel">
            
            <label for="omschrijving">Omschrijving</label>
            <input type="textarea" name="omschrijving">

            <label for="categorie">Categorie</label>
            <select name="categorie" id="categorie">
                <option value="phones">Phones</option>
                <option value="computers">Computers</option>
                <option value="components">Components</option>
                <option value="smartwatches">Smartwatches</option>
                <option value="smarthome">Smarthome</option>
            </select>
            
            <label for="prijs">Prijs</label>
            <input type="number" name="prijs">
            
            <label for="afbeelding">Afbeelding</label>
            <input type="file" name="afbeelding">
            
            <label for="leeftijd">Leeftijd</label>
            <input type="number" name="leeftijd">
            
            <input type="submit" name="submit" value="Product toevoegen">
        </form>

        <?php include_once "Config/config.php";
            if(isset($_POST["submit"])){

                $titel = $_POST["titel"];
                $omschrijving = $_POST["omschrijving"];
                $categorie = $_POST["categorie"];
                $prijs = $_POST["prijs"];
                $leeftijd = $_POST["leeftijd"];

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

                                        $query = "INSERT INTO product (Titel, Omschrijving, Categorie, Prijs, Afbeelding, Leeftijd)
                                        VALUES (?, ?, ?, ?, ?, ?)";

                                        if($stmt = mysqli_prepare($conn, $query)){
                                            mysqli_stmt_bind_param($stmt, "sssisi", $titel, $omschrijving, $categorie, $prijs, $path, $leeftijd);

                                            if(mysqli_stmt_execute($stmt)){
                                                echo "Product succesvol toegevoegt.";
                                                if(move_uploaded_file($_FILES["afbeelding"]["tmp_name"], "images/" . $_FILES["afbeelding"]["name"])){
                                                    echo "Uploaden afbeelding gelukt";
                                                }else{
                                                    echo "Uploaden afbeelding niet gelukt";
                                                }
                                            }else{
                                                echo "Niet gelukt om product toe te voegen.";
                                            }

                                        }else{
                                            echo "Binden niet gelukt!";
                                        }

                                        
                                    }

                                    mysqli_stmt_close($stmt);
                                    mysqli_close($conn);
                                }else{
                                    echo "Afbeelding vergeten!";
                                }
                            }else{
                                echo "Leeftijd vergeten!";
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
        ?>

        
    </main>
</body>
</html>