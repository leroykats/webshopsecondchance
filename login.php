<?php
session_start();
include_once("Config/config.php");

if(isset($_POST['inloggen'])){
    if(isset($_POST['email']) && $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT)){
        if(isset($_POST['password']) && $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT)){
            $stmt = mysqli_prepare($conn,"SELECT UserId, PasswordHash, Voornaam, Geboortedatum, Email, `role` FROM users WHERE Email = ?") or die(mysqli_error($conn));
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
            mysqli_stmt_store_result($stmt) or die(mysqli_error($conn));
            mysqli_stmt_bind_result($stmt, $Id, $wachtwoord, $naam, $geboortedatum, $e_mail, $role);
            mysqli_stmt_fetch($stmt);
            if (mysqli_stmt_num_rows($stmt) > 0) {
                mysqli_stmt_close($stmt);
                if (password_verify($password, $wachtwoord)) {
                        $_SESSION["loggedIn"] = true;
                        $_SESSION["userID"] = $Id;
                        $_SESSION["accountType"] = $role;
                        $_SESSION["naam"] = $naam;
                        $_SESSION["gdatum"] = $geboortedatum;


                        if ($_SESSION["accountType"] == "0"){
                        header("Location: index.php"); 
                        } elseif($_SESSION["accountType"] == "1"){
                        header("Location: order.php");
                        
                        } elseif($_SESSION["accountType"] == "2"){
                            header("Location: index.php");
                        }
            } else{
                echo "Uw gebruikersnaam of wachtwoord is incorrect";
                echo "<br>";
                echo "Voer de juiste gegevens in of <a href=\"registreren.php\"> maak een account aan </a>";
            }
        } else{
            echo "Geen account gevonden met dit e-mail adres";
            echo "<br>";
            echo "Voer uw juiste e-mail in of <a href=\"registreren.php\"> maak een account aan </a>";
        }
    } else{
        echo "Voer uw e-mail adres in";
    }
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
<main>
<body>
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
        <label for="login">Login</label>
        <br>
        <input type="email" name="email" id="login" placeholder="Voer uw email adres in" required>
        <br><br>
        <label for="password">Wachtwoord</label>
        <br>
        <input type="password" id-"password" name="password" placeholder="voer uw wachtwoord in" required>
        <br><br>
        <button type="submit" name="inloggen" id="inloggen" value="inloggen">Inloggen</button>   

    </form>
    
</body>
</html>