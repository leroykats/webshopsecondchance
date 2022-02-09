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
                <li><a href="index.html">Home</a></li>
                <li><a href="">Most hired cars</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>
    <main>
        <h1>Voeg producten toe</h1>
        <hr>
        <form action=<?php echo $_SERVER['PHP_SELF']?> method="post">

            <label for="titel">Titel</label>
            <input type="text" name="titel">
            
            <label for="omschrijving">Omschrijving</label>
            <input type="textarea" name="omschrijving">

            <label for="categorie">Categorie</label>
            <input type="text" name="categorie">
            
            <label for="prijs">Prijs</label>
            <input type="number" name="prijs">
            
            <label for="afbeelding">Afbeelding</label>
            <input type="text" name="afbeelding">
            
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
                $afbeelding = $_POST["afbeelding"];
                $leeftijd = $_POST["leeftijd"];

                $titel = filter_input(INPUT_POST,'titel', FILTER_SANITIZE_SPECIAL_CHARS);
                $omschrijving = filter_input(INPUT_POST, 'omschrijving',FILTER_SANITIZE_SPECIAL_CHARS);
                $categorie = filter_input(INPUT_POST,'categorie', FILTER_SANITIZE_SPECIAL_CHARS);
                $prijs = filter_input(INPUT_POST, 'prijs', FILTER_SANITIZE_SPECIAL_CHARS);
                $afbeelding = filter_input(INPUT_POST, 'afbeelding', FILTER_SANITIZE_SPECIAL_CHARS);
                $leeftijd = filter_input(INPUT_POST, 'leeftijd', FILTER_SANITIZE_SPECIAL_CHARS);
            

            $query = "INSERT INTO product (Titel, Omschrijving, Categorie, Prijs, Afbeelding, Leeftijd)
            VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $query);

            mysqli_stmt_bind_param($stmt, "sssisi", $titel, $omschrijving, $categorie, $prijs, $afbeelding, $leeftijd);

            if(mysqli_stmt_execute($stmt)){
                echo "Product succesvol toegevoegt.";
            }else{
                echo "Niet gelukt om product toe te voegen.";
            }
            
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            }
        ?>

        
    </main>
</body>
</html>