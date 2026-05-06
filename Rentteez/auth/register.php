<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title>Sign Up | Rentteez</title>
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

                    <h3 class="fw-semibold mb-2">Create Your Account</h3>
                    <p class="text-muted mb-3">Join the modern rental ecosystem.</p>

                    <form action="#" method="POST" class="text-start mb-2">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label class="form-label" for="fullname">Full Name</label>
                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter full name" required>
                            </div>
                            
                            <div class="col-md-6 mb-2">
                                <label class="form-label" for="mobile">Mobile Number</label>
                                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile number" required>
                            </div>
                            
                            <div class="col-md-6 mb-2">
                                <label class="form-label">&nbsp;</label>
                                <button type="button" class="btn btn-soft-primary w-100" id="send-otp">Send OTP</button>
                            </div>

                            <div class="col-md-12 mb-2" id="otp-field" style="display: none;">
                                <label class="form-label" for="otp">Enter OTP</label>
                                <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter verification OTP">
                            </div>

                            <div class="col-md-12 mb-2">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email address" required>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                <div class="progress mt-1" style="height: 3px;">
                                    <div id="strength-bar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                                </div>
                                <small id="strength-text" class="text-muted fs-11">Strength: Too short</small>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label class="form-label" for="confirm_password">Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm" required>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label class="form-label" for="state">State</label>
                                <select id="state" name="state" class="form-select" required>
                                    <option value="">Select State</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="TamilNadu">Tamil Nadu</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-2">
                                <label class="form-label" for="location">City / Location</label>
                                <select id="location" name="city" class="form-select" disabled required>
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="terms" required>
                                <label class="form-check-label" for="terms">I agree to the <a href="#!" class="link-dark text-decoration-underline">Terms & Condition</a></label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit" id="register-btn" disabled>Register Account</button>
                        </div>
                    </form>

                    <p class="fs-14 mb-0">Already have an account? <a href="login.php" class="fw-semibold text-dark ms-1">Login !</a></p>

                    <script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-app-compat.js"></script>
                    <script src="https://www.gstatic.com/firebasejs/10.8.0/firebase-auth-compat.js"></script>

                    <script>
                        // Firebase Configuration
                        const firebaseConfig = {
                            apiKey: "AIzaSyAx0KYL3tLqlzhIriFX16vXqe3AGCTDKmQ",
                            authDomain: "rentteez.firebaseapp.com",
                            projectId: "rentteez",
                            storageBucket: "rentteez.firebasestorage.app",
                            messagingSenderId: "611185590186",
                            appId: "1:611185590186:web:34194c5c0b8d8aaf0335d3",
                            measurementId: "G-GNQJ3MT5RD"
                        };

                        // Initialize Firebase
                        firebase.initializeApp(firebaseConfig);
                        const auth = firebase.auth();

                        // Invisible ReCaptcha
                        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('send-otp', {
                            'size': 'invisible',
                            'callback': (response) => {
                                // reCAPTCHA solved
                            }
                        });

                        let confirmationResult;
                        let isOtpVerified = false;

                        const cityData = {
                            'Maharashtra': ['Mumbai', 'Pune', 'Nagpur', 'Nashik', 'Aurangabad'],
                            'Delhi': ['New Delhi', 'North Delhi', 'South Delhi', 'East Delhi', 'West Delhi'],
                            'Karnataka': ['Bangalore', 'Mysore', 'Hubli-Dharwad', 'Mangalore'],
                            'Gujarat': ['Ahmedabad', 'Surat', 'Vadodara', 'Rajkot'],
                            'TamilNadu': ['Chennai', 'Coimbatore', 'Madurai', 'Tiruchirappalli']
                        };

                        const stateSelect = document.getElementById('state');
                        const citySelect = document.getElementById('location');
                        const passwordInput = document.getElementById('password');
                        const confirmInput = document.getElementById('confirm_password');
                        const strengthBar = document.getElementById('strength-bar');
                        const strengthText = document.getElementById('strength-text');
                        const registerBtn = document.getElementById('register-btn');

                        stateSelect.addEventListener('change', function() {
                            const selectedState = this.value;
                            citySelect.innerHTML = '<option value="">Select City</option>';
                            if (selectedState && cityData[selectedState]) {
                                citySelect.disabled = false;
                                cityData[selectedState].forEach(city => {
                                    const option = document.createElement('option');
                                    option.value = city;
                                    option.textContent = city;
                                    citySelect.appendChild(option);
                                });
                            } else {
                                citySelect.disabled = true;
                            }
                        });

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
                                strengthText.className = 'text-danger fs-11';
                            } else if (strength <= 70) {
                                strengthBar.className = 'progress-bar bg-warning';
                                strengthText.innerText = 'Strength: Medium';
                                strengthText.className = 'text-warning fs-11';
                            } else {
                                strengthBar.className = 'progress-bar bg-success';
                                strengthText.innerText = 'Strength: Strong';
                                strengthText.className = 'text-success fs-11';
                            }
                            validateForm();
                        });

                        confirmInput.addEventListener('input', validateForm);
                        document.getElementById('terms').addEventListener('change', validateForm);

                        function validateForm() {
                            const passwordsMatch = passwordInput.value === confirmInput.value;
                            const passwordValid = passwordInput.value.length >= 6;
                            const termsAccepted = document.getElementById('terms').checked;
                            
                            if (passwordsMatch && passwordValid && termsAccepted && isOtpVerified) {
                                registerBtn.disabled = false;
                            } else {
                                registerBtn.disabled = true;
                            }
                        }

                        // Send OTP Logic
                        document.getElementById('send-otp').addEventListener('click', function() {
                            let mobile = document.getElementById('mobile').value;
                            if(mobile.length >= 10) {
                                if(!mobile.startsWith('+')) mobile = '+91' + mobile; 

                                auth.signInWithPhoneNumber(mobile, window.recaptchaVerifier)
                                    .then((result) => {
                                        confirmationResult = result;
                                        document.getElementById('otp-field').style.display = 'block';
                                        this.innerText = 'Resend OTP';
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'OTP Sent!',
                                            text: 'A verification code has been sent to ' + mobile,
                                            timer: 2000,
                                            showConfirmButton: false
                                        });
                                    }).catch((error) => {
                                        console.error(error);
                                        Swal.fire({ icon: 'error', title: 'Error', text: error.message });
                                    });
                            } else {
                                Swal.fire({ icon: 'error', title: 'Invalid Number', text: 'Please enter a valid 10-digit mobile number' });
                            }
                        });

                        // Verify OTP Logic
                        document.getElementById('otp').addEventListener('input', function() {
                            const otp = this.value;
                            if(otp.length === 6) {
                                confirmationResult.confirm(otp).then((result) => {
                                    isOtpVerified = true;
                                    window.firebase_uid = result.user.uid;
                                    this.classList.add('is-valid');
                                    this.disabled = true;
                                    document.getElementById('send-otp').disabled = true;
                                    Swal.fire({ icon: 'success', title: 'Verified!', text: 'Mobile number verified.', timer: 1500, showConfirmButton: false });
                                    validateForm();
                                }).catch((error) => {
                                    Swal.fire({ icon: 'error', title: 'Invalid OTP', text: 'Please check the code.' });
                                });
                            }
                        });

                        // AJAX Registration
                        document.querySelector('form').addEventListener('submit', function(e) {
                            e.preventDefault();
                            const formData = new FormData(this);
                            formData.append('action', 'register');
                            formData.append('firebase_uid', window.firebase_uid);

                            fetch('auth_handler.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(res => res.json())
                            .then(data => {
                                if(data.status === 'success') {
                                    Swal.fire({ icon: 'success', title: 'Success', text: data.message }).then(() => {
                                        window.location.href = 'login.php';
                                    });
                                } else {
                                    Swal.fire({ icon: 'error', title: 'Error', text: data.message });
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                Swal.fire({ icon: 'error', title: 'Error', text: 'Something went wrong!' });
                            });
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>
    <!-- SweetAlert2 js -->
    <script src="../assets/vendor/sweetalert2/sweetalert2.min.js"></script>
    <script src="../assets/js/app.js"></script>

</body>

</html>