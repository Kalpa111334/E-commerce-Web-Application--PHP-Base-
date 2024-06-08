<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON `user`.`user_type_id` = `user_type`.`utype_id` ORDER BY `user`.`id` ASC");
    $num = $rs->num_rows;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <title>පරිශීලක වාර්තාව</title>
        <link rel="icon" href="Resources/bar.png" />
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
                            <th>පරිශීලක ID</th>
                            <th>මුල් නම</th>
                            <th>අවසන් නම</th>
                            <th>විද්යුත් තැපෑල</th>
                            <th>ජංගම දුරකථන අංකය</th>
                            <th>පරිශීලක වර්ගය</th>
                            <th>තත්ත්වය</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["id"]?></td>
                                <td><?php echo $d["fname"]?></td>
                                <td><?php echo $d["lname"]?></td>
                                <td><?php echo $d["email"]?></td>
                                <td><?php echo $d["mobile"]?></td>
                                <td><?php echo $d["type"]?></td>
                                <td><?php 
                                    if ($d["status"] == 1){
                                        echo ("Active");
                                    } else {
                                        echo ("Inactive");
                                    }
                                ?></td>
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