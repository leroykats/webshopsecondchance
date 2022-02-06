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

        <h2>Who is Bing cars?</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus iaculis posuere nulla, quis ultrices quam sollicitudin ut. Maecenas ac arcu ullamcorper, aliquam dui vel, scelerisque turpis. Vivamus urna sem, rutrum sed arcu in, cursus dictum diam. Vestibulum bibendum vulputate magna et sagittis. Nullam nunc mauris, laoreet at eros id, maximus ullamcorper lectus. Nulla rhoncus quam eu tristique viverra. Cras risus dolor, pellentesque molestie dictum quis, blandit a augue. Cras pharetra massa ut nisi ullamcorper, ut cursus lorem dictum. Quisque vulputate orci malesuada massa porta sagittis. Aliquam sit amet dui quis ex vehicula placerat.</p>

        
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