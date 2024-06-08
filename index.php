<?php
include "connection.php"
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">  

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">   
    <link rel="stylesheet" href="style.css" />
    <title>තැබෑරුම.LK</title> 
    <link rel="icon" href="Resources/bar.png" /> 
    
    
</head>

<body onload="loadProduct(0);"> 
    <!-- nav bar -->
    <?php include "navBar.php" ?>
    <!-- nav bar -->
    <!-- Basic search -->
    <div class="container d-flex justify-content-end mt-5">
        <div class="col-3 mt-3">
            <input type="text" class="form-control" placeholder="නිෂ්පාදන නාමය" id="product" onkeyup="searchProduct(0)">
        </div>
        <div>
            <button class="btn btn-info mt-3" onclick="viewFilter();">පෙරහනය වීම</button>
            
            
        </div>
    </div>
    <!-- basic search -->


    <!-- Advance Search -->
    <div class="d-none" id="filterId">
            <div class="card mb-5">
                <div class="card-header bg-danger rounded-3 text-center"> 
                උසස් සෙවුම
                </div>
                <div class="card-body">



                    <div class="border border-danger mt-4 p-5  mb-5 rounded-4">
                        <div class="row">


                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <label class="form-label col-3">වර්ණයන් </label>
                                <select class="form-select  col-9 text-center" id="color">
                                    <option value="0">වර්ණය තෝරන්න</option>

                                    <?php
                                    $rs1 = Database::search("SELECT * FROM color");
                                    $num1 = $rs1->num_rows;

                                    for ($i = 0; $i < $num1; $i++) {
                                        $d1 = $rs1->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d1["color_id"] ?>"><?php echo $d1["color_name"] ?></option>
                                    <?php
                                    }
                                    ?>


                                </select>
                            </div>




                            <div class="col-lg-6 col-md-12 col-sm-12 ">
                                <label class="form-label col-3">වර්ගය</label>
                                <select class="form-select  col-9 text-center" id="cat">
                                    <option value="0">වර්ගය තෝරන්න</option>

                                    <?php
                                    $rs2 = Database::search("SELECT * FROM category");
                                    $num2 = $rs2->num_rows;

                                    for ($i = 0; $i < $num2; $i++) {
                                        $d2 = $rs2->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d2["cat_id"] ?>"><?php echo $d2["cat_name"] ?></option>  
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>



                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                                <label class="form-label col-3">වෙළඳ නාමය</label>
                                <select class="form-select  col-9 text-center" id="brand">
                                    <option value="0">වෙළඳ නාමය තෝරන්න</option>
                                    <?php
                                    $rs3 = Database::search("SELECT * FROM brand");
                                    $num3 = $rs3->num_rows;

                                    for ($i = 0; $i < $num3; $i++) {
                                        $d3 = $rs3->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d3["brand_id"] ?>"><?php echo $d3["brand_name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 mt-3 ">
                                <label class="form-label col-3">ප්‍රමාණය </label>
                                <select class="form-select  col-9 text-center" id="size">
                                    <option value="0">ප්‍රමාණය තෝරන්න</option>
                                    <?php
                                    $rs4 = Database::search("SELECT * FROM size");
                                    $num4 = $rs4->num_rows;

                                    for ($i = 0; $i < $num4; $i++) {
                                        $d4 = $rs4->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d4["size_id"] ?>"><?php echo $d4["size_name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>



                            <div class="col-lg-6 col-md-12 col-sm-12 mt-4">
                                <input type="text" class="form-control" placeholder="අවම මිල" id="min" />
                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12 mt-4 ">
                                <input type="text" class="form-control" placeholder="උපරිම මිල" id="max" />
                            </div>


                            <div class="col-12 d-flex justify-content-center align-items-center mt-4">
                                <button class="btn btn-light col-lg-3 col-sm-4 col-md-4 " onclick="advSearchProduct(0);"> සෙවීම</button> 
                            </div>

                        </div>    

                    </div>
                </div>

            </div>

        </div>
        <!-- Advance Search -->


    <!-- load product -->

    <div class="row col-10 offset-1" id="pid">



    </div>
    <!-- load product -->




    <!-- footer -->

    <div class=" col-12 mt-3">
        <p class="text-center">&copy; 2024 තැබෑරුම.LK  || All Right Reserved</p>
    </div>

    <!-- footer -->





    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>