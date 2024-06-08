<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`stock_id` ASC");
    $num = $rs->num_rows;
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <title>කොටස් වාර්තාව</title>
        <link rel="icon" href="Resources/bar.png" />
    </head>

    <body>

        <div class="container mt-4 printbtn">
            <a href="adminReport.php"><img src="resources/back.png" style="width: 50px; cursor: pointer;" /></a>
        </div>

        <div class="justify-content-center align-content-center d-flex">
            <div class="container mt-4">
                <h2 class="text-center ">කොටස් වාර්තාව</h2>
                <table class="table table-hover table-bordered mt-5 text-center">

                    <thead>
                        <tr>
                            <th>කොටස් හැඳුනුම්පත</th>
                            <th>නිෂ්පාදන නාමය</th>
                            <th>කොටස් ප්‍රමාණය</th>
                            <th>ඒකක මිල</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        for ($i = 0; $i < $num; $i++) {

                            $d = $rs->fetch_assoc();

                        ?>

                            <tr>
                                <td><?php echo $d["stock_id"] ?></td>
                                <td><?php echo $d["name"] ?></td>
                                <td><?php echo $d["qty"] ?></td>
                                <td><?php echo $d["price"] ?></td>
                            </tr>

                        <?php
                        }

                        ?>



                    </tbody>
                </table>
            </div>
        </div>

        <div class="container d-flex justify-content-center mt-5 mb-5 gap-4">
            <button class="btn btn-warning col-2 printbtn" onclick="window.print()">මුද්‍රණය කරන්න</button>
            <!-- <button class="btn btn-outline-danger text-light col-2" >Download</button> -->
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("ඔබ වලංගු පරිපාලකයෙක් නොවේ");
}

?>