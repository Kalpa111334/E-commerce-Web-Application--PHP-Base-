<?php

include "connection.php";
$stockId = $_GET["s"];

//echo($stockId);

if (isset($stockId)) {

    $q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `brand` 
    ON `product`.`brand_id` = `brand`.`brand_id` INNER JOIN `color` ON `product`.`color_id` = `color`.color_id 
    INNER JOIN `category`ON `product`.`category_id` = `category`.cat_id INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`
    WHERE `stock`.`stock_id`= '" . $stockId . "'";

    $rs = Database::search($q);
    $d =  $rs->fetch_assoc();

?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>තැබෑරුම.LK </title>
        <link rel="icon" href="Resources/bar.png" />
    </head>

    <body>

        <!-- Navbar -->
        <?php include "navBar.php"; ?>
        <!-- Navbar -->

        <div class="adminBody">
            <div class="col-8 row shadow-lg p-5 bg-body-tertiary rounded-2 m-auto">
                <div class="col-6">
                    <img src="<?php echo $d["path"] ?>" class="rounded-3 shadow-lg" width="320px" />
                </div>
                <div class="col-6">
                    <h3 class="text-info"><?php echo $d["name"] ?></h3>
                    <h5 class="mt-3">වෙළඳ නාමය: <?php echo $d["brand_name"] ?></h5>
                    <h6 class="mt-3">වර්ගය: <?php echo $d["cat_name"] ?></h6>
                    <h6 class="mt-3">වර්ණයන්: <?php echo $d["color_name"] ?></h6>
                    <h6 class="mt-3">ප්‍රමාණය: <?php echo $d["size_name"] ?></h6>
                    <p class="mt-3">විස්තරය: <?php echo $d["description"] ?></p>
                    <div class="row mt-5">
                        <div class="col-2">
                            <input type="text" placeholder="ප්‍රමාණය" class="form-control" id="qty" />
                        </div>
                        <div class="col-6 mt-2">
                            <h6 class="text-warning">පවතින ප්‍රමාණය : <?php echo $d["qty"] ?></h6>
                        </div>
                    </div>
                    <h5 class="mt-3">මුදල  : <?php echo $d["price"] ?></h5>
                    <div class="d-flex justify-content-center mt-3">
                        <button class="btn btn-danger col-6" onclick="addtoCart('<?php echo $d['stock_id'] ?>');">cart වෙත Add කරන්න </button>
                        <button class="btn btn-success col-6 ms-2" onclick="buyNow('<?php echo $d['stock_id'] ?>');" >දැන් මිලදී ගන්න</button>
                        
                    </div>

                </div>
            </div>
        </div>


        <!--Footer -->
        <div class="col-12 mt-3 fixed-bottom">
            <p class="text-center">&copy; 2024 තැබෑරුම.LK || All Right Reserved</p>
        </div>
        <!--Footer -->

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>


    </html>
<?php

} else {
    header("location: index.php");
}


?>