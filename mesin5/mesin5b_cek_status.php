<?php
include('conn.php');	

//Time stamp saat ini
$dayofyear = date("z")+1; // today
date_default_timezone_set('Asia/Jakarta');
$waktu_sekarang = date("Y-m-d H:i:s");
$epoch_waktu_sekarang = strtotime($waktu_sekarang);

echo $waktu_sekarang ."<br>";
echo $epoch_waktu_sekarang ."<br>";

//Jika mach_start lebih dari 5 menit

$status_mesin_start = mysqli_query($conn,"SELECT * FROM idle_record where DAYOFYEAR(time)=$dayofyear && mach_code='mesin_5b' && mach_status='mach_start' ORDER BY id DESC LIMIT 1");
if (mysqli_num_rows($status_mesin_start) > 0) {
  // output data of each row
  while($row_start = mysqli_fetch_assoc($status_mesin_start)) {
  //echo "id: " . $row_start["id"]. " - time: " . $row_start["time"]. " - code: " . $row_start["mach_code"]. " - status: " . $row_start["mach_status"]. "<br>";
  
  $durasi_mesin_start = $epoch_waktu_sekarang - strtotime($row_start["time"]) ;
  echo "Durasi_start: " .$durasi_mesin_start."<br>";
  }
} else {
  echo "Belum ada status mesin start";
}


//Jika mach_idle lebih dari 5 menit

$status_mesin_idle = mysqli_query($conn,"SELECT * FROM idle_record where DAYOFYEAR(time)=$dayofyear && mach_code='mesin_5b' && mach_status='mach_idle' ORDER BY id DESC LIMIT 1");
if (mysqli_num_rows($status_mesin_idle) > 0) {
  // output data of each row
  while($row_idle = mysqli_fetch_assoc($status_mesin_idle)) {
  //echo "id: " . $row_idle["id"]. " - time: " . $row_idle["time"]. " - code: " . $row_idle["mach_code"]. " - status: " . $row_idle["mach_status"]. "<br>";
  
  $durasi_mesin_idle = $epoch_waktu_sekarang - strtotime($row_idle["time"]) ;
  echo "Durasi_idle: " .$durasi_mesin_idle."<br>";
  }
} else {
  echo "Belum ada status mesin idle";
}


//Jika kiriman data terakhir lebih dari 5 menit

$data_mesin5_b = mysqli_query($conn_msn5,"SELECT * FROM mesin5_b where DAYOFYEAR(time)=$dayofyear ORDER BY id DESC LIMIT 1");
if (mysqli_num_rows($data_mesin5_b) > 0) {
  // output data of each row
  while($row_mesin5_b = mysqli_fetch_assoc($data_mesin5_b)) {
  //echo "id: " . $row_mesin5_b["id"]. " - time: " . $row_mesin5_b["time"]. " - qty: " . $row_mesin5_b["qty"]. "<br>";
  
  $durasi_data_terakhir_mesin5_b = $epoch_waktu_sekarang - strtotime($row_mesin5_b["time"]) ;
  echo "Durasi_mesin5_b: " .$durasi_data_terakhir_mesin5_b."<br>";
  }
} else {
  echo "Belum ada data masuk mesin5_b";
}

// PERULANGAN  5 menit = 5*60 = 300
 
if ($durasi_mesin_start > 300 &&  $durasi_mesin_idle > 300 && $durasi_data_terakhir_mesin5_b > 300 ) {
  echo "Saatnya kirim status 'mach_stop'";
	//Kirim status mesin : "mach_stop"	
    $sensor1 = "mesin_5b"; 
    $sensor2 = "mach_stop";
    //$sql = "INSERT INTO idle_record (mach_code, mach_status) VALUES (:mach_code,:nilaiD1danD2)"; /*value = mach_start */
    //$stmt = $PDO->prepare($sql);
	//$stmt->bindParam(':mach_code', $sensor1); 
    //$stmt->bindParam(':nilaiD1danD2', $sensor2);
	
    if($stmt->execute()) {
        echo "sukses gaes";
		echo "<script>window.close();
		</script>";
		//header("location: cek_status_timer.php");  // nantinya kalau sukses, tutup halaman ini 
    }else{
        echo "gagal gaes";
    }  
 
} else {
  echo "Mesin masih running";
  header("location: cek_status_timer.php");
}




?>