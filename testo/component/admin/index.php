
<?php
	
  //include "../../output_produksi/koneksi.php";
  include "../../conn/conn.php";
  
  $hari = date("l");
  $tanggal = date("Y-m-d");
  
  //menentukan input opname yang terakhir
  $lap_opname_wip = mysqli_query($conn,"SELECT * FROM opname_wip ORDER BY id DESC LIMIT 1");
  if (mysqli_num_rows($lap_opname_wip) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($lap_opname_wip)) {
      echo "Tanggal: " . $row["timestamp"]. "Nama: " . $row["user_name"]. " - Mesin 1: " . $row["station_1"]. " - Mesin 10:  " . $row["station_10"]. "<br>";     
    }
  } else {
    echo "Belum ada laporan";
  }
  ?>

<?php 
include 'config.php';
 
// mengaktifkan session
session_start();
    
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:login.php");
}
 
// menampilkan pesan selamat datang
 
?>



<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Required meta tags -->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tekno</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="../../makeup/vendors/feather/feather.css">
  <link rel="stylesheet" href="../../makeup/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../makeup/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../makeup/vendors/ti-icons/css/themify-icons.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../makeup/css/vertical-layout-light/style.css">
  <!-- endinject -->   
  <link rel="shortcut icon" href="../../makeup/images/kie.png" />


    <!-- plugins:js -->
    <script src="../../makeup/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../makeup/vendors/chart.js/Chart.min.js"></script>
  <script src="../../makeup/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../makeup/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../makeup/js/off-canvas.js"></script>
  <script src="../../makeup/js/hoverable-collapse.js"></script>
  <script src="../../makeup/js/template.js"></script>
  <script src="../../makeup/js/settings.js"></script>
  </head>
  <body>
    <div class="container-scroller">
<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php">Admin Tekno</a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../makeup/images/kie.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
       
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class=" nav-link dropdown-toggle text-primary" href="#" data-toggle="dropdown" id="profileDropdown">
			<i class="p-2 ti-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                logout
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
              <i class="ti-receipt menu-icon"></i>
              <span class="menu-title">Opname WIP</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index2.php">
            <i class="ti-ticket menu-icon"></i>
            <span class="menu-title">Log Mesin </span>
            </a>
          </li>
          
          
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
				             
<div class="alert alert-info alert-dismissible fade show" role="alert">
  Halo <strong><?php echo $_SESSION['username']; ?> </strong> Kamu bisa akses halaman opname WIP
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                <h4 class="card-title">Laporan Opname WIP </h4>
                <p class="card-description"> Laporan WIP Produksi </p>
                <a class="btn btn-outline-primary btn-sm float-right" href="form_wip.html" role="button">+ Input Opname WIP</a>
                <div class="table-responsive">
                <?php echo $hari?>, <?php echo $tanggal; ?></h3>   
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th> Tanggal </th>
                        <th> Nama operator </th>
                        <th> Stasiun 1 </th>
                        <th> Stasiun 2 </th>
                        <th> Stasiun 3 </th>
                        <th> Stasiun 4 </th>
                        <th> Stasiun 5 </th>
                        <th> Stasiun 6 </th>
                        <th> Stasiun 7 </th>
                        <th> Stasiun 10 </th>
                      </tr>
                      <?php foreach( $lap_opname_wip as $lap_opnm ) : ?>


                    </thead><?= date('d/m/Y', strtotime($lap_opnm["timestamp"])); ?><tbody>
                      <tr>
                        <td> <?= date('d/m/Y', strtotime($lap_opnm["timestamp"])); ?> </td>
                        <td> <?= $lap_opnm["user_name"]; ?> </td>
                        <td> <?= $lap_opnm["station_1"]; ?> </td>
                        <td> <?= $lap_opnm["station_2"]; ?> </td>
                        <td> <?= $lap_opnm["station_3"]; ?> </td>
                        <td> <?= $lap_opnm["station_4"]; ?> </td>
                        <td> <?= $lap_opnm["station_5"]; ?> </td>
                        <td> <?= $lap_opnm["station_6"]; ?> </td>
                        <td> <?= $lap_opnm["station_7"]; ?> </td>
                        <td> <?= $lap_opnm["station_10"]; ?> </td>
                        <td> <?= $lap_opnm["remark"]; ?> </td>
                      </tr>
                    </tbody> <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
<footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">teknomedika <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">nemu di internet</span> 
          </div>
</footer> 
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
  </body>undefined
</html>