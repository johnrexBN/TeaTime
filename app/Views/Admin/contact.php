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
                <div align="right"><a class="btn btn-success" href="addproducts" role="button"><i class="nav-icon fas fa-plus"></i></a></div>          
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>name</th>
                      <th>email</th>
                      <th>phone</th>
                      <th>subject</th>
                      <th>message</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tbody> 
                  <?php foreach($feeds as $inbox):?>
                  <tr>
                    <td><?= $inbox['name']?></td>
                    <td><?= $inbox['email']?></td>
                    <td><?= $inbox['phone']?></td>
                    <td><?= $inbox['subject']?></td>
                    <td><?= $inbox['message']?></td>
                    <td>
                      <span>
                      <a href="" class="btn-sm btn-warning"><i class="nav-icon fas fa-pen"></i></a>
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