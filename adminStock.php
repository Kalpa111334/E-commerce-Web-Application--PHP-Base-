<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {  
  
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>තැබෑරුම.LK  - Admin Panel</title>
        <link rel="icon" href="Resources/bar.png" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="adminBody">
        <?php
        include "adminNavBar.php";
        ?>

        <div class="container-fluid" style="margin-top: 80px;">

            <div class="row">
                <div class="col-5 offset-1">

                    <h2 class="text-center">නිෂ්පාදන ලියාපදිංචි කිරීම</h2>

                    <div class="mb-3">
                        <label class="form-label" for="">නිෂ්පාදන නාමය</label>
                        <input type="text" class="form-control" id="pname" placeholder="නිෂ්පාදන නම ඇතුලත් කරන්න">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label" for="">වෙළඳ නාමය</label>
                            <select class="form-select" id="brand">
                                <option value="0">තෝරන්න</option>
                                <?php 
                                    $rs = Database::search("SELECT * FROM `brand`");
                                    $num = $rs->num_rows;

                                    for($i = 0; $i < $num; $i++){
                                        $data = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo($data["brand_id"]);?>"><?php echo($data["brand_name"]);?></option>
                                        <?php
                                    }
                                
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="">වර්ගය</label>
                            <select class="form-select" id="cat">
                                <option value="0">තෝරන්න</option>
                                <?php 
                                    $rs = Database::search("SELECT * FROM `category`");
                                    $num = $rs->num_rows;

                                    for($i = 0; $i < $num; $i++){
                                        $data = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo($data["cat_id"]);?>"><?php echo($data["cat_name"]);?></option>
                                        <?php
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label" for="">වර්ණයන් </label>
                            <select class="form-select" id="color">
                                <option value="0">තෝරන්න</option>
                                <?php 
                                    $rs = Database::search("SELECT * FROM `color`");
                                    $num = $rs->num_rows;

                                    for($i = 0; $i < $num; $i++){
                                        $data = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo($data["color_id"]);?>"><?php echo($data["color_name"]);?></option>
                                        <?php
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label" for="">ප්‍රමාණයන් </label>
                            <select class="form-select" id="size">
                                <option value="0">තෝරන්න</option>
                                <?php 
                                    $rs = Database::search("SELECT * FROM `size`");
                                    $num = $rs->num_rows;

                                    for($i = 0; $i < $num; $i++){
                                        $data = $rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo($data["size_id"]);?>"><?php echo($data["size_name"]);?></option>
                                        <?php
                                    }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">විස්තරය </label>
                        <textarea class="form-control" id="desc"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">නිෂ්පාදන රූපය</label>
                        <input id="file" class="form-control" type="file" multiple>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-warning" onclick="regProduct();">නිෂ්පාදන ලියාපදිංචි කරන්න</button>
                    </div>
                </div>

                <div class="col-5">

                    <h2 class="text-center">කොටස් යාවත්කාලීන කිරීම</h2>

                    <div class="mb-3">
                        <label for="">නිෂ්පාදන නාමය</label>
                        <select class="form-select" id="selectProduct">
                            <option>තෝරන්න</option>
                            <?php 
                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($d["id"]); ?>"><?php echo ($d["name"]); ?></option>
                            <?php
                            }
                            
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">ප්‍රමාණය </label>
                        <input class="form-control" type="text" id="qty"/>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">ඒකක මිල</label>
                        <input type="text" class="form-control" id="uprice">
                    </div>

                    <div class="d-grid">
                        <div class="btn btn-warning" onclick="updateStock();">කොටස් යාවත්කාලීන කරන්න</div>
                    </div>

                </div>

            </div>

        </div>

        <!-- footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; තැබෑරුම.LK  || All Right Reserved</p>
        </div>
        <!-- footer -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("ඔබ පරිපාලකයෙක් නොවේ");
}

?>