<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title>Reset Password | Rentteez</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Rentteez - Modern Rental Ecosystem" name="description" />
    <meta content="Rentteez" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <script src="../assets/js/config.js"></script>
    <link href="../assets/css/vendor.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="h-100">

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-2">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center p-3 mb-0">
                    <a href="index.html" class="auth-brand mb-3">
                        <img src="../assets/images/Logo/Main-logo-dark.png" alt="dark logo" height="24" class="logo-dark">
                        <img src="../assets/images/Logo/main-logo-light.png" alt="logo light" height="24" class="logo-light">
                    </a>

                    <h3 class="fw-semibold mb-2">Set New Password</h3>
                    <p class="text-muted mb-4">Please create a strong new password for your Rentteez account.</p>

                    <form action="login.php" method="POST" class="text-start mb-2">
                        <div class="mb-3 text-start">
                            <label class="form-label" for="new-password">New Password</label>
                            <input type="password" id="new-password" name="password" class="form-control" placeholder="Enter new password" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label" for="confirm-password">Confirm New Password</label>
                            <input type="password" id="confirm-password" name="confirm_password" class="form-control" placeholder="Re-enter password" required>
                        </div>
                        <div class="mb-3 d-grid">
                            <button class="btn btn-primary" type="submit">Update Password</button>
                        </div>
                    </form>

                    <p class="text-danger fs-14 mb-2">Back To <a href="login.php" class="fw-semibold text-dark ms-1">Login</a></p>


                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>
    <script src="../assets/vendor/sweetalert2/sweetalert2.min.js"></script>
    <script src="../assets/js/app.js"></script>

</body>



</html>