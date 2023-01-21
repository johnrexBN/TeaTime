<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background: #fff;

    }

    .container {
        display: flex;
        flex-flow: column;
        height: 100%;
        align-items: space-around;
        justify-content: center;
    }

    .userInput {
        display: flex;
        justify-content: center;
    }

    input {
        height: 35px;
        width: 52px;
        border: none;
        border-radius: 5px;
        text-align: center;
        font-family: arimo;
        font-size: 1.2rem;
        background: #eef2f3;

    }

    h1 {
        text-align: center;
        font-family: arimo;
        color: honeydew;
    }
</style>

<body>
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center
      min-vh-100 g-0">
            <div class="col-12 col-md-8 col-lg-4 border-top border-3 border-primary">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 style="text-align: center;"><strong> Verify OTP!</strong></h5>
                            <p>
                                <?php $validation = session()->get('validation')?>
                                <?= isset($validation) ? $validation : '' ?>
                            </p>
                            <br>
                            <p class="mb-2">Your One Time Password has been sent through your <?= session('email') ?>. Please enter the number below.
                            </p>
                        </div>
                       
                        <form action="<?php if(session()->getFlashdata('registration')) { echo "verifyOtp"; } else{echo "otp";} ?>" method="post">
                            <div class="mb-3">
                                <div><label class="form-label">OTP number</label></div>
                                <input type="number" name="otp[]" id='ist' maxlength="1" onkeyup="clickEvent(this,'sec')">
                                <input type="number" name="otp[]" id="sec" maxlength="1" onkeyup="clickEvent(this,'third')">
                                <input type="number" name="otp[]" id="third" maxlength="1" onkeyup="clickEvent(this,'fourth')">
                                <input type="number" name="otp[]" id="fourth" maxlength="1" onkeyup="clickEvent(this,'fifth')">
                                <input type="number" name="otp[]" id="fifth" maxlength="1" onkeyup="clickEvent(this,'sixth')">
                                <input type="number" name="otp[]" id="sixth" maxlength="1">
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Verify OTP
                                </button>
                            </div>
                            <span>Didn't receive an email?</span>
                            <a href="otp" id="resend-button" disabled>Resend</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
<script>
    // Set the date we're counting down to
    var countDownDate = new Date().getTime() + 60000;

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // If the count down is over, enable the button
        if (distance < 0) {
            $('#resend-button').removeAttr('disabled');
            clearInterval(x);
        }
    }, 1000);
</script>
<script>
    function clickEvent(first, last) {
        if (first.value.length) {
            document.getElementById(last).focus();
        }
    }
</script>

</html>