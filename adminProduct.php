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
        <title>තැබෑරුම.LK </title>
        <link rel="icon" href="Resources/bar.png" />
    </head>

    <body class="adminBody">
        <!-- nav bar -->
        <?php include "adminNavBar.php" ?>
        <!-- nav bar -->

        <div class="col-10">
            <h2 class="text-center">නිෂ්පාදන කළමනාකරණය</h2>

            <div class="row">
                <!-- Brand register -->
                <div class="col-4 mt-4 offset-1">
                    <label for="form-control">වෙළඳ නාමය</label>
                    <input type="text" class="form-control mb-3" id="brand"  />

                    <div class="d-none" id="msgDiv1" onclick="reload();">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-warning col-12" onclick="brandReg();">වෙළඳ නාම ලේඛනය</button>
                    </div>

                </div>
                <!-- Brand register -->

                <!-- Catogary register -->
                <div class="col-4 mt-4 offset-2">
                    <label for="form-control">කාණ්ඩයේ නම</label>
                    <input type="text" class="form-control mb-3" id="category"/>

                    <div class="d-none" id="msgDiv2" onclick="reload();">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-warning col-12" onclick="categoryReg();">වර්ග ලේඛනය</button>
                    </div>

                </div>
                <!-- Catogary register -->
            </div>

            <div class="row mt-5">
                <!-- color register -->
                <div class="col-4 mt-4 offset-1">
                    <label for="form-control">වර්ණයන් </label>
                    <input type="text" class="form-control mb-3" id="color"/>

                    <div class="d-none" id="msgDiv3" onclick="reload();">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-warning col-12" onclick="colorReg();">වර්ණ ලේඛනය</button>
                    </div>

                </div>
                <!-- color register -->

                <!-- size register -->
                <div class="col-4 mt-4 offset-2">
                    <label for="form-control">ප්‍රමාණය </label>
                    <input type="text" class="form-control mb-3" id="size"/>

                    <div class="d-none" id="msgDiv4" onclick="reload();">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-warning col-12" onclick="sizeReg();">ප්‍රමාණයේ ලේඛනය</button>
                    </div>

                </div>
                <!-- size register -->
            </div>

            

        </div>

        <script src="script.js"></script>

    </body>

    </html>

<?php

} else {
    header("Location: adminSignIn.php");
}

?>