<?php

include_once("Config/config.php");
include_once("Config/functions.php");


if(isset($_POST["submit"])){
    echo "halllooo";
    if(isset($_POST["wachtwoord"]) && $wachtwoord = filter_input(INPUT_POST, "wachtwoord", FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
        if(isset($_POST["naam"]) && $naam = filter_input(INPUT_POST, "naam", FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
            if(isset($_POST["achternaam"]) && $achternaam = filter_input(INPUT_POST, "achternaam", FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
                if(isset($_POST["gdatum"]) && $gdatum = filter_input(INPUT_POST, "gdatum", FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
                    if(isset($_POST["adres"]) && $adres = filter_input(INPUT_POST, "adres", FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
                        if(isset($_POST["postcode"]) && $postcode = filter_input(INPUT_POST, "postcode", FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
                             if(isset($_POST["plaats"]) && $plaats = filter_input(INPUT_POST, "plaats", FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
                                if(isset($_POST["email"]) && $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS)){
                                    $hash_password = password_hash($wachtwoord, PASSWORD_DEFAULT);
                                    if(!userExists($conn, $email)){
                                    //add user 
                                    $sql = "INSERT INTO users(passwordhash, Voornaam, Achternaam, Geboortedatum, Adres, Postcode, Plaats, Email, `Role`)
                                    VALUES(?,?,?,?,?,?,?,?,3)";
                                    $stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));
                                        mysqli_stmt_bind_param($stmt, "ssssssss", $hash_password, $naam, $achternaam, $gdatum, $adres, $postcode, $plaats, $email);
                                        mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
                                        mysqli_stmt_close($stmt);
                                        echo "Registreren gelukt!";
                                        header("Location: login.php");
                                    } else{
                                       echo "een account met dit e-mail adres bestaat al";
                                    }    
                                } else{
                                    echo "Voer uw e-mail adres in";
                                }        
                            } else{
                                echo "Voer uw woonplaats in";
                            }
                        } else{
                            echo "voer uw postcode in";
                        }
                    } else{
                        echo "Voer uw adres in";
                    }
                } else{
                    echo "voer uw geboortedatum in";
                }
            } else{
                echo "Voer uw achternaam in";
            }
        } else{
            echo "Voer uw voornam in";
        }
    } else{
        echo "Voer een wachtwoord in";
    }  
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
<body>
<main>
<body>
<main>
<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
<h1> Registreer </h1>
<br>
    <label for"wachtwoord">Wachtwoord</label>
    <br>
    <input type="password" placeholder="Voer je nieuwe wachtwoord in" name="wachtwoord" id="wachtwoord" required>
<br>    
    <label for"naam">Naam</label>
    <br>
    <input type="text" placeholder="Voer je naam in" name="naam" id="naam" required>
<br>
    <label for"achternaam">Achternaam</label>
    <br>
    <input type="text" placeholder="Voer je achternaarnaam in" name="achternaam" id="achternaam" required>
<br>
    <label for"gdatum">Geboortedatum</label>
    <br>
    <input type="date"  name="gdatum" id="gdatum" required>
<br>
    <label for"adres">Adres</label>
    <br>
    <input type="text" placeholder="Voer je adres in" name="adres" id="adres" required>
<br>
    <label for"postcode">Postcode</label>
    <br>
    <input type="text" placeholder="Voer je postcode in" name="postcode" id="postcode" required>
<br>
    <label for"plaats">Plaats</label>
    <br>
    <input type="text" placeholder="Voer je woonplaats in" name="plaats" id="plaats" required>
<br>
    <label for"email">E-mail</label>
    <br>
    <input type="email" placeholder="Voer je E-mail in" name="email" id="email" required>

<br>
<br>
<input type="submit" name="submit" value="maak account"> 

</form>
<main> 
</body>
</html>