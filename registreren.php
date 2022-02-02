<?php

//include_once("Config/config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registreren</title>
</head>
<body>
<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
<h1> Registreer </h1>

    <label for"naam">Naam</label>
    <br>
    <input type="text" placeholder="Voer je naam in" name="naam" id="naam" required>
<br>
    <label for"achteernaam">Achternaam</label>
    <br>
    <input type="text" placeholder="Voer je achternaarnaam in" name="achternaam" id="achternaam" required>
<br>
    <label for"gdatum">Geboortedatum</label>
    <br>
    <input type="date"  name="gdatum" id="gdatum" required>
<br>
    <label for"Adres">Adres</label>
    <br>
    <input type="text" placeholder="Voer je adres in" name="adres" id="adres" required>
<br>
    <label for"Potcode">Postcode</label>
    <br>
    <input type="text" placeholder="Voer je postcode in" name="postcode" id="postcode" required>
<br>
    <label for"email">E-mail</label>
    <br>
    <input type="email" placeholder="Voer je E-mail in" name="email" id="email" required>
<br>
<br>
    <button type="submit" name="registeren" id="registreren" value="registreren">registreer</button>    

</form>
     
</body>
</html>