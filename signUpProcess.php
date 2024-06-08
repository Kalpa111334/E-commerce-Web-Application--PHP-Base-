<?php 

include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$username = $_POST["u"];
$password = $_POST["p"]; 

// echo ($fname);

if (empty($fname)) {
    echo("කරුණාකර ඔබගේ මුල් නම ඇතුලත් කරන්න");
}else if (strlen($fname) > 20) {
    echo ("ඔබේ මුල් නම අක්ෂර 20කට වඩා වැඩි විය යුතුය");
} else if (empty($lname)) {
    echo ("කරුණාකර ඔබගේ අවසන් නම ඇතුලත් කරන්න");
} else if (strlen($lname) > 20) {
    echo ("ඔබගේ අවසාන නම අක්ෂර 20කට වඩා වැඩි විය යුතුය");
} else if (empty($email)) {
    echo ("කරුණාකර ඔබගේ විද්‍යුත් තැපෑල ඇතුලත් කරන්න");
} else if (strlen($email) > 100) {
    echo ("ඔබගේ විද්‍යුත් තැපෑල අක්ෂර 100 ට වඩා අඩු විය යුතුය");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("ඔබගේ විද්‍යුත් තැපැල් ලිපිනය වලංගු නොවේ");
} else if (empty($mobile)) {
    echo ("කරුණාකර ඔබගේ ජංගම දුරකථන අංකය ඇතුලත් කරන්න");
} else if (strlen($mobile)!= 10) {
    echo ("ඔබගේ ජංගම දුරකථන අංකයේ අක්ෂර 10ක් අඩංගු විය යුතුය");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("ඔබගේ ජංගම දුරකථන අංකය වලංගු නොවේ");
} else if (empty($username)) {
    echo ("කරුණාකර ඔබගේ පරිශීලක නාමය ඇතුලත් කරන්න");
} else if (strlen($username) > 20) {
    echo ("ඔබගේ පරිශීලක නාමය අක්ෂර 20කට වඩා වැඩි විය යුතුය");
} else if (empty($password)) {
    echo ("Please Enter Your Password");
} else if (strlen($password) < 5 || strlen($password) > 15) {
    echo ("ඔබගේ මුරපදයේ අක්ෂර 5 - 15 ට වඩා අඩංගු විය යුතුය");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' OR `mobile` = '".$mobile."' OR `username` = '".$username."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("මෙම ඊමේල්, ජංගම හෝ පරිශීලක නාමය දැනටමත් පවතී");
    } else {
        // Insert Data
        Database::iud ("INSERT INTO `user` (`fname`, `lname`, `email`, `mobile`, `username`, `password`,`user_type_id`) 
        VALUES ('" . $fname . "', '" . $lname . "',  '" . $email . "','" . $mobile . "', '" . $username . "', '" . $password . "','2')");
    
        echo ("සාර්ථකයි");
    }
}

?>