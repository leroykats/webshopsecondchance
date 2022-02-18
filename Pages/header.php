<div class="headerlogo">
    <a href="index.php"><img alt="logo" src="images/logo.jpg" height="90" width="100"/></a>
</div>
<div class="headernav">
    <?php
    if(isset($_SESSION['accountType'])){
    echo "<ul>";
       echo '<li><a href="">uitloggen</a></li>';
    echo "</ul>";
    } else{
        echo "<ul>";
         echo '<li><a href="login.php">Login</a></li>';
        echo "</ul>";
    }
    ?>
</div>


