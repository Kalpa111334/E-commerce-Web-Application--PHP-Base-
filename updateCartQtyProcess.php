<?php

include "connection.php";

$cartId = $_POST["c"];
$newQty = $_POST["q"];
//echo ($newQty);

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_stock_id` = `stock`.`stock_id` 
WHERE `cart`.`cart_id` = '" . $cartId . "'");

$num = $rs->num_rows;

if ($num > 0) {
    // Cart Item Found
   $d = $rs->fetch_assoc();

    if ($d["qty"] >= $newQty) {
        // Update Query

        Database::iud("UPDATE `cart` SET `cart_qty` = '" . $newQty . "' WHERE `cart_id` = '" . $cartId . "'");
        echo ("Success");
    } else {
        echo ("ඔබේ නිෂ්පාදන ප්‍රමාණය ඉක්මවා ඇත!");
    }
} else {
    //Cart Item not Found
    echo ("cart අයිතමය හමු නොවීය");
}
