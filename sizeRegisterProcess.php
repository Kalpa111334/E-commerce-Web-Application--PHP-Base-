<?php 

include "connection.php";


$size = $_POST["b"];
// echo($brand);

if (empty($size)){
    echo ("කරුණාකර ඔබේ ප්‍රමාණය ඇතුළත් කරන්න");
} else if (strlen($size) > 10){
    echo ("ඔබේ ප්‍රමාණය අනුලකුණු 10කට වඩා අඩු විය යුතුය");
} else {

    $rs = Database::search("SELECT * FROM `size` WHERE `size_name` = '" . $size . "'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo ("ඔබේ ප්‍රමාණය දැනටමත් පවතී");
    } else {
        Database::iud("INSERT INTO `size` (`size_name`) VALUES ('" . $size. "')");
        echo ("Success");
    }
}

?>