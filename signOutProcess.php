<?php

session_start();

if(isset($_SESSION["u"])){

    $_SESSION["u"] = null;
    session_destroy();

    echo ("පරිශීලක වරනය සාර්ථකයි!!");

}

?>