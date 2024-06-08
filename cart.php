<?php

session_start();
include "connection.php";

$user = $_SESSION["u"];

if (isset($user)) {

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

    <body onload="loadCart();">

        <!-- Navbar -->
        <?php include "navBar.php"; ?>
        <!-- Navbar -->

        <div class="container">
            <div class="row" id="cartBody">

            
            
            </div>
        </div>


        <script src="script.js"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php

} else {
    header("location: signin.php");
}


?>

