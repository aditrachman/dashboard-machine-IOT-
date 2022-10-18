<?php
include "../conn/conn.php";

//cek button    
    if ($_POST['Submit'] == "Submit") {
    //$user_id        = $_POST['user_id'];
    $nama           = $_POST['nama'];
    $machine_id     = $_POST['machine_id'];
    $product_ok     = $_POST['product_ok'];
    $product_type   = $_POST['product_type'];
    $product_reject = $_POST['product_reject'];
    $remark         = $_POST['remark'];
    if (empty($_POST['nama'])||empty($_POST['machine_id'])||empty($_POST['product_ok'])) {?>
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
    $input    ="INSERT INTO daily_report_op (user_name,machine_id,product_ok,product_type,product_reject,remark) VALUES ('$nama','$machine_id','$product_ok','$product_type','$product_reject','$remark')";
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