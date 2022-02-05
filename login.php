<?php
session_start();
include_once("Config/config.php");

if(isset($_POST['inloggen'])){
    if(isset($_POST['email']) && $email = filter_input(INPUT_POST, 'email', FILTER_DEAFULT)){

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