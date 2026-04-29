<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title>Verify OTP | Rentteez</title>
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

                    <h3 class="fw-semibold mb-2">Verify OTP</h3>
                    <p class="text-muted mb-3">A 6-digit code has been sent to your device.</p>
                    <div id="otp-timer" class="badge bg-soft-danger text-danger mb-3 p-1 px-2 fs-12">
                        Expires in <span id="timer">02:00</span>
                    </div>

                    <form action="reset-password.php" method="POST" class="text-start mb-2">
                        <div class="mb-3">
                            <label class="form-label text-center d-block" for="otp-code">Enter 6-Digit Verification Code</label>
                            <input type="text" id="otp-code" name="otp" class="form-control text-center fs-24 fw-bold letter-spacing-5" placeholder="------" maxlength="6" required>
                        </div>

                        <div class="mb-2 d-grid">
                            <button class="btn btn-primary" type="submit">Verify OTP</button>
                        </div>
                        <div class="text-center">
                            <p class="mb-1 fs-13">Don't receive code? <a href="#!" id="resend-link" class="link-primary fw-semibold text-decoration-underline disabled">Resend OTP</a></p>
                            <p class="mb-0 fs-13"><a href="recoverpw.php" class="text-muted border-bottom border-dashed small">Change Email / Mobile</a></p>
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

    <script>
        // OTP Timer Logic
        let timeLeft = 120; // 2 minutes
        const timerElement = document.getElementById('timer');
        const resendLink = document.getElementById('resend-link');

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerElement.innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                resendLink.classList.remove('disabled');
                document.getElementById('otp-timer').classList.remove('bg-soft-danger', 'text-danger');
                document.getElementById('otp-timer').classList.add('bg-soft-success', 'text-success');
                document.getElementById('otp-timer').innerText = 'You can now resend the code';
            }
            timeLeft--;
        }

        const timerInterval = setInterval(updateTimer, 1000);

        resendLink.addEventListener('click', function(e) {
            if (this.classList.contains('disabled')) return;
            Swal.fire({
                icon: 'success',
                title: 'OTP Resent!',
                text: 'A new verification code has been sent.',
                timer: 2000,
                showConfirmButton: false
            });
            // Reset timer logic would go here
        });
    </script>

</body>



</html>