/*
Source1 = https://symask.blogspot.com/2018/10/nodemcu-cara-menyimpan-data-ke-database.html
Source2 = https://www.php.net/manual/en/pdostatement.bindparam.php
Status = SUCCESS, tested by Puji Santoso on 23 April 2021
*/
<?php
    include('mesin4B_koneksi.php');
 
    $sensor = $_GET['nilaiD1danD2'];

    $sql = "INSERT INTO mesin4_b (qty) VALUES (:nilaiD1danD2)";


    $stmt = $PDO->prepare($sql);
 
    $stmt->bindParam(':nilaiD1danD2', $sensor);


	
    if($stmt->execute()) {
        echo "sukses gaes";
    }else{
        echo "gagal gaes";
    }
?>