<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php base_url(); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
    <nav class="mt-2">
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
          <a href="<?= site_url('products') ?>" class="nav-link">
          <i class="nav-icon fas fa-utensils"></i>
            <p>
              Products
            </p>
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
          <a href="<?= site_url('calendar') ?>" class="nav-link">
            <i class="nav-icon far fa-calendar"></i>
            <p>
              Calendar
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
          <a href="<?= site_url('contactus') ?>" class="nav-link">
            <i class="nav-icon fas fa-address-book"></i>
            <p>
              Contact
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