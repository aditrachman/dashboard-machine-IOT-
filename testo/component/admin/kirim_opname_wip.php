<?php
include "../../conn/conn.php";

//cek button    
    if ($_POST['Submit'] == "Submit") {
    //$user_id        = $_POST['user_id'];
    $nama           = $_POST['nama'];
    $station_1     = $_POST['station_1'];
    $station_2     = $_POST['station_2'];
    $station_3     = $_POST['station_3'];
    $station_4     = $_POST['station_4'];
    $station_5     = $_POST['station_5'];
    $station_6     = $_POST['station_6'];
    $station_7     = $_POST['station_7'];
    $station_10     = $_POST['station_10'];

    $remark         = $_POST['remark'];
    //validasi data data kosong
    //if (empty($_POST['nama'])||empty($_POST['machine_id'])||empty($_POST['product_ok'])||empty($_POST['product_reject'])||empty($_POST['remark'])) {
    if ((empty($_POST['nama']))) {
        ?>
            <script language="JavaScript">
                alert('Data Harap Dilengkapi!');
                document.location='form_wip.html';
            </script>
        <?php
    }
    else {
    //?>
    //    <script language="JavaScript">
    //    </script>
    // <?php
    
    //Masukan data ke Table
    $input    ="INSERT INTO opname_wip (user_name,station_1,station_2,station_3,station_4,station_5,station_6,station_7,station_10,remark) 
	VALUES ('$nama','$station_1','$station_2','$station_3','$station_4','$station_5','$station_6','$station_7','$station_10','$remark')";
    $query_input =mysqli_query($conn,$input);
    if ($query_input) {
    //Jika Sukses
    ?>
        <script language="JavaScript">
        alert('Input Laporan Berhasil');
        document.location='../../component/admin/index.php';
        </script>
    <?php
    }
    else {
    //Jika Gagal
    echo "Input Laporan Gagal!, Silahkan diulangi!";
    }
	}
//Tutup koneksi engine MySQL
    mysql_close($Open);
    }

?>