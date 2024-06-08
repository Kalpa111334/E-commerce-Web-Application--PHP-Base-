<?php 

include "connection.php";


$brand = $_POST["b"];
// echo($brand);

if (empty($brand)){
    echo ("කරුණාකර ඔබේ වෙළඳ නාමය ඇතුළත් කරන්න");
} else if (strlen($brand) > 20){
    echo ("Your Brand Name Should Be Less Than 20 Characters");
} else {

    $rs = Database::search("SELECT * FROM `brand` WHERE `brand_name` = '" . $brand . "'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo ("ඔබේ වෙළඳ නාමය දැනටමත් පවතී");
    } else {
        Database::iud("INSERT INTO `brand` (`brand_name`) VALUES ('" . $brand . "')");
        echo ("Success");
    }

}


?>