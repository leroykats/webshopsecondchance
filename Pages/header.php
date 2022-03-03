<div class="headerlogo">
    <a href="index.php"><img alt="logo" src="images/logo.jpg" height="90" width="100"/></a>
</div>
<div class="headernav">
    <?php
    if($_SESSION["loggedIn"] && $_SESSION["accountType"] == 2){
    echo "<ul>";
       echo '<li><a href="winkelmandje.php">Winkelmandje</a></li>';
       echo '<li><a href="logout.php">Uitloggen</a></li>';
    echo "</ul>";
    }
    elseif($_SESSION["loggedIn"] && $_SESSION["accountType"] == 0){
        echo '<li><a href="addproduct.php">Add product</a></li>';
        echo '<li><a href="accounts.php">Beheer accounts</a></li>';
        echo '<li><a href="logout.php">Uitloggen</a></li>';
    }elseif($_SESSION["loggedIn"] && $_SESSION["accountType"] == 1){
        echo '<li><a href="order.php">orders</a></li>';
        echo '<li><a href="logout.php">Uitloggen</a></li>';
    } else{
        echo "<ul>";
         echo '<li><a href="login.php">Login</a></li>';
        echo "</ul>";
    }

    ?>
</div>


