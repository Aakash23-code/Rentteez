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
                            <div class="progress mt-2" style="height: 5px;">
                                <div id="strength-bar" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small id="strength-text" class="text-muted fs-12">Strength: Too short</small>
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label" for="confirm-password">Confirm New Password</label>
                            <input type="password" id="confirm-password" name="confirm_password" class="form-control" placeholder="Re-enter password" required>
                        </div>
                        <div class="mb-3 d-grid">
                            <button class="btn btn-primary" type="submit" id="submit-btn" disabled>Update Password</button>
                        </div>
                    </form>

                    <p class="text-danger fs-14 mb-2">Back To <a href="login.php" class="fw-semibold text-dark ms-1">Login</a></p>

                    <script>
                        const passwordInput = document.getElementById('new-password');
                        const confirmInput = document.getElementById('confirm-password');
                        const strengthBar = document.getElementById('strength-bar');
                        const strengthText = document.getElementById('strength-text');
                        const submitBtn = document.getElementById('submit-btn');

                        passwordInput.addEventListener('input', function() {
                            const val = this.value;
                            let strength = 0;
                            
                            if (val.length >= 6) strength += 25;
                            if (val.length >= 10) strength += 25;
                            if (/[A-Z]/.test(val)) strength += 25;
                            if (/[0-9]/.test(val)) strength += 15;
                            if (/[^A-Za-z0-9]/.test(val)) strength += 10;

                            strengthBar.style.width = strength + '%';
                            
                            if (strength <= 30) {
                                strengthBar.className = 'progress-bar bg-danger';
                                strengthText.innerText = 'Strength: Weak';
                                strengthText.className = 'text-danger fs-12';
                            } else if (strength <= 70) {
                                strengthBar.className = 'progress-bar bg-warning';
                                strengthText.innerText = 'Strength: Medium';
                                strengthText.className = 'text-warning fs-12';
                            } else {
                                strengthBar.className = 'progress-bar bg-success';
                                strengthText.innerText = 'Strength: Strong';
                                strengthText.className = 'text-success fs-12';
                            }
                            validatePasswords();
                        });

                        confirmInput.addEventListener('input', validatePasswords);

                        function validatePasswords() {
                            if (passwordInput.value === confirmInput.value && passwordInput.value.length >= 6) {
                                submitBtn.disabled = false;
                            } else {
                                submitBtn.disabled = true;
                            }
                        }
                    </script>


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