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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>
      <div class="content">
        <div class="container-fluid">
        <?php if(session()->getFlashdata('msg', 'Updated Successfully!')):?>
            <div class="alert alert-success">
            <?= session()->getFlashdata('msg', 'Updated Successfully!')?></div>
            <?php endif; ?>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Edit Menu</h3>
                  <div align="right"><a class="btn btn-danger" href="<?= site_url('menu') ?>" role="button"><i class="nav-icon fas fa-door-open"></i>  Cancel</a></div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div>
                    <form action="<?= site_url('updatemenu/'.$menu['id']) ?>" method="post">
                    <input type="hidden" name="_method" value="PUT" />
                      <label>Name</label>
                      <input type="text" name="name" value="<?= $menu['name']; ?>" class="form-control" placeholder="Enter Menu Name">
                      <label>Description</label>
                      <input type="text" name="description" value="<?= $menu['description']; ?>" class="form-control" placeholder="Enter Menu Description">
                      <label>Category</label>
                      <input type="text" name="category" value="<?= $menu['category']; ?>" class="form-control" placeholder="Enter Menu Category">
                      <label>Price</label>
                      <input type="text" name="price" value="<?= $menu['prices']; ?>" class="form-control" placeholder="Enter Menu Price">
                      <label>Discount</label>
                      <input type="text" name="discount" value="<?= $menu['discount']; ?>" class="form-control" placeholder="Enter Menu Discount">
                      <br>
                      <div><button type="submit" class="btn btn-info"><i class="nav-icon fas fa-upload"></i>  Upload</button>
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
