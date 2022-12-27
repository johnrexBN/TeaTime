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
          <h3><b>Products</b></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="products">Home</a></li>
              <li class="breadcrumb-item active">Product Table</li>
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
                <h3 class="card-title">Product Table</h3>     
                <div align="right"><a class="btn btn-success" href="addproducts" role="button">Add Products</a></div>          
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>name</th>
                      <th>description</th>
                      <th>price</th>
                      <th>quantity</th>
                      <th>category</th>
                      <th>image</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody> 
                  <?php foreach($products as $prod):?>
                  <tr>
                    <td><?= $prod['name']?></td>
                    <td><?= $prod['description']?></td>
                    <td><?= $prod['price']?></td>
                    <td><?= $prod['quantity']?></td>
                    <td><?= $prod['category']?></td>
                    <td><img src="<?= base_url().'/'.'uploads/'.$prod['image'] ?>" height="130" width="95"></td>
                    <td>
                      <span>
                      <a href="<?= site_url('edit/'.$prod['id']) ?>" class="btn-sm btn-warning">Edit</a>
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
