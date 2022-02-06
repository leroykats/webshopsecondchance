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
                        header("Location: index.php");   
                }       
            }
        }

    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
        <label for="login">Login</label>
        <br>
        <input type="email" name="email" id="login" placeholder="Voer uw email adres in">
        <br><br>
        <label for="password">Wachtwoord</label>
        <br>
        <input type="password" id-"password" name="password" placeholder="voer uw wachtwoord in">
        <br><br>
        <button type="submit" name="inloggen" id="inloggen" value="inloggen">Inloggen</button>   

    </form>
    
</body>
</html>