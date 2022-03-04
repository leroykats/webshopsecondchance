<?php
    $dbConn = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "secondchance";
    $conn = mysqli_connect($dbConn, $dbUser, $dbPassword, $dbName);
    if(!$conn)
    {
        DIE("Could not connect: " . mysqli_connect_error());
    }
