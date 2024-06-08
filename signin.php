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

<body class="signIn_Body">

    <!-- Sign In Box -->
    <div class="signIn_Box" id="signInBox">
        <h2 class="text-center">පුරනය වන්න </h2>

        <?php

        $email = "";
        $password = "";

        if (isset($_COOKIE["email"])) {
            $email = $_COOKIE["email"];
        }

        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];   
        }

        ?>

        <div class="mt-3">
            <label for="form-label">ඊතැපැල් ලිපිනය:</label>
            <input type="text" class="form-control" id="e" value="<?php echo $email ?>"/>
        </div>
        <div class="mt-2">
            <label for="form-label">මුරපදය:</label>
            <input type="password" class="form-control" id="pw" value="<?php echo $password ?>"/>
            <a href="password.php" >මුරපදය අමතක වුණා ද?</a> 
        </div>
        <div class="mt-2 mb-2">
            <input type="checkbox" class="form-check-input" id="rm" />
            <label for="form-label">හොඳින් මතක තබා ගත යුතුයි</label>
            
        </div>
        <div class="d-none " id="msgDiv2">
            <div class="alert alert-danger" id="msg2">පුරනය වන්න</div>
        </div>
        <div class="mt-2">
            <button class="btn btn-danger col-12" onclick="signIn();">පුරනය වන්න</button>
        </div>
        <div class="mt-2">
            <button class="btn btn-success col-12" onclick="changeView();">තැබෑරුම.LK වෙත අලුත්ද? කරුණාකර ලියාපදිංචි වන්න.</button>
        </div>
    </div>
    <!--sign in box--->


    <!-- Sign Up Box -->
    <div class="signUp_Box d-none" id="signUpBox">
        <h1 class="text-center">ලියාපදිංචි වන්න</h1>

        <div class="row">

            <div class="mt-3 col-6">
                <label for="form-label">මුල් නම:</label>
                <input type="text" class="form-control" id="fname" />
            </div>

            <div class="mt-3 col-6">
                <label for="form-label">අවසන් නම:</label>
                <input type="text" class="form-control" id="lname" />
            </div>

        </div>

        <div class="mt-3">                 
            <label for="form-label">ඊතැපැල් ලිපිනය:</label>
            <input type="email" class="form-control" id="email" />
        </div>

        <div class="mt-3">
            <label for="form-label">දුරකථන අංකය:</label>
            <input type="text" class="form-control" id="mobile" />
        </div>

        <div class="mt-3">
            <label for="form-label">පරිශීලක නාමය:</label>
            <input type="text" class="form-control" id="username" />
        </div>

        <div class="mt-3 mb-3">
            <label for="form-label">මුරපදය:</label>  
            <input type="password" class="form-control" id="password" /> 
        </div>

        <div class="d-none" id="msgDiv1">
            <div class="alert alert-green" id="msg1"></div> 
        </div>

        <div class="mt-2">
            <button class="btn btn-danger col-12" onclick="signUp();">ලියාපදිංචි වන්න</button>
        </div>
        <div class="mt-2">
            <button class="btn btn-success col-12" onclick="changeView();">දැනටමත් ගිණුමක් තිබේද? කරුණාකර පුරනය වන්න</button>
        </div>

    </div>
    <!--sign up box--->

    <script src="script.js"></script>
</body>

</html>