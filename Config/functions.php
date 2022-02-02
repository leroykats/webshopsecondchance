<?php

    function getUserInfo($conn, $email, $info)
    {
        $query = "SELECT " . $info . " FROM `user` WHERE `Email` = ?";
        if ($statement = mysqli_prepare($conn, $query))
        {
            mysqli_stmt_bind_param($statement, 's', $email);
            if (mysqli_stmt_execute($statement))
            {
                mysqli_stmt_bind_result($statement, $info);
                if (mysqli_stmt_fetch($statement))
                {
                    return $info;
                }
            }
            else
            {
                DIE("EXECUTE ERROR");
            }
        }
        else
        {
            DIE(mysqli_error($conn));
        }
    }

    function userExists($conn, $email) {
        $query = "SELECT `Email` FROM `Users` WHERE `Email` = ?";
        if ($statement = mysqli_prepare($conn, $query))
        {
            mysqli_stmt_bind_param($statement, 's', $email);
            if (!mysqli_stmt_execute($statement))
            {
                DIE("EXECUTE ERROR " . mysqli_stmt_error($statement));
            }
            mysqli_stmt_store_result($statement);
            if (mysqli_stmt_num_rows($statement) > 0)
            {
                return true;
            }
            return false;
        }
    }
    function getErrorMessages($error)
    {
        if ($error == "emptyField")
        {
            return "Vul alle velden in";
        }
        if ($error == "invalidEmail")
        {
            return "Vul een geldig emailadres in";
        }
        if ($error == "invalidPhoneNumber")
        {
            return "Ongeldig telefoonnummer";
        }
    }