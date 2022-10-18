<!---
Source1 = https://symask.blogspot.com/2018/10/nodemcu-cara-menyimpan-data-ke-database.html
Source2 = https://www.php.net/manual/en/pdostatement.bindparam.php
Status = SUCCESS, tested by Puji Santoso on 23 April 2021
-->
<?php
    include('mesin5B_conn.php');

    $sensor1 = $_GET['mach_code']; 
    $sensor2 = $_GET['nilaiD1danD2'];

    $sql = "INSERT INTO idle_record (mach_code, mach_status) VALUES (:mach_code,:nilaiD1danD2)"; /*value = mach_start */
 
    $stmt = $PDO->prepare($sql);
    
	$stmt->bindParam(':mach_code', $sensor1); 
    $stmt->bindParam(':nilaiD1danD2', $sensor2);


	
    if($stmt->execute()) {
        echo "sukses gaes";
    }else{
        echo "gagal gaes";
    }
?>