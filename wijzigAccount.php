<?php
session_start();
include_once("Config/config.php");
include_once("Config/functions.php");

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
<form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <select class="form-control" name="tour_select">
        <?php
        $result = mysqli_query($mysqli,"SELECT voornaam FROM users order by UserID");

        while($row = mysqli_fetch_array($result))
            echo "<option value='" . $row['voornaam'] . "'>" . $row['achternaam'] . "</option>";
        ?>
    </select>
</form>
</main>
    <footer>
    </footer>
</html>