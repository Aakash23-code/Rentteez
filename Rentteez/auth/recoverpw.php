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
    <!-- SweetAlert2 css -->
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

                    <h3 class="fw-semibold mb-2">Reset Your Password</h3>

                    <p class="text-muted mb-3">Please enter your email address to request a password reset.</p>

                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <a href="#!" class="btn btn-soft-danger avatar-md"><i class="ti ti-brand-google-filled fs-18"></i></a>
                        <a href="#!" class="btn btn-soft-success avatar-md"><i class="ti ti-brand-apple fs-18"></i></a>
                        <a href="#!" class="btn btn-soft-primary avatar-md"><i class="ti ti-brand-facebook fs-18"></i></a>
                        <a href="#!" class="btn btn-soft-info avatar-md"><i class="ti ti-brand-linkedin fs-18"></i></a>
                    </div>

                    <form action="verify-otp.php" method="POST" class="text-start mb-2">
                        <div class="mb-3 text-center">
                            <label class="form-label d-block mb-2">How would you like to recover?</label>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="recovery_method" id="method-email" value="email" checked>
                                    <label class="form-check-label" for="method-email">Email</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="recovery_method" id="method-mobile" value="mobile">
                                    <label class="form-check-label" for="method-mobile">Mobile</label>
                                </div>
                            </div>
                        </div>

                        <div id="email-field" class="mb-3">
                            <label class="form-label" for="recover-email">Email Address</label>
                            <input type="email" id="recover-email" name="email" class="form-control" placeholder="Enter your registered email">
                        </div>

                        <div id="mobile-field" class="mb-3" style="display: none;">
                            <label class="form-label" for="recover-mobile">Mobile Number</label>
                            <input type="text" id="recover-mobile" name="mobile" class="form-control" placeholder="Enter your registered mobile">
                        </div>

                        <div class="d-grid mt-3">
                            <button class="btn btn-primary" type="submit" id="send-btn">Send Reset Link</button>
                        </div>
                    </form>

                    <p class="text-danger fs-14 mb-2">Back To <a href="login.php" class="fw-semibold text-dark ms-1">Login !</a></p>


                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>
    <!-- SweetAlert2 js -->
    <script src="../assets/vendor/sweetalert2/sweetalert2.min.js"></script>
    <script src="../assets/js/app.js"></script>

    <script>
        const emailRadio = document.getElementById('method-email');
        const mobileRadio = document.getElementById('method-mobile');
        const emailField = document.getElementById('email-field');
        const mobileField = document.getElementById('mobile-field');
        const sendBtn = document.getElementById('send-btn');

        function toggleFields() {
            if (emailRadio.checked) {
                emailField.style.display = 'block';
                mobileField.style.display = 'none';
                sendBtn.innerText = 'Send Reset Link';
            } else {
                emailField.style.display = 'none';
                mobileField.style.display = 'block';
                sendBtn.innerText = 'Send OTP';
            }
        }

        emailRadio.addEventListener('change', toggleFields);
        mobileRadio.addEventListener('change', toggleFields);
    </script>

</body>



</html>