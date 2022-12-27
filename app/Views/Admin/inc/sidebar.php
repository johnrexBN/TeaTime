<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= site_url('homepage') ?>" class="brand-link">
  <i class="fas fa-angle-left right"></i>
    <b><span class="brand-text font-weight-light">Back to Homepage</span></b>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php base_url(); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="nav-link">Miko Mandia</a>
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
          <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard v1</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('products') ?>" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Products
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('menu') ?>" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Menu
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/gallery.html" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Gallery
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Tables
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>