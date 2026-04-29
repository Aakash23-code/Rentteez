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

                    <div id="step-1">
                        <form action="#" method="POST" class="text-start mb-2">
                            <div class="mb-2">
                                <label class="form-label" for="recover-email">Email Address</label>
                                <input type="email" id="recover-email" name="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-primary" type="button" id="send-reset-otp">Send Reset OTP</button>
                            </div>
                        </form>
                    </div>

                    <div id="step-2" style="display: none;">
                        <form action="#" method="POST" class="text-start mb-2">
                            <div class="mb-2">
                                <label class="form-label" for="reset-otp">Enter OTP</label>
                                <input type="text" id="reset-otp" name="otp" class="form-control" placeholder="Enter 6-digit OTP" required>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-primary" type="button" id="verify-reset-otp">Verify OTP</button>
                            </div>
                        </form>
                    </div>

                    <div id="step-3" style="display: none;">
                        <form action="#" method="POST" class="text-start mb-2">
                            <div class="mb-2">
                                <label class="form-label" for="new-password">New Password</label>
                                <input type="password" id="new-password" name="new_password" class="form-control" placeholder="Enter new password" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="confirm-new-password">Confirm Password</label>
                                <input type="password" id="confirm-new-password" name="confirm_new_password" class="form-control" placeholder="Confirm new password" required>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-primary" type="submit">Update Password</button>
                            </div>
                        </form>
                    </div>

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
        document.getElementById('send-reset-otp').addEventListener('click', function() {
            const email = document.getElementById('recover-email').value;
            if(email.includes('@')) {
                Swal.fire({
                    icon: 'success',
                    title: 'OTP Sent!',
                    text: 'A reset code has been sent to ' + email,
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    document.getElementById('step-1').style.display = 'none';
                    document.getElementById('step-2').style.display = 'block';
                });
            } else {
                Swal.fire({ icon: 'error', title: 'Invalid Email', text: 'Please enter a valid email address' });
            }
        });

        document.getElementById('verify-reset-otp').addEventListener('click', function() {
            const otp = document.getElementById('reset-otp').value;
            if(otp.length >= 4) {
                Swal.fire({
                    icon: 'success',
                    title: 'OTP Verified!',
                    text: 'Now you can set your new password.',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    document.getElementById('step-2').style.display = 'none';
                    document.getElementById('step-3').style.display = 'block';
                });
            } else {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Please enter a valid OTP' });
            }
        });
    </script>

</body>



</html>