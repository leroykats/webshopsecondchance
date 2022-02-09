<?php
session_start();
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
        <h1> Welkom <?php echo($_SESSION["naam"])?> </h1>
        
        <hr>
        <div class="categories">
            <b>Please select one of the following categories: </b> <p></p>
            <ul>
                <a href="index.php">Phones</a> -
                <a href="">Computers</a> -
                <a href="">Components</a> -
                <a href="">Smart Watches</a> -
                <a href="">Smart Home</a>
            </ul>
        </div>
        <div class="images">
            <div class="imgbox">
                <img src="images/car 1.png" alt="auto"><h2>Hyonda</h2><p><strong>€ 120.000</strong><br>Beautiful car that can last<br>for years to come</p>
            </div>
            <div class="imgbox">
                <img src="images/car 1.png" alt="auto"><h2>Hyonda</h2><p><strong>€ 120.000</strong><br>Beautiful car that can last<br>for years to come</p>
            </div>
            <div class="imgbox">
                <img src="images/car 1.png" alt="auto"><h2>Hyonda</h2><p><strong>€ 120.000</strong><br>Beautiful car that can last<br>for years to come</p>
            </div>
            <div class="imgbox">
                <img src="images/car 1.png" alt="auto"><h2>Hyonda</h2><p><strong>€ 120.000</strong><br>Beautiful car that can last<br>for years to come</p>
            </div>
            <div class="imgbox">
                <img src="images/car 1.png" alt="auto"><h2>Hyonda</h2><p><strong>€ 120.000</strong><br>Beautiful car that can last<br>for years to come</p>
            </div>
            <div class="imgbox">
                <img src="images/car 1.png" alt="auto"><h2>Hyonda</h2><p><strong>€ 120.000</strong><br>Beautiful car that can last<br>for years to come</p>
            </div>
            <div class="imgbox">
                <img src="images/car 1.png" alt="auto"><h2>Hyonda</h2><p><strong>€ 120.000</strong><br>Beautiful car that can last<br>for years to come</p>
            </div>
            <div class="imgbox">
                <img src="images/car 1.png" alt="auto"><h2>Hyonda</h2><p><strong>€ 120.000</strong><br>Beautiful car that can last<br>for years to come</p>
            </div> 
        </div>

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