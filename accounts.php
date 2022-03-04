<?php
session_start();
include_once("Config/config.php");
include_once("Config/functions.php");



if(isset($_POST["submit"])){
    if($_POST["acc_type"] == "Admin"){
        $role =  0;
    } elseif($_POST["acc_type"] == "picker"){
        $role = 1;
    } 
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
                                    VALUES(?,?,?,?,?,?,?,?,?)";
                                    $stmt = mysqli_prepare($conn, $sql) or die(mysqli_error($conn));
                                        mysqli_stmt_bind_param($stmt, "ssssssssi", $hash_password, $naam, $achternaam, $gdatum, $adres, $postcode, $plaats, $email, $role);
                                        mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
                                        mysqli_stmt_close($stmt);
                                        echo "Registreren gelukt!";
                                        header("Location: accounts.php");
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

    <a href="wijzigAccount.php">
        <button>Wijzig een account</button>
    </a>

    <h1>Maak een nieuw account aan</h1>

<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">

    <label for="admin_acc"> Admin </label>
    <input type="radio" id="admin_acc" name="acc_type" value="Admin" checked >
    <label for="order_acc"> Order Picker </label>
    <input type="radio" id="order_acc" name="acc_type" value="picker">

    <label for="wachtwoord">Wachtwoord</label>
    
    <input type="password" placeholder="Voer je nieuwe wachtwoord in" name="wachtwoord" id="wachtwoord" required>

    <label for="naam">Naam</label>
    
    <input type="text" placeholder="Voer je naam in" name="naam" id="naam" required>

    <label for="achternaam">Achternaam</label>

    <input type="text" placeholder="Voer je achternaarnaam in" name="achternaam" id="achternaam" required>

    <label for="gdatum">Geboortedatum</label>
    
    <input type="date"  name="gdatum" id="gdatum" required>

    <label for="adres">Adres</label>
    
    <input type="text" placeholder="Voer je adres in" name="adres" id="adres" required>

    <label for="postcode">Postcode</label>
    
    <input type="text" placeholder="Voer je postcode in" name="postcode" id="postcode" required>

    <label for="plaats">Plaats</label>
    
    <input type="text" placeholder="Voer je woonplaats in" name="plaats" id="plaats" required>

    <label for="email">E-mail</label>
    
    <input type="email" placeholder="Voer je E-mail in" name="email" id="email" required>

    <input type="submit" name="submit" value="maak account">

<main>
<footer>
</footer>    
</body>
</html>