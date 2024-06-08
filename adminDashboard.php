<?php

session_start();

if (isset($_SESSION["a"])) {

?>

    <!-- Load Page -->
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>තැබෑරුම.LK | Admin Dashboard</title>
        <link rel="icon" href="Resources/bar.png" />
    </head>

    <body class="adminBody p-3" onload="loadChart();">

        <!-- nav Bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav Bar -->

        <!-- Chart -->
        <div class="col-lg-12 p-3 d-flex justify-content-center">
            <div class="bg-white p-5 shadow-lg border border-3 rounded-5" style="width: 500px;">
                <h2 class="text-center text-black">වැඩිපුරම අලෙවි වූ නිෂ්පාදනය</h2>
                <canvas id="myChart">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis, vero id? Dignissimos aperiam facilis esse natus odio, nihil facere velit accusantium, magni temporibus eius? Nam hic ad voluptatum tenetur rerum.</canvas>
            </div>
        </div> 

        <!-- Chart -->

        <!-- footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy;2024 තැබෑරුම.LK || All Right Reserved</p>
        </div>
        <!-- footer -->


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("ඔබ වලංගු පරිපාලකයෙක් නොවේ");
}


?>