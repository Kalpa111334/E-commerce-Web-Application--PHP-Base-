<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="style.css" />
        <title>තැබෑරුම.LK </title>
        <link rel="icon" href="Resources/bar.png" />
    </head>

    <body>
        <?php include "navBar.php" ?>

        <div class="adminBody">
            <div class="row container">
                <div class="col-4 d-flex justify-content-center flex-column">
                    <div class="d-flex justify-content-center">
                        <img src="<?php
                                    if (!empty($d["img_path"])) {
                                        echo $d["img_path"];
                                    } else {
                                        echo ("Resources/profile.png");
                                    }
                                    ?>" height="150px">
                    </div>
                    <div class="mt-3">
                        <label for="from-label">පැතිකඩ රූපය</label>
                        <input type="file" class="form-control" id="imgUploader"/>
                    </div>
                    <div>
                        <button class="btn btn-warning col-12 mt-4" onclick="uploadImg();">උඩුගත කරන්න</button>
                    </div>
                </div>
                <div class="col-8">
                    <h2 class="text-center">පැතිකඩ විස්තර</h2>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">මුල් නම</label>
                            <input type="text" class="form-control" value="<?php echo $d["fname"]?>" id="fname"/>
                        </div>
                        <div class="col-6">
                            <label for="form-label">මුල් නම</label>
                            <input type="text" class="form-control" value="<?php echo $d["lname"]?>" id="lname"/>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">විද්යුත් තැපෑල</label>
                        <input type="text" class="form-control" value="<?php echo $d["email"]?>" id="email">
                    </div>
                    <div class="mt-3">
                        <label for="form-label">දුරකථන අංකය</label>
                        <input type="text" class="form-control" value="<?php echo $d["mobile"]?>" id="mobile">
                    </div>
                    <div class="mt-3">
                        <label for="form-label">පරිශීලක නාමය</label>
                        <input type="text" class="form-control" value="<?php echo $d["username"]?>" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="form-label">මුරපදය</label>
                        <input type="password" class="form-control" value="<?php echo $d["password"]?>" id="pw">
                    </div>
                    <h5 class="mt-3">බෙදාහැරීමේ ලිපිනය</h5>

                    <div class="row mt-3">
                        <div class="col-3">
                            <label for="form-label">නිවසේ අංකය:</label>
                            <input type="text" class="form-control" id="no">
                        </div>
                        <div class="col-9">
                            <label for="form-label">ලිපින පේළිය 01:</label>
                            <input type="text" class="form-control" id="line1">
                        </div>
                        <div class="col-12">
                            <label for="form-label">ලිපින පේළිය 02:</label>
                            <input type="text" class="form-control" id="line2">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-warning col-12" onclick="updateData();">යාවත්කාලීන කරන්න</button>
                    </div>
                </div>
            </div>
        </div>




        <!-- footer -->

        <div class=" col-12 mt-3">
            <p class="text-center">&copy; 2024 තැබෑරුම.LK || All Right Reserved</p>
        </div>

        <!-- footer -->





        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
<?php
} else {
    header("location: signIn.php");
}

?>