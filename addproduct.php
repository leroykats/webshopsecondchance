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

            <input type="text" name="titel">
            <label for="product">Product *</label><br>

            <input type="textarea" name="omschrijving">
            <label for="version">Version *</label><br>

            <input type="text" name="categorie">
            <label for="hardware">Hardware *</label><br>

            <input type="text" name="prijs">
            <label for="os">OS *</label><br>

            <input type="text" name="afbeelding">
            <label for="frequency">Frequency *</label><br>

            <input type="text" name="leeftijd">
            <label for="solution">Solution *</label><br>
        </form>

        <?php include_once "Config/config.php";
            $query = "INSERT INTO product (Titel, Omschrijving, Categorie, Prijs, Afbeelding, Leeftijd)
            VALUES (?, ?, ?, ?, ?, ?)";
        
        ?>

        
    </main>
    <footer>
        <p>2022 Bings Cars<br>
        <a href="">Send us a direct e-mail!</a>
        </p>
        <ul>
            <li>Monday 13:00 - 18:00</li>
            <li>Tuesday 9:00 - 18:00</li>
            <li>Wednesday 9:00 - 18:00</li>
            <li>Thursday 9:00 - 21:00</li>
            <li>Friday 9:00 - 21:00</li>
            <li>Saterday 9:00 - 17:00</li>
        </ul>
    </footer>
</body>
</html>