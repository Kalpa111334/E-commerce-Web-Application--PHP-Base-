<?php

include "connection.php";

$cartId = $_POST["c"];

Database::iud("DELETE FROM `cart` WHERE `cart_id` = '" . $cartId . "'");
echo ("අයිතමය කරත්තයෙන් සාර්ථකව ඉවත් කරන්න");
