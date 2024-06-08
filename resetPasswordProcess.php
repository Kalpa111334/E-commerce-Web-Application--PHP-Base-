<?php

include "connection.php";

$email = $_POST["e"];
$newpw = $_POST["n"];
$retypedpw = $_POST["r"];
$vcode = $_POST["v"];

if($newpw != $retypedpw){
    echo ("Retyped password does not match with the New Password.");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `verification_code`='".$vcode."'");
    $num = $rs->num_rows;

    if($num == 1){

        Database::iud("UPDATE `user` SET `password`='".$retypedpw."' WHERE `email`='".$email."'");
        echo ("success");

    }else{
        echo ("Invalid Email or Verification Code.");
    }

}

?>