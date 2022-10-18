<!-- data component--> <?php include 'component/datalap_op.php';?>
<!-- data selesai -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- aset component--> <?php include 'component/aset.php';?>
    <!-- aset selesai-->
  </head>
  <body>
    <div class="container-scroller">
      <!-- navbar component--> <?php include 'component/nav.php';?>
      <!-- navbar selesai -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Laporan Opname WIP </h4>
                <p class="card-description"> Laporan WIP Produksi </p>
                <a class="btn btn-outline-primary btn-sm float-right" href="conn/form_wip.html" role="button">+ Input Opname WIP</a>
                <div class="table-responsive">
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
                    </thead> <?php foreach( $lap_opname_wip as $lap_opnm ) : ?> <tbody>
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
        <!-- content-wrapper ends -->
        <!-- navbar component--> <?php include 'component/footer.php';?>
        <!-- navbar selesai -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
  </body>undefined
</html>