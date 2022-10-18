<?php
include "../../conn/conn.php";

//cek button    
    if ($_POST['Submit'] == "Submit") {
    //$user_id        = $_POST['user_id'];
    $machine_id     = $_POST['machine_id'];
    $sparepart     = $_POST['sparepart'];
    $item   = $_POST['item'];
    if (empty($_POST['machine_id'])||empty($_POST['sparepart'])) {?>
            <script language="JavaScript">
                alert('Data Harap Dilengkapi!');
                document.location='form.html';
            </script>
        <?php
    }
    else {
    //?>
    //    <script language="JavaScript">
    //    </script>
    // <?php
    }
    //Masukan data ke Table
    $input    ="INSERT INTO sparepart (machine_id,sparepart,item) VALUES ('$machine_id','$sparepart','$item')";
    $query_input =mysqli_query($conn,$input);
    if ($query_input) {
    //Jika Sukses
    ?>
        <script language="JavaScript">
        alert('Input Laporan Berhasil');
        document.location='../lap_op.php';
        </script>
    <?php
    }
    else {
    //Jika Gagal
    echo "Input Laporan Gagal!, Silahkan diulangi!";
    }
//Tutup koneksi engine MySQL
    mysql_close($Open);
    }

?>