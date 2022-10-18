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
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Status Laporan </h4>
                  
                  <p class="card-description">
                    Laporan harian produksi
                  </p>
                  <!-- <div class="alert alert-danger" role="alert">
  ABAIKAN STATUS <B>SUDAH MELAPOR</B> HARI INI,MENGISI SAJA SEPERTI BIASA 
</div> -->
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Nama</th>
                          <th>Status</th>
                          <th>Form</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach( $operator as $opt ) : ?>
                        <tr>
                          <td><?= $opt[0]; ?></td>
                          <td><?= $opt[1]; ?></td>
                          <td><?= $opt[2]; ?></td>
                          <td> <button type="button" class="btn btn-outline-primary btn-sm" ><a href="conn/form.html">lapor</a></button>
</td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Rekap real  data</h4>
                  <p class="card-description">
                    laporan hari ini <?php echo $hari; ?>, <?php echo $tanggal; ?></h3>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Waktu</th>
                          <th>nama</th>
                          <th>stasiun</th>
                          <th>Tipe Produk</th>
                          <th>ok</th>
                          <th>reject</th>
                          <th>total</th>
                          <th>keterangan</th>
                        </tr>
                      </thead>
                      <?php foreach( $laporan_harian as $laps ) : ?>
                      <tbody>
                        <tr>
                          <td><?= date('H:i', strtotime($laps["timestamp"])); ?></td>
                          <td><?= $laps["user_name"]; ?></td>
                          <td><?= $laps["machine_id"]; ?></td>
                          <td><?= $laps["product_type"]; ?></td>
                          <td><?= $laps["product_ok"]; ?></td>
                          <td><?= $laps["product_reject"]; ?></td>
                          <td><?= $laps["product_ok"]+$laps["product_reject"]; ?></td>
                          <td><?= $laps["remark"]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            
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
