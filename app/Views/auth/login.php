<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN/REGISTER - TEATIME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/13b0780e3e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/login.css">
    
</head>

<body>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <img src="<?= base_url(); ?>/assets/img/logo.png" class="rounded">
                                            <form action="<?= base_url('check'); ?>" method="post">
                                                <?= csrf_field(); ?>
                                                
                                                <div class="form-group">
                                                    
                                                <input type="email" name="email" class="form-style" placeholder="Enter Your Email" id="logemail" class="form-control" value="<?= set_value('email'); ?>">
                                                        <p>
                                                            <?= isset($validation) ? display_error($validation, 'email')
                                                                : '' ?>
                                                        </p>
                                                    
                                                        
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Enter Your Password" id="logpass" class="form-control" value="<?= set_value('password'); ?>">
                                                    <p>
                                                        <?= isset($validation) ? display_error(
                                                            $validation,
                                                            'password'
                                                        ) : '' ?>
                                                    </p>
                                                    <span style="color: red"><?= session()->getFlashdata('fail') ?></span>
                                                    <i class="input-icon fa fa-lock-alt"></i>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Log In</button>
                                                <p class="mb-0 mt-4 text-center"><a href="fpass" class="link">Forgot
                                                        your password?</a></p>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <div class="section text-center">
                                                <img src="<?= base_url(); ?>/assets/img/logo.png" class="rounded">
                                            </div>
                                            <form action="<?= base_url('save'); ?>" method="post">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-style" placeholder="Enter Your Full Name" id="logname" class="form-control" value="<?= set_value('name'); ?>">
                                                   
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email" class="form-style" placeholder="Enter Your Email" id="logemail" class="form-control" value="<?= set_value('email'); ?>">
                                                   
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Enter Your Password" id="logpass" class="form-control" value="<?= set_value('password'); ?>">
                                                   
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="cpassword" class="form-style" placeholder="Confirm Your Password" id="logpass" class="form-control" value="<?= set_value('cpassword'); ?>">
                                                   
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Sign Up</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://codepen.io/ig_design/full/KKVQpVP"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</body>

</html>