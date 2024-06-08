<?php

session_start();
include "connection.php";

    $username = $_POST["u"];
    $password = $_POST["p"];

    // echo($username);

    if (empty($username)) {
        echo ("කරුණාකර ඔබගේ පරිශීලක නාමය ඇතුලත් කරන්න");
    } else if (empty($password)) {
        echo ("ඔබගේ මුරපදය ඇතුල් කරන්න");
    }  else {
        
        $rs = Database::search("SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $password . "'");
        $num = $rs->num_rows;

        if ($num == 1) {
            
            $d = $rs->fetch_assoc();

            if ($d["user_type_id"] == 1) {
                echo ("Success");

                $_SESSION["a"] = $d;
            } else {
                echo ("ඔබට පරිපාලක ගිණුමක් නොමැත");
            }
        } else {
            echo ("වලංගු නොවන පරිශීලක නාමයක් හෝ මුරපදයකි ");
        }
    }
?>