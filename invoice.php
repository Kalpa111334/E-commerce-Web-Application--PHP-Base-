<?php
session_start();
include "connection.php";
$user = $_SESSION["u"];

$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid`='" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <title>තැබෑරුම.LK - Invoice</title>
        <link rel="icon" href="Resources/bar.png" /> 

    </head>
    <script src="script.js"></script>

    <body>
        <div class="container mt-2 text-end">
            <a href="index.php" class="btn btn-warning btn-sm">මුල් පිටුවට පිවිසෙන්න</a>  
        </div>

        <div class="container mt-2 mb-4" id="printArea">
            <div class="border border-3 border-dark p-5 rounded-3">
                <div class="row">
                    <div class="col-md-6">
                        <h3>ඇණවුම් හැඳුනුම් අංකය #<?php echo $d["order_id"] ?></h3>
                        <h5><?php echo $d["order_date"] ?></h5>
                    </div>
                    <div class="col-md-6 text-md-end text-center">
                        <h1>ඉන්වොයිස් වාර්තාව</h1>
                        <h4>තැබෑරුම.LK</h4>
                        <h5>96, 4 Th Division Kolambage-Ara</h5>
                        <h5>Embilipitiya Road, Rathnapura</h5>
                    </div>
                </div>

                <div class="mt-4">
                    <h4><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h4>
                    <h5><?php echo $user["mobile"] ?></h5>
                    <h5><?php echo $user["no"] ?></h5>
                    <h5><?php echo $user["line_1"] ?></h5>
                    <h5><?php echo $user["line_2"] ?></h5>
                </div>

                <div class="table-responsive mt-5">
                    <table class="table table-hover border border-1 border-dark">
                        <thead>
                            <tr>
                                <th scope="col">නිෂ්පාදන නාමය</th>
                                <th scope="col">වෙළඳ නාමය</th>
                                <th scope="col">වර්ගය</th>
                                <th scope="col">වර්ණයන්</th>
                                <th scope="col">ප්‍රමාණය</th>
                                <th scope="col">ප්‍රමාණයන්</th>
                                <th scope="col">මිල</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rs2 = Database::search("SELECT * FROM order_item INNER JOIN stock ON 
                        order_item.stock_stock_id = stock.stock_id INNER JOIN
                        product ON stock.product_id=product.id INNER JOIN 
                        brand ON product.brand_id = brand.brand_id INNER JOIN
                        color ON product.color_id=color.color_id INNER JOIN
                        category ON product.category_id=category.cat_id INNER JOIN
                        size ON product.size_id=size.size_id WHERE order_item.order_history_ohid = '" . $orderHistoryId . "'");

                            $num2 = $rs2->num_rows;

                            for ($i = 0; $i < $num2; $i++) {
                                $d2 = $rs2->fetch_assoc();
                            ?>
                                <tr>
                                    <td><?php echo $d2["name"]; ?></td>
                                    <td><?php echo $d2["brand_name"]; ?></td>
                                    <td><?php echo $d2["cat_name"]; ?></td>
                                    <td><?php echo $d2["color_name"]; ?></td>
                                    <td><?php echo $d2["size_name"]; ?></td>
                                    <td><?php echo $d2["oi_qty"]; ?></td>
                                    <td>Rs. <?php echo ($d2["price"] * $d2["oi_qty"]); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-end mt-5">
                    <h6>අයිතම ගණන: <span class="text-warning"><?php echo $num2; ?></span></h6>
                    <h5>බෙදාහැරීමේ ගාස්තු: <span class="text-warning">500</span></h5>
                    <h3>ශුද්ධ එකතුව: <span class="text-warning">Rs. <?php echo $d["amount"]; ?></span></h3>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-warning" onclick="printDiv();">මුද්‍රණය කරන්න</button>
        </div>
    </body>

    </html>

<?php
} else {
    header("location: index.php");
}
?>