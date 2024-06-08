<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `product` 
    INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id` 
    INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
    INNER JOIN `category` ON `product`.`category_id`=`category`.`cat_id` 
    INNER JOIN `size` ON `product`.`size_id`=`size`.`size_id` ORDER BY `product`.`id` ASC");
    
    $num = $rs->num_rows;
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <title>නිෂ්පාදන වාර්තාව</title>
    </head>

    <body>

        <div class="container mt-3">
            <a href="adminReport.php"><img src="Resources/back.png" height="25"></a>
        </div>

        <div>
            <div class="container mt-3">
                <h2 class="text-center ">නිෂ්පාදන වාර්තාව</h2> 
                <table class="table table-hover mt-5">

                    <thead>
                        <tr>
                            <th>නිෂ්පාදන වාර්තාව</th>
                            <th>නිෂ්පාදන නාමය</th>
                            <th>වෙළඳ නාමය</th>
                            <th>වර්ණයන්</th>
                            <th>වර්ගය</th>
                            <th>ප්‍රමාණය </th>
                            <th>විස්තරය</th>
                            <th>රූපය</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["id"] ?></td>
                                <td><?php echo $d["name"] ?></td>
                                <td><?php echo $d["brand_name"] ?></td>
                                <td><?php echo $d["color_name"] ?></td>
                                <td><?php echo $d["cat_name"] ?></td>
                                <td><?php echo $d["size_name"] ?></td>
                                <td><?php echo $d["description"] ?></td>
                                <td><img src="<?php echo $d["path"]?>" height="100"/></td>
                            </tr>

                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container mt-3 d-flex justify-content-end">
            <button class="btn btn-outline-dark col-2" onclick="window.print()">මුද්‍රණය කරන්න</button>
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