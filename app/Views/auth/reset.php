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
                            <h5 style="text-align: center;"><strong> Password Reset</strong></h5>
                            <br>
                        </div>
                        <form>
                            <div class="mb-3">
                                <input type="email" id="email" class="form-control" name="email" placeholder="Enter new password" required="">
                                <br>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Retype new password" required="">
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">
                                     Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>