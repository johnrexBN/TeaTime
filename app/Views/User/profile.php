<?= $this->include('User/inc/top'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('User/inc/navbar'); ?>
        <?= $this->include('User/inc/sidebar'); ?>
    </div>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                    
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-dark card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="../../dist/img/1.jpg" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?= $profile['name'] ?></h3>

                                <p class="text-muted text-center"><?= session()->get('email') ?></p>
                                
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item"><i class="fas fa-user-tie fa-sm"></i>
                                        <b> </b> <a class="float-right"><?= $profile['username'] ?></a>
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-phone fa-sm"></i>
                                        <b> </b> <a class="float-right"><?= $profile['phone_number'] ?></a>
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-home fa-sm"></i>
                                        <b> </b> <a class="float-right"><?= $profile['address'] ?></a>
                                    </li>
                                </ul>
                                <div class="text-center">
                                <a href="<?= site_url('show');?>" class="btn btn"  style="color: #3f474e;"><b>Show Information</b></a>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-dark card-outline">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li style="font-weight: bold"> Personal Information</li>
                                </ul>   
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="information">
                                        
                                            <form action="<?= site_url('update_profile/'.$profile['id']) ?>" method="post">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="name" value="<?=$profile['name']?>" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Username:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="username" value="<?=$profile['username']?>" class="form-control" id="inputEmail" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Phone Number:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="phone_number" value="<?=$profile['phone_number']?>" class="form-control" id="inputSkills" placeholder="Phone Number">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Address: </label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="address" value="<?=$profile['address']?>" id="inputExperience" placeholder="Address"></input>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class=" col-sm-4 mt-3">
                                                    <button type="submit" style="background-color: #CB8C58;" class="btn btn">Submit</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>

    <?= $this->include('User/inc/end'); ?>