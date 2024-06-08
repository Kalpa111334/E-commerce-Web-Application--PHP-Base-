<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />  
    
    <title>තැබෑරුම.LK</title>
    <link rel="icon" href="Resources/bar.png" />
</head>

<body class="adminSignInBody">

    <div class="adminSignIn_Box">
        <h2 class="text-center">පරිපාලක පිවිසුම</h2> 

        <div class="mt-3">
            <label for="form-label">පරිශීලක නාමය</label>
            <input type="text" class="form-control border-black" placeholder=" Ex: kalpa" id="un"/>
        </div>

        <div class="mt-3 mb-3">
            <label for="form-label">මුරපදය</label>
            <input type="password" class="form-control border-black" placeholder=" Ex: *****" id="pw"/>
        </div>
        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>
        
        <div class="mt-4">
            <button class="btn btn-danger col-12" onclick="adminSignIn();"> පුරනය වන්න</button>
        </div>

    </div>

    <script src="script.js"></script>

</body>

</html>