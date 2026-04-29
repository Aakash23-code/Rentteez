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
                                <select id="location" name="location" class="form-select" disabled required>
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
                            <button class="btn btn-primary" type="submit" id="register-btn">Register Account</button>
                        </div>
                    </form>

                    <p class="fs-14 mb-0">Already have an account? <a href="login.php" class="fw-semibold text-dark ms-1">Login !</a></p>

                    <script>
                        const cityData = {
                            'Maharashtra': ['Mumbai', 'Pune', 'Nagpur', 'Nashik', 'Aurangabad'],
                            'Delhi': ['New Delhi', 'North Delhi', 'South Delhi', 'East Delhi', 'West Delhi'],
                            'Karnataka': ['Bangalore', 'Mysore', 'Hubli-Dharwad', 'Mangalore'],
                            'Gujarat': ['Ahmedabad', 'Surat', 'Vadodara', 'Rajkot'],
                            'TamilNadu': ['Chennai', 'Coimbatore', 'Madurai', 'Tiruchirappalli']
                        };

                        const stateSelect = document.getElementById('state');
                        const citySelect = document.getElementById('location');

                        stateSelect.addEventListener('change', function() {
                            const selectedState = this.value;
                            
                            // Clear existing options
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

                        document.getElementById('send-otp').addEventListener('click', function() {
                            const mobile = document.getElementById('mobile').value;
                            if(mobile.length >= 10) {
                                document.getElementById('otp-field').style.display = 'block';
                                this.innerText = 'Resend OTP';
                                Swal.fire({
                                    icon: 'success',
                                    title: 'OTP Sent!',
                                    text: 'A verification code has been sent to your mobile.',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Invalid Number',
                                    text: 'Please enter a valid 10-digit mobile number'
                                });
                            }
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