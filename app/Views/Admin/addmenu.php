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
              <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li class="breadcrumb-item active">Add Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>
      <div class="content">
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
                <div class="card-body">
                  <div>
                    <form action="<?= site_url('savemenu') ?>" method="post" enctype="multipart/form-data">
                      <label>Name</label>
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
                      <label>Upload image</label>
                      <input type="file" name="menu" size="30" required/>

                      <div><button type="submit" style="float:right" class="btn btn-info">Add new menu</button></div>
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