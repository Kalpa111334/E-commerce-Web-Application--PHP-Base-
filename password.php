<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>තැබෑරුම.LK</title>
    <link rel="icon" href="Resources/bar.png" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css" />
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #121212;
            margin: 0;
            color: #f8f9fa;
        }

        .modal-dialog {
            max-width: 600px;
            margin: 0 auto;
            animation: fadeIn 0.5s ease;
        }

        .modal-content {
            background-color: #1c1c1c;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .btn-close {
            background: none;
            border: none;
            color: #f8f9fa;
        }

        .btn-primary,
        .btn-danger,
        .btn-outline-secondary,
        .btn-dark,
        .btn-warning {
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #f8f9fa;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #f8f9fa;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #f8f9fa;
        }

        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
            color: #f8f9fa;
        }

        .btn-dark:hover {
            background-color: #23272b;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .form-control {
            font-size: 1.1rem;
            padding: 10px;
            height: auto;
            background-color: #343a40;
            color: #f8f9fa;
            border: 1px solid #495057;
        }

        .form-control:focus {
            background-color: #495057;
            color: #f8f9fa;
        }

        .modal-header,
        .modal-body {
            border-bottom: 1px solid #343a40;
        }

        .modal-title {
            color: #f8f9fa;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        a {
            color: #f8f9fa;
        }

        a:hover {
            color: #ffc107;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="modal-dialog">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <h5 class="modal-title">මුරපදය අමතක වුණා ද?</h5>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">ඊමේල් ඇතුලත් කරන්න</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="e" />
                                <button id="npb" class="btn btn-dark" onclick="forgotPassword();">OTP කේතය යවන්න</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">නව මුරපදය</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="np" />
                                <button id="npb" class="btn btn-dark" onclick="showPassword();">පෙන්වන්න</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">නව මුරපදය නැවත ටයිප් කරන්න</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="rnp" />
                                <button class="btn btn-dark" id="rnpb" onclick="showPassword2();">පෙන්වන්න</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">සත්‍යාපන කේතය</label>
                            <input type="text" class="form-control" id="vcode" />
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5 col-md-12">
                    <button type="button" class="btn btn-dark mx-3 col-md-4" data-bs-dismiss="modal"><a href="signin.php" class="text-decoration-none">වසන්න </a></button>
                    <button type="button" class="btn btn-warning mx-3 col-md-4" onclick="resetPassword();">යළි පිහිටුවන්න</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showPassword() {
            const passwordInput = document.getElementById('np');
            const passwordButton = document.getElementById('npb');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordButton.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                passwordButton.textContent = 'Show';
            }
        }

        function showPassword2() {
            const passwordInput = document.getElementById('rnp');
            const passwordButton = document.getElementById('rnpb');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordButton.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                passwordButton.textContent = 'Show';
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>
