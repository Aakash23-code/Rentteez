<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title>Log In | Rentteez</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Rentteez - Modern Rental Ecosystem" name="description" />
    <meta content="Rentteez" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="../assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="../assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-2">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center p-3 mb-0">
                    <a href="index.html" class="auth-brand mb-3">
                        <img src="../assets/images/Logo/Main-logo-dark.png" alt="dark logo" height="24" class="logo-dark">
                        <img src="../assets/images/Logo/main-logo-light.png" alt="logo light" height="24" class="logo-light">
                    </a>

                    <h3 class="fw-semibold mb-2">Login your account</h3>

                    <p class="text-muted mb-3">Enter your email address and password to access admin panel.</p>

                    <div class="d-flex justify-content-center gap-2 mb-2">
                        <a href="#!" class="btn btn-soft-danger avatar-md"><i class="ti ti-brand-google-filled fs-18"></i></a>
                        <a href="#!" class="btn btn-soft-success avatar-md"><i class="ti ti-brand-apple fs-18"></i></a>
                        <a href="#!" class="btn btn-soft-primary avatar-md"><i class="ti ti-brand-facebook fs-18"></i></a>
                        <a href="#!" class="btn btn-soft-info avatar-md"><i class="ti ti-brand-linkedin fs-18"></i></a>
                    </div>

                    <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active py-1 px-3 fs-13" id="pills-email-tab" data-bs-toggle="pill" data-bs-target="#pills-email" type="button" role="tab" aria-controls="pills-email" aria-selected="true">Email</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link py-1 px-3 fs-13" id="pills-otp-tab" data-bs-toggle="pill" data-bs-target="#pills-otp" type="button" role="tab" aria-controls="pills-otp" aria-selected="false">Mobile OTP</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <!-- Email Login Tab -->
                        <div class="tab-pane fade show active" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab" tabindex="0">
                            <form action="#" method="POST" class="text-start mb-2">
                                <div class="mb-2">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                                </div>

                                <div class="mb-2">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" class="form-check-input" id="checkbox-signin">
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                    <a href="recoverpw.php" class="text-muted border-bottom border-dashed">Forgot Password?</a>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </form>
                        </div>

                        <!-- OTP Login Tab -->
                        <div class="tab-pane fade" id="pills-otp" role="tabpanel" aria-labelledby="pills-otp-tab" tabindex="0">
                            <form action="#" method="POST" class="text-start mb-2">
                                <div class="mb-2">
                                    <label class="form-label" for="mobile">Mobile Number</label>
                                    <div class="input-group">
                                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter mobile number" required>
                                        <button class="btn btn-soft-primary" type="button" id="send-otp">Send OTP</button>
                                    </div>
                                </div>

                                <div class="mb-2" id="otp-field" style="display: none;">
                                    <label class="form-label" for="otp">OTP</label>
                                    <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter 6-digit OTP">
                                </div>

                                <div class="d-grid mt-3">
                                    <button class="btn btn-primary" type="submit" id="verify-btn" disabled>Verify & Login</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <p class="text-danger fs-14 mb-2">Don't have an account? <a href="register.php" class="fw-semibold text-dark ms-1">Sign Up !</a></p>

                    <script>
                        // Simple toggle logic for the Send OTP button
                        document.getElementById('send-otp').addEventListener('click', function() {
                            const mobile = document.getElementById('mobile').value;
                            if(mobile.length >= 10) {
                                document.getElementById('otp-field').style.display = 'block';
                                document.getElementById('verify-btn').disabled = false;
                                this.innerText = 'Resend';
                            } else {
                                alert('Please enter a valid mobile number');
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.js"></script>

</body>



</html>