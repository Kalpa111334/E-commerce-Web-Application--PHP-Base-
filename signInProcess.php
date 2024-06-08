<?php 

session_start();

include "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

//echo ($username);

if (empty($email)) {
    echo ("කරුණාකර ඔබගේ පරිශීලක නාමය ඇතුලත් කරන්න");
} else if (empty($password)) {
    echo ("ඔබගේ මුරපදය ඇතුල් කරන්න");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
    $num = $rs->num_rows;

    $d = $rs->fetch_assoc();

    if ($num == 1) {
        
        if ($d["status"] == 1){
            // Active User
            echo ("Success");

            $_SESSION["u"] = $d;

            if ($rememberme == "true"){
                //Set Cookie

                setcookie("email", $email, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365)); 

            } else {
                // Destroy Cookie
                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }

        } else {
            //Inactive User
            echo ("අක්රිය පරිශීලක");
        }

    } else {
        echo("වලංගු නොවන පරිශීලක නාමයක් හෝ මුරපදයක්");
    }


}

?>