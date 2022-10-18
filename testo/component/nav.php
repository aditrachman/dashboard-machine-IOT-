<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php">Teknomedika</a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="makeup/images/kie.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class=" nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <i class="ti-user  "></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="component/admin/login.php">
                <i class="ti-power-off text-primary"></i>
                Login
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
            <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="display.php">
            <i class="ti-image menu-icon"></i>
            <span class="menu-title">MODE DISPLAY</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lap_op.php">
            <i class="ti-comment-alt menu-icon"></i>
            <span class="menu-title">Laporan harian OP</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="sparepart.php">
            <i class="ti-ticket menu-icon"></i>
            <span class="menu-title">Log Mesin </span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="component/admin/login.php">
            <i class="ti-receipt menu-icon"></i>
            <span class="menu-title">Opname WIP</span>
            </a>
          </li>
          
          
      </nav>