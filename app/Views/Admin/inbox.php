<?= $this->include('admin/inc/top'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->include('admin/inc/navbar'); ?>
        <?= $this->include('admin/inc/sidebar'); ?>
    </div>
    <div class="content-wrapper">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                    </div>
                </section>
            </ul>
        </nav>
    </div>

    <?= $this->include('admin/inc/end'); ?>