<!---
Source1 = https://symask.blogspot.com/2018/10/nodemcu-cara-menyimpan-data-ke-database.html
Source2 = https://www.php.net/manual/en/pdostatement.bindparam.php
Status = SUCCESS, tested by Puji Santoso on 23 April 2021
-->
<?php
    
//  Untuk menambah status mach_stop pada kolom 'remark' di data terakhir 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "data_mesin";
	// Create connection
	$connect = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
	}
	$sql_1 = "SELECT * FROM mesin5_a ORDER BY id DESC LIMIT 1";  //ORDER BY id DESC LIMIT 1  
	$result_1 = mysqli_query($connect, $sql_1);
	if (mysqli_num_rows($result_1) > 0) {
	// output data of each row
	while($row_1 = mysqli_fetch_assoc($result_1)) { 
	echo "produk paling awal  : " .$row_1["id"]."   ".$row_1["time"]. "   ".$row_1["qty"]."   ".$row_1["remark"]."<br>";
	$id_terakhir = $row_1["id"];	
	echo $id_terakhir."<br>";
		}
	}
	
	// tambah 'mach_stop'
	$sql_2 = "UPDATE mesin5_a SET remark='mach_stop' WHERE id = $id_terakhir ";

	if ($connect->query($sql_2) === TRUE) {
	echo "Record updated successfully";
	} else {
	echo "Error updating record: " . $connect->error;
	}

	$connect->close();
	

	
// Masukkan data dari mesin ke dbase 
	
	include('mesin5A_koneksi.php');
    $sensor = $_GET['nilaiD1danD2'];
    $sql = "INSERT INTO mesin5_a (qty) VALUES (:nilaiD1danD2)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nilaiD1danD2', $sensor);
	
    if($stmt->execute()) {
        echo "sukses gaes";
    }else{
        echo "gagal gaes";
    }
?>	
