<?= $this->include('admin/inc/top'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('admin/inc/navbar'); ?>
    </div>

    <!-- Sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <?php if(!empty(session()->getFlashdata('admin'))) : ?>
      <script>swal("Welcome back!", "Hello Miko Mandia", "success");</script>
      <?php endif ?>
<!-- /Sweet alert -->

    <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
    <i class="fa fa-user fa-lg" style="color: white; margin-top: 8px;"><img src="" class="img-circle elevation-2"></i>
    </div>
    <div class="info">
      <a href="#" class="d-block">Miko Mandia</a>
    </div>
  </div>
  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-4">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

      <li class="nav-item">
        <a href="index" class="nav-link active" style="background-color: #cb8c58;">
        <i class="nav-icon fas fa-chart-pie"></i>
          <p>Sales and Graph</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('menu') ?>" class="nav-link">
        <i class="nav-icon fas fa-list"></i>
          <p>
            Menu
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('inbox') ?>" class="nav-link">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Booking
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('orders') ?>" class="nav-link">
          <i class="nav-icon fas fa-shopping-bag"></i>
          <p>
            Orders
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('contactus') ?>" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
          Customer Service
          </p>
        </a>
      </li>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      </div>
      <li class="nav-item">
        <a href="<?= site_url('logout') ?>" class="nav-link">
          <i class="nav-icon fas fa-power-off"></i>
          <p>
            Log Out
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="content-wrapper">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>150</h3>
                                            <p>New Orders</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="products" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                                            <p>Bounce Rate</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?= $users['totaluser'] ?></h3>

                                            <p>User Registrations</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>65</h3>

                                            <p>Unique Visitors</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                    </section>
                </ul>
            </nav>
        </div>
<?= $this->include('admin/inc/end'); ?>