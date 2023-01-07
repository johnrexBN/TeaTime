<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center
      min-vh-100 g-0">
            <div class="col-12 col-md-8 col-lg-4 border-top border-3 border-primary">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 style="text-align: center;"><strong> Verify OTP!</strong></h5>
                            <br>
                            <p class="mb-2">Your One Time Password has been sent through your email. Please enter the number below.
                            </p>
                        </div>
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">OTP number</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Enter OTP number" required="">
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">
                                     Verify OTP
                                </button>
                            </div>
                            <span>Didn't receive an email? <a href="sign-in.html">resend otp</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>