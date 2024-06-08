<?php 

include "connection.php";


$color = $_POST["b"];
// echo($brand);

if (empty($color)){
    echo ("කරුණාකර ඔබේ වර්ණයේ නම ඇතුළත් කරන්න");
} else if (strlen($color) > 20){
    echo ("Your Color Name Should Be Less Than 20 Characters");
} else {

    $rs = Database::search("SELECT * FROM `color` WHERE `color_name` = '" . $color . "'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo ("ඔබේ වර්ණයේ නාමය දැනටමත් පවතී");
    } else {
        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('" . $color. "')");
        echo ("Success");
    }

}

?>