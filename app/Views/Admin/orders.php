<?= $this->include('admin/inc/top'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('admin/inc/navbar'); ?>
        <?= $this->include('admin/inc/sidebar'); ?>
    </div>
    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3><b>Customer Orders Inbox</b></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="products">Home</a></li>
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
                <h3 class="card-title">Customer Orders Inbox Table</h3>              
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
                  <tr>
                    <td><img src="<?= base_url().'/'.'uploads/'.$orders['image'] ?>" height="130" width="95"></td>
                    <td><?= $orders['name'] ?></td>
                    <td><?= $orders['email'] ?></td>
                    <td><?= $orders['total'] ?></td>
                    <td><?= $orders['state'] ?></td>
                    <td>
                      <span>
                      <a href="<?= site_url('accept/') . $orders['menuid'] . '/' . $orders['userid']  ?> " class="btn-sm btn-primary"><i class="nav-icon fas fa-check"></i></a>
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
