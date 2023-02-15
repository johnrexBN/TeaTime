<?= $this->include('admin/inc/top'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?= $this->include('admin/inc/navbar'); ?>
  </div>

  <!-- Sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php if (!empty(session()->getFlashdata('admin'))) : ?>
    <script>
      swal("Welcome back!", "Hello Miko Mandia", "success");
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
                <span class="right badge badge-danger"><?= $pending_book ?></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('orders') ?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Orders
                <span class="right badge badge-danger"><?= $pending_order ?></span>
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
                <span class="right badge badge-danger"><?= $contact_us['totaluser'] ?></span>
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
                      <h3><?= $pending_order ?></h3>
                      <p>Pending Orders</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3><?= $cancelled_order ?></h3>
                      <p>Cancelled Orders</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3><?= $approved_order ?></h3>
                      <p>Approved Orders</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>
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
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3><?= $accept_book ?></h3>
                      <p>Approved Reservations</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-calendar"></i>
                    </div>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-secondary">
                    <div class="inner">
                      <h3><?= $pending_book ?></h3>
                      <p>Pending Reservations</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-calendar"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner">
                      <h3><?= $contact_us['totaluser'] ?></h3>
                      <p>Customer Suggestions</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bookmark"></i>
                    </div>
                    
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-light">
                    <div class="inner">
                      <h3><?= $menu['totalmenu'] ?></h3>
                      <p>Menu</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pizza"></i>
                    </div>
                    
                  </div>
                </div>
              </div>
          </section>
          <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Customers per Month</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            
            <!-- AREA CHART -->
            
            <!-- /.card -->

            <!-- DONUT CHART -->
            
            <!-- /.card -->

            <!-- PIE CHART -->
            
            <!-- /.card -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Stock Category</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Total Sales per Month</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            <!-- RT -->
            
            <!-- /.card -->

            <!-- STACKED BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Total Customers Reservation</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          
          <!-- /.col (RIGHT) -->

          
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
        </ul>
      </nav>
    </div>
  
    <?= $this->include('admin/inc/end'); ?>
    <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
          
        {
          label               : 'Total Sales',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [0, <?= $total_sales ?>, 0, 0, 0, 0, 0]
        }
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }]
        
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
//-------------
   

   

    //-------------
    //- BAR CHART -
    //-------------
var areaChartCanvas = $('#barChart').get(0).getContext('2d')

var areaChartData = {
  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [
      
    {
      label               : 'Total Customers',
      backgroundColor     : 'rgba(210, 214, 222, 1)',
      borderColor         : 'rgba(210, 214, 222, 1)',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [0, <?= $users['totaluser'] ?>, 0, 0, 0, 0, 0]
    }
  ]
}

var areaChartOptions = {
  maintainAspectRatio : false,
  responsive : true,
  legend: {
    display: false
  },
  scales: {
    xAxes: [{
      gridLines : {
        display : false,
      }
    }]
    
  }
}



// This will get the first returned node in the jQuery collection.
new Chart(areaChartCanvas, {
  type: 'bar',
  data: areaChartData,
  options: areaChartOptions
})
//-------------

       //-------------
    //- BAR CHART -
    //-------------
    var areaChartCanvas = $('#barChart2').get(0).getContext('2d')

var areaChartData = {
  labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [
      
    {
      label               : 'Total Customers Reservation',
      backgroundColor     : 'rgba(210, 214, 222, 1)',
      borderColor         : 'rgba(210, 214, 222, 1)',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [0, <?= $accept_book ?>, 0, 0, 0, 0, 0]
    }
  ]
}

var areaChartOptions = {
  maintainAspectRatio : false,
  responsive : true,
  legend: {
    display: false
  },
  scales: {
    xAxes: [{
      gridLines : {
        display : false,
      }
    }]
    
  }
}
// This will get the first returned node in the jQuery collection.
new Chart(areaChartCanvas, {
  type: 'bar',
  data: areaChartData,
  options: areaChartOptions
})

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Foods',
          'Milktea',
          'Adds',
          
      ],
      datasets: [
        {
          data: [<?= $foods ?>,<?= $milktea ?>,<?= $adds ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })



  })
</script>