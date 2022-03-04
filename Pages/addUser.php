<?php
function insertUser($conn, $fname, $lname, $dob, $adres, $postcode, $plaats, $email, $role) {
    if (userExists($conn, $email))
    {
        header("location: ../users.php?error=userExists");
        exit();
    }
    $query = "INSERT INTO `users` VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    if ($statement = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_bind_param($statement, 'sssssssi', $fname, $lname, $dob, $adres, $postcode, $plaats, $email, $role);
        if (!mysqli_stmt_execute($statement))
        {
            DIE("EXECUTE ERROR");
        }
        mysqli_stmt_close($statement);
    }
    mysqli_close($conn);
    header("location: ../index.php");
}

if (isset($_POST['submit']))
{
    $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? $_POST['email'] : "invalid";
    $fname = ctype_alpha($_POST['fname']) ? $_POST['fname'] : 0;
    $lname = ctype_alpha($_POST['lname']) ? $_POST['lname'] : 0;
    $dob = ctype_alpha($_POST['dob']) ? $_POST['dob'] : 0;
    $adres = ctype_alpha($_POST['adres']) ? $_POST['adres'] : 0;
    $postcode = ctype_alpha($_POST['postcode']) ? $_POST['postcode'] : 0;
    $plaats = ctype_alpha($_POST['plaats']) ? $_POST['plaats'] : 0;
    $role = ctype_alpha($_POST['role']) ? $_POST['role'] : 0;

    if (empty($email) || empty($fname) || empty($lname) || empty($dob) || empty($adres) || empty($postcode) || empty($plaats) || empty($role))
    {
        header("location: ../pages/users.php?error=emptyField");
        exit();
    }

    if ($email == "invalid")
    {
        header("location:  ../pages/users.php?error=invalidEmail");
        exit();
    }

    insertUser($conn, $email, $fname, $lname, $dob, $adres, $postcode, $plaats, $role);
}
?>
<!DOCTYPE html>
<html lang="en">
<div class="users-title">
    <h1>Nieuwe Gebruiker</h1>
</div>
<form action="addUser.php" method="post" class="form flex">
    <div class="label-input flex">
        <label for="email">Email: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "invalidEmail" || $_GET['error'] == "matchError"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <input type="text" name="email" id="email">
        </div>
    </div>
    <div class="label-input flex">
        <label for="fName">Voornaam: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "matchError"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <input type="text" name="fName" id="fName">
        </div>
    </div>
    <div class="label-input flex">
        <label for="lName">Achternaam: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "matchError"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <input type="text" name="lName" id="lName">
        </div>
    </div>
    <div class="label-input flex">
        <label for="dob">Geboortedatum: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "matchError"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <input type="text" name="dob" id="dob">
        </div>
    </div>
    <div class="label-input flex">
        <label for="adres">adres: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "matchError"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <input type="text" name="adres" id="adres">
        </div>
    </div>
    <div class="label-input flex">
        <label for="postcode">Postcode: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "matchError"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <input type="text" name="postcode" id="postcode">
        </div>
    </div>
    <div class="label-input flex">
        <label for="Plaats">Plaats: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "matchError"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <input type="text" name="Plaats" id="Plaats">
        </div>
    </div>
    <div class="label-input flex">
        <label for="role">Rol: </label>
        <div>
            <select name="role" id="role">
                <option value="Admin">Admin</option>
                <option value="orderpicker">Orderpicker</option>
                <option value="klant">Klant</option>
            </select>
        </div>
    </div>
    <input type="submit" name="submit" value="submit">
</form>
</html>
