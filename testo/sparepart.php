<!-- data component-->
<?php include 'component/datalap_op.php';?>
<!-- data selesai -->

<!DOCTYPE html>
<html lang="en">

<head>
<!-- aset component-->
<?php include 'component/aset.php';?>
<!-- aset selesai-->
</head>
<body>
  <div class="container-scroller">

<!-- navbar component-->
  <?php include 'component/nav.php';?>
<!-- navbar selesai -->
      

      
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
          <!-- mulai tabel -->
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Laporan Opname WIP </h4>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Beta version </strong>Halaman ini hanya tes !
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                <a class="btn btn-outline-primary btn-sm float-right" href="component/admin/login.php" role="button">+ Input Sparepart</a>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>
                            Tanggal
                          </th>
                          <th>
                            Mesin
                          </th>
                          <th>
                            Sparepart
                          </th>
                          <th>
                            Item
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
		include 'conn/conn.php';
		$data = mysqli_query($conn,"select * from sparepart");
		while($d = mysqli_fetch_array($data)){
			?>
                        <tr>
                        <td><?php echo $d['timestamp']; ?></td>
				<td><?php echo $d['machine_id']; ?></td>
				<td><?php echo $d['sparepart']; ?></td>
				<td><?php echo $d['item']; ?></td>
                        </tr>
                        <?php 
		}
		?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


          <!-- akhir tabel -->



          </div>
        </div>
        <!-- content-wrapper ends -->

<!-- navbar component-->
<?php include 'component/footer.php';?>
<!-- navbar selesai -->
     
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

 
</body>

</html>
