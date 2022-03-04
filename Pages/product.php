<?php
session_start();
include_once ("Config/config.php");
include_once ("Config/functions.php");
$num = $_GET['id'];
$product = getOrderInformation($conn, $num);
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
    <?php
    $product_id = $_GET['id'];
    $stmt = mysqli_prepare($conn, "SELECT * FROM product WHERE ProductID = ?") or die(mysqli_error($conn));
    mysqli_stmt_bind_param($stmt, "i", $product_id);
    mysqli_stmt_execute($stmt) or die(mysqli_error($conn));
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $product_id, $title, $description, $category, $price, $image, $agelimit);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    ?>
    <div class="w60 flex">
        <div class="flex ml-0 textcenter block mb-2 mr-2">
            <img class="imagehome mt-5" src="images/<?php echo $image ?>" alt="Product">
        </div>
        <div>
            <h1 class="mt-5 mb-1"><?php echo $title ?></h1>
            <h2>&euro;&nbsp;<?php echo $price ?></h2>
            <p class="mt-3 mb-3"><?php echo $description ?></p>
            <form method="post">
                <input class="backblue pointer button white bold noborder" name="addtocart" type="submit" value="Buy">
            </form>
        </div>
    </div>
    <div class="w60 flex mt-8">
        <img class="w20 borderridge" src="images/<?php echo $image ?>" alt="Iphone 13">
        <img class="w20 borderridge" src="images/<?php echo $image ?>" alt="Iphone 13">
        <img class="w20 borderridge" src="images/<?php echo $image ?>" alt="Iphone 13">
        <img class="w20 borderridge" src="images/<?php echo $image ?>" alt="Iphone 13">
    </div>
    </main>
    </body>
</html>
