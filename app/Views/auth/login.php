<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        /* Loader container (hidden by default) */
        .loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            display: none;
            /* Initially hidden */
        }

        /* Loader animation */
        .loader {
            width: 50px;
            height: 50px;
            border: 5px solid #fff;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Keyframes for rotation animation */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div id="global-loader" class="loader-overlay">
        <div class="loader"></div>
    </div>

    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Lucky Adda</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <form>
                    <?= csrf_field() ?>
                    <div class="input-group mb-3 mobile-container">
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 password-container non-otp-container">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row non-otp-container">
                        <div class="col-6">
                            <button type="button" class="btn btn-primary btn-block" onclick="onClickSignInWithOTP()">Sign In</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary btn-block" onclick="onClickForgotPassword()">Forgot Password</button>
                        </div>
                    </div>
                    <div class="otp-container" style="display: none;">
                        <div class="input-group mb-3">
                            <input type="text" name="otp" id="otp" class="form-control" placeholder="OTP" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-primary btn-block" onclick="onClickSignInWithOTP()">Verify OTP</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary btn-block" onclick="onClickForgotPassword()">Resend OTP</button>
                            </div>
                        </div>
                    </div>
                    <div class="new-password-container non-otp-container" style="display: none;">
                        <div class="input-group mb-3">
                            <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 offset-3">
                                <button type="button" class="btn btn-primary btn-block" onclick="onClickUpdateUserPassword()">Update Password</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p> -->
            </div>
        </div>
    </div>

    <!-- AdminLTE JS -->
    <script src="<?= base_url('assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        const jwtToken = localStorage.getItem("jwtToken")
        if ((jwtToken ?? "").trim() !== "") {
            window.location.href = "/games"
        }

        var isResend = false
        var isForgotPassword = false
        var newUserData = null
        var newJWTToken = null

        document.getElementById('mobile').addEventListener('input', function() {
            let inputValue = this.value;

            // If user types a non-numeric character
            if (/\D/.test(inputValue)) {
                toastr.error('Only numbers are allowed!');
                this.value = inputValue.replace(/\D/g, '');
            }

            // Limit input to 10 digits
            if (this.value.length > 10) {
                toastr.error('Only 10 digits are allowed!');
                this.value = this.value.slice(0, 10);
            }
        });

        const loader = {
            show: function() {
                document.getElementById('global-loader').style.display = 'flex';
            },
            hide: function() {
                document.getElementById('global-loader').style.display = 'none';
            }
        };

        function onClickForgotPassword() {
            isForgotPassword = true

            const mobile = document.getElementById("mobile").value

            if ((mobile ?? "").trim().length !== 10) {
                toastr.error('Please enter a valid mobile number!');
                return
            }

            $.ajax({
                url: `https://lucky-adda.com/api/v1/auth/send-otp`,
                method: 'POST',
                data: {
                    mobile,
                    verificationType: "login_otp",
                    isResend,
                    isForgotPassword
                },
                beforeSend: function() {
                    loader.show()
                },
                complete: function() {
                    loader.hide()
                },
                success: function(response) {
                    if (response.success) {
                        if (Number(response.data.roleId) !== 1) {
                            toastr.error(`You are not authorized to login!`);
                            return
                        }

                        isResend = true

                        toastr.success(`An OTP (${response.data.otp}) has been sent your mobile number!`);

                        document.querySelectorAll('.non-otp-container').forEach(element => {
                            element.style.display = 'none';
                        });
                        document.querySelectorAll('.otp-container').forEach(element => {
                            element.style.display = 'block';
                        });
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = "Something went wrong";

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        try {
                            let parsedResponse = JSON.parse(xhr.responseText);
                            errorMessage = parsedResponse.message || errorMessage;
                        } catch (e) {
                            errorMessage = xhr.responseText;
                        }
                    }

                    loader.hide();
                    toastr.error(errorMessage);
                }
            })
        }

        function onClickSignInWithOTP() {
            const mobile = document.getElementById("mobile").value
            const password = document.getElementById("password").value
            const otp = document.getElementById("otp").value

            if ((mobile ?? "").trim().length !== 10) {
                toastr.error('Please enter a valid mobile number!');
                return
            }

            if (!isForgotPassword && (password ?? "").trim() === "") {
                toastr.error('Please enter a valid password!');
                return
            }

            if (isForgotPassword && (otp ?? "").trim().length !== 6) {
                toastr.error('Please enter a valid OTP!');
                return
            }

            $.ajax({
                url: `https://lucky-adda.com/api/v1/auth/sign-in-with-otp`,
                method: 'POST',
                data: {
                    mobile,
                    otp,
                    password,
                    deviceType: "web",
                    deviceId: "web",
                    fcmToken: ""
                },
                beforeSend: function() {
                    loader.show()
                },
                complete: function() {},
                success: function(response) {
                    if (response.success) {
                        if (isForgotPassword) {
                            loader.hide()

                            newUserData = response.data
                            newJWTToken = response.jwtToken

                            document.querySelectorAll('.mobile-container').forEach(element => {
                                element.style.display = 'none';
                            });
                            document.querySelectorAll('.otp-container').forEach(element => {
                                element.style.display = 'none';
                            });
                            document.querySelectorAll('.new-password-container').forEach(element => {
                                element.style.display = 'block';
                            });
                        } else {
                            localStorage.setItem("jwtToken", response.jwtToken)
                            localStorage.setItem("userData", response.data)

                            setTimeout(() => {
                                loader.hide()
                                toastr.success(`Logged in successfully!`);
                                window.location.href = "/games"
                            }, [1000])
                        }
                    }
                },
                error: function(xhr, status, error, message) {
                    let errorMessage = "Something went wrong";

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        try {
                            let parsedResponse = JSON.parse(xhr.responseText);
                            errorMessage = parsedResponse.message || errorMessage;
                        } catch (e) {
                            errorMessage = xhr.responseText;
                        }
                    }

                    loader.hide();
                    toastr.error(errorMessage);
                }
            })
        }

        function onClickUpdateUserPassword() {
            const newPassword = document.getElementById("newPassword").value
            const confirmPassword = document.getElementById("confirmPassword").value

            if ((newPassword ?? "").trim() === "") {
                toastr.error('Please enter a valid password!');
                return
            }

            if ((confirmPassword ?? "").trim() === "") {
                toastr.error('Please enter a valid confirm password!');
                return
            }

            if (newPassword !== confirmPassword) {
                toastr.error(`Password and Confirm Password doesn't match!`);
                return
            }

            $.ajax({
                url: `https://lucky-adda.com/api/v1/user/update`,
                method: 'POST',
                data: JSON.stringify({
                    userId: newUserData.userId,
                    password: newPassword,
                }),
                contentType: 'application/json',
                headers: {
                    'Authorization': `Bearer ${newJWTToken}`
                },
                beforeSend: function() {
                    loader.show()
                },
                complete: function() {},
                success: function(response) {
                    if (response.success) {
                        localStorage.setItem("jwtToken", newJWTToken)
                        localStorage.setItem("userData", newUserData)

                        setTimeout(() => {
                            loader.hide()
                            toastr.success(`Password updated successfully!`);
                            window.location.href = "/games"
                        }, [1000])
                    }
                },
                error: function(xhr, status, error, message) {
                    let errorMessage = "Something went wrong";

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        try {
                            let parsedResponse = JSON.parse(xhr.responseText);
                            errorMessage = parsedResponse.message || errorMessage;
                        } catch (e) {
                            errorMessage = xhr.responseText;
                        }
                    }

                    loader.hide();
                    toastr.error(errorMessage);
                }
            })
        }
    </script>
</body>

</html>