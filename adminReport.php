<?php

session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>තැබෑරුම.LK  - Admin Dashboard</title>
        <link rel="icon" href="Resources/bar.png" />
    </head>

    <body class="adminBody">
        <?php
        include "adminNavBar.php"
        ?>
        <div class="col-10">
            <h1 class="text-center">වාර්තා</h1>

            <div class="row mt-5">
                <div class="col-4">
                    <a href="adminReportStock.php"><button class="btn btn-info col-12">කොටස් වාර්තාව</button></a>
                </div>
                <div class="col-4">
                    <a href="adminReportProduct.php"><button class="btn btn-info col-12">නිෂ්පාදන වාර්තාව</button></a>
                </div>
                <div class="col-4">
                    <a href="adminReportUser.php"><button class="btn btn-info col-12">පරිශීලක වාර්තාව</button></a>
                </div>

            </div>

            <script src="script.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("ඔබ වලංගු පරිපාලකයෙක් නොවේ");
}
