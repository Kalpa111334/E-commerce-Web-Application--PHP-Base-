<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$pw = $_POST["p"];
$no = $_POST["n"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];

if (empty($fname)) {
    echo("කරුණාකර ඔබගේ මුල් නම ඇතුලත් කරන්න");
} else if (strlen($fname) > 20) {
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
} else if (empty($pw)) {
    echo ("ඔබගේ මුරපදය ඇතුල් කරන්න");
} else if (strlen($pw) < 5 || strlen($pw) > 15) {
    echo ("ඔබගේ මුරපදයේ අක්ෂර 5 - 15 ට වඩා අඩංගු විය යුතුය");
} else if (empty($no) > 10){
    echo ("ඔබගේ ලිපිනය අංක 10 ට වඩා අඩු විය යුතුය");
} else if (empty($line1)) {
    echo ("කරුණාකර ඔබගේ ලිපින පේළිය 01 ඇතුලත් කරන්න");
} else if (strlen($line1) > 50) {
    echo ("ඔබගේ ලිපින පේළිය 01 අක්ෂර 50 ට වඩා අඩු විය යුතුය");
} else if (empty($line2)) {
    echo ("කරුණාකර ඔබගේ ලිපින පේළිය 02 ඇතුලත් කරන්න");
} else if  (strlen($line2) > 50) {
    echo ("ඔබගේ ලිපින පේළිය 02 අක්ෂර 50 ට වඩා අඩු විය යුතුය");
} else {
    $rs = Database::iud("UPDATE `user` SET `fname` = '".$fname. "',`lname` = '".$lname."',`email` = '".$email."',`mobile` = '".$mobile."',
    `password` = '".$pw."',`no`='".$no."',`line_1` = '".$line1."',`line_2` = '".$line2."' WHERE `id` = '". $user["id"]. "'");

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '". $user["id"]. "'");
    $d = $rs->fetch_assoc();
    $_SESSION["user"] = $d;

    echo ("Update Successfully");
}

?>