<?= $this->include('admin/inc/top'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?= $this->include('admin/inc/navbar'); ?>
    <?= $this->include('admin/inc/sidebar'); ?>
  </div>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3><b>Menu</b></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="products">Home</a></li>
              <li class="breadcrumb-item active">Menu Table</li>
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
                <h3 class="card-title">Menu Table</h3>     
                <div align="right"><a class="btn btn-success" href="addmenu" role="button"><i class="nav-icon fas fa-plus"></i> Add</a></div>          
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>name</th>
                      <th>Description</th>
                      <th>price</th>
                      <th>category</th>
                      <th>discount</th>
                      <th>stocks</th>
                      <th>image</th>
                      <th>status</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody> 
                  <?php foreach($menu as $item):?>
                  <tr>
                    <td><?= $item['name']?></td>
                    <td><?= $item['description']?></td>
                    <td><?= $item['prices']?></td>
                    <td><?= $item['category']?></td>
                    <td><?= $item['discount']?></td>
                    <td><?= $item['stocks']?></td>
                    <td><img src="<?= base_url().'/'.'uploads/'.$item['image'] ?>" height="130" width="95"></td>
                    <td><?= $item['status']?></td>
                    <td>
                      <span>
                      <a href="<?= site_url('editmenu/'.$item['id']) ?>" class="btn-sm btn-warning"><i class="nav-icon fas fa-pen"></i></a>
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
    </body>
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

