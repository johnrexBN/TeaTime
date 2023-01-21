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
              <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>
      <div class="content">
        <div class="container-fluid">
        <?php if (!empty(session()->getFlashdata('msg'))) : ?>
              <div class="alert alert-success">
                <?= session()->getFlashdata('msg') ?>
              </div>
            <?php endif; ?>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Add Products</h3>

                  <div align="right"><a class="btn btn-secondary" href="products" role="button">Go back</a></div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div>
                    <form action="<?= site_url('saveproduct') ?>" method="post"">
                      <label>Name</label>
                      <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
                      <input type="text" name="name" class="form-control" placeholder="Enter Product Name">

                      <label>Description</label>
                      <span class="text-danger"><?= isset($validation) ? display_error($validation, 'description') : '' ?></span>
                      <input type="text" name="description" class="form-control" placeholder="Enter Product Description">

                      <label>Quantity</label>
                      <span class="text-danger"><?= isset($validation) ? display_error($validation, 'quantity') : '' ?></span>
                      <input type="text" name="quantity" class="form-control" placeholder="Enter Product Quantity">

                      <label>Price</label>
                      <span class="text-danger"><?= isset($validation) ? display_error($validation, 'price') : '' ?></span>
                      <input type="text" name="price" class="form-control" placeholder="Enter Product Price">

                      <label>Category</label>
                      <span class="text-danger"><?= isset($validation) ? display_error($validation, 'category') : '' ?></span>
                      <input type="text" name="category" class="form-control" placeholder="Enter Product Category">

                      <div><button type="submit" style="float:right" class="btn btn-info">Add new product</button></div>
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
