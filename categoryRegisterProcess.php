<?php 

include "connection.php";


$category = $_POST["b"];
// echo($brand);

if (empty($category)){
    echo ("කරුණාකර ඔබේ ප්‍රවර්ග නාමය ඇතුළත් කරන්න");
} else if (strlen($category) > 20){
    echo ("Your Category Name Should Be Less Than 20 Characters");
} else {

    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name` = '" . $category . "'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo ("ඔබගේ ප්‍රවර්ග නාමය දැනටමත් පවතී");
    } else {
        Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('" . $category. "')");
        echo ("Success");
    }

}


?>