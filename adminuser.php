<?php

session_start();

if (isset($_SESSION["a"])) {


?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <title>තැබෑරුම.LK | Admin Dashboard</title>
        <link rel="icon" href="Resources/bar.png" />
    </head>

    <body class="adminBody" onload="loadUser();">
        <!-- nav bar -->
        <?php include "adminNavBar.php" ?>
        <!-- nav bar -->

        <div class="col-10">
            <h2 class="text-center">පරිශීලක කළමනාකරණය</h2> 

            <div class="row d-flex justify-content-end mt-4">

                <div class="d-none" id="msgDiv" onclick="reload();">
                <div class="alert alert-danger" id="msg"></div>
            </div>

                <div class="col-2">
                    <input type="text" class="form-control" placeholder="පරිශීලක ID" id="uid"/>
                </div>

                <button class="btn btn-warning col-2" onclick="updateUserStatus();">තත්ත්වය වෙනස් කරන්න</button>  
            </div>

                <div class="mt-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">පරිශීලක ID</th>
                                <th scope="col">මුල් නම</th>
                                <th scope="col">අවසන් නම</th>
                                <th scope="col">ඊතැපැල් ලිපිනය</th>
                                <th scope="col">දුරකථන අංකය</th>
                                <th scope="col">තත්ත්වය</th>
                            </tr>
                        </thead>
                        <tbody id="tb">
                            <!-- Table Row -->
                            <!-- Table Row -->
                        </tbody>
                    </table>
                </div>

        </div>







        <!-- footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 තැබෑරුම.LK  || All Right Reserved</p>
        </div>
        <!-- footer -->

    </body>

    </html>

<?php
    // Load Page
} else {
    echo ("ඔබ වලංගු පරිපාලකයෙක් නොවේ");
}

?>