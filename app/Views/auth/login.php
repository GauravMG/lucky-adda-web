<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition login-page">
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
                    <div class="input-group mb-3">
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row non-otp-container">
                        <div class="col-4 offset-4">
                            <button type="button" class="btn btn-primary btn-block" onclick="onClickSendOTP()">Send OTP</button>
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
                                <button type="button" class="btn btn-primary btn-block" onclick="onClickSignInWithOTP()">Sign In</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary btn-block" onclick="onClickSendOTP()">Resend OTP</button>
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

    <script>
        const jwtToken = localStorage.getItem("jwtToken")
        if ((jwtToken ?? "").trim() !== "") {
            window.location.href = "/"
        }

        var isResend = false

        function onClickSendOTP() {
            const mobile = document.getElementById("mobile").value
            
            if ((mobile ?? "").trim().length !== 10) {
                alert("Please enter a valid mobile number")
                return
            }
            
            $.ajax({
                url: `https://impactadvisoryservices.com/v1/auth/send-otp`,
                method: 'POST',
                data: {
                    mobile,
                    verificationType: "login_otp",
                    isResend
                },
                beforeSend: function () {
                },
                complete: function () {
                },
                success: function (response) {
                    if (response.success) {
                        isResend = true

                        alert(`And OTP (${response.data.otp}) has been sent your mobile number`)
                        
                        document.querySelectorAll('.non-otp-container').forEach(element => {
                            element.style.display = 'none';
                        });
                        document.querySelectorAll('.otp-container').forEach(element => {
                            element.style.display = 'block';
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.log('Error:', error)
                }
            })
        }

        function onClickSignInWithOTP() {
            const mobile = document.getElementById("mobile").value
            const otp = document.getElementById("otp").value
            
            if ((mobile ?? "").trim().length !== 10) {
                alert("Please enter a valid mobile number")
                return
            }
            
            if ((otp ?? "").trim().length !== 6) {
                alert("Please enter a valid OTP")
                return
            }
            
            $.ajax({
                url: `https://impactadvisoryservices.com/v1/auth/sign-in-with-otp`,
                method: 'POST',
                data: {
                    mobile,
                    otp: otp,
                    deviceType: "android",
                    deviceId: "123456",
                    fcmToken: ""
                },
                beforeSend: function () {
                },
                complete: function () {
                },
                success: function (response) {
                    if (response.success) {
                        localStorage.setItem("jwtToken", response.jwtToken)
                        localStorage.setItem("userData", response.data)

                        window.location.href = "/"
                    }
                },
                error: function (xhr, status, error, message) {
                    alert("Invalid OTP entered")
                }
            })
        }
    </script>
</body>

</html>