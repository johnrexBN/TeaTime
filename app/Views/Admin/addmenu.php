<?= $this->include('admin/inc/top'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?= $this->include('admin/inc/navbar'); ?>
  </div>
 <!-- Sweet alert -->
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php if (!empty(session()->getFlashdata('add_menu'))) : ?>
    <script>
      swal("Success!", "New product has been addedd.", "success");
    </script>
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
        <a href="index" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
          <p>Sales and Graph</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('menu') ?>" class="nav-link active" style="background-color: #cb8c58;">
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
        <a href="<?= site_url('transactions') ?>" class="nav-link">
          <i class="nav-icon fas fa-calendar-check"></i>
          <p>
          Order History
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

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h3><b>Menu</b></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a style="color: #cb8c58;" href="index">Home</a></li>
              <li class="breadcrumb-item active">Add Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>
      <div class="content" style="margin-top: -10px;">
        <div class="container-fluid">
          <?php if (!empty(session()->getFlashdata('msg', 'Successfully Added!'))) : ?>
            <div class="alert alert-success">
              <?= session()->getFlashdata('msg', 'Successfully Added!') ?>
            </div>
          <?php endif; ?>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Add Menu</h3>

                  <div align="right"><a class="btn btn-secondary" href="menu" role="button">Go back</a></div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="margin-top: -20px;">
                  <div>
                    <form action="<?= site_url('savemenu') ?>" method="post" enctype="multipart/form-data">
                      <label >Name</label>
                      <span class="text-danger" ><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
                      <input type="text" name="name" class="form-control" placeholder="Enter Menu Name" required>

                       <label>description</label>
                      <span class="text-danger" ><?= isset($validation) ? display_error($validation, 'description') : '' ?></span>
                      <input type="text" name="description" class="form-control" placeholder="Enter Menu description" required>

                      <label>Category</label>
                      <span class="text-danger" require><?= isset($validation) ? display_error($validation, 'category') : '' ?></span>
                      <input type="text" name="category" class="form-control" placeholder="Enter Menu Category" required>

                      <label>Price</label>
                      <span class="text-danger" require><?= isset($validation) ? display_error($validation, 'price') : '' ?></span>
                      <input type="text" name="price" class="form-control" placeholder="Enter Menu Price" required>

                      <label>Stocks</label>
                      <span class="text-danger" require><?= isset($validation) ? display_error($validation, 'stocks') : '' ?></span>
                      <input type="number" name="stocks" class="form-control" placeholder="Enter Menu Stocks" required>

                      <label>Discount</label>
                      <span class="text-danger" require><?= isset($validation) ? display_error($validation, 'discount') : '' ?></span>
                      <input type="text" name="discount" class="form-control" placeholder="Enter Menu Discount" required>
                      <hr>
                      <span class="text-danger" require><?= isset($validation) ? display_error($validation, 'menu') : '' ?></span>
                      <label >Upload image</label>
                      <input type="file" name="menu" size="30"  required/>

                      <button type="submit" style="float:right; background-color: #cb8c58; color: white;" class="btn btn">ADD NEW ITEM</button>
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</body>
<?= $this->include('admin/inc/end'); ?>