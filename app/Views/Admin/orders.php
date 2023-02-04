<?= $this->include('admin/inc/top'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('admin/inc/navbar'); ?>
    </div>
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
        <a href="<?= site_url('orders') ?>" class="nav-link active" style="background-color: #cb8c58;">
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
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3><b>Customer Orders Inbox</b></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item" ><a href="products" style="color: #cb8c58;">Home</a></li>
              <li class="breadcrumb-item active">Customer Orders Inbox Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="font-family: Open Sans, sans-serif;">Give them our best and quality products</h3>              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody> 
                  <?php foreach($placeorder as $orders): ?>
                  <tr style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 15px;">
                    <td><img src="<?= base_url().'/'.'uploads/'.$orders['image'] ?>" height="130" width="95"></td>
                    <td><?= $orders['name'] ?></td>
                    <td><?= $orders['email'] ?></td>
                    <td>₱ <?= $orders['total'] ?></td>
                    <td style="color: #cb8c58;"><?= $orders['state'] ?></td>
                    <td>
                      <span>
                      <a href="<?= site_url('accept/') . $orders['menuid'] . '/' . $orders['userid']  ?> " class="btn-xs btn" style="background-color: #cb8c58; color: white;"><i class="nav-icon fas fa-check"></i></a>
                      <a href="<?= site_url('accept/') . $orders['menuid'] . '/' . $orders['userid']  ?> " class="btn-xs btn" style="background-color: #cb8c58; color: #7E3517;"><i class="nav-icon fas fa-trash"></i></a>
                      </span>
                    </td>
                  </tr>
               <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>

    <?= $this->include('admin/inc/end'); ?>
    
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
