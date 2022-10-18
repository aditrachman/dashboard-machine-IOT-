<?php
	
include "conn/koneksi.php";
include "conn/conn.php";

$hari = date("l");
$tanggal = date("Y-m-d");

//$dayofyear = 168;
$dayofyear = date("z")+1; 

$laporan_harian = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear");
if (mysqli_num_rows($laporan_harian) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($laporan_harian)) {
    //echo "Nama: " . $row["user_name"]. " - Mesin: " . $row["machine_id"]. " " . $row["product_ok"]. "<br>";
  }
} else {
  echo "";
}

$status_aditya = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && user_name='Aditya' ");
if (mysqli_num_rows($status_aditya) > 0) {
  // output data of each row
  $stat_aditya = '<label class="badge badge-success">Sudah Melapor</label>';
 } else {
  //$stat_aditya = "Belum melapor";
  $stat_aditya = '<label class="badge badge-danger">Belum Melapor</label>';
 }

$status_anang = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && user_name='Anang' ");
if (mysqli_num_rows($status_anang) > 0) {
  // output data of each row
  $stat_anang = '<label class="badge badge-success">Sudah Melapor</label>';
 } else {
  $stat_anang = '<label class="badge badge-danger">Belum Melapor</label>';
 }

$status_annisa = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && user_name='Annisa' ");
if (mysqli_num_rows($status_annisa) > 0) {
  // output data of each row
  $stat_annisa = '<label class="badge badge-success">Sudah Melapor</label>';
 } else {
  $stat_annisa = '<label class="badge badge-danger">Belum Melapor</label> ';
 }
 
 $status_arya = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && user_name='Arya' ");
if (mysqli_num_rows($status_arya) > 0) {
  // output data of each row
  $stat_arya = '<label class="badge badge-success">Sudah Melapor</label>';
 } else {
  $stat_arya = '<label class="badge badge-danger">Belum Melapor</label>';
 }
 
 $status_dayat = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && user_name='Dayat' ");
if (mysqli_num_rows($status_dayat) > 0) {
  // output data of each row
  $stat_dayat = '<label class="badge badge-success">Sudah Melapor</label>';
 } else {
  $stat_dayat = '<label class="badge badge-danger">Belum Melapor</label> ';
 }
 
 $status_ichsan = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && user_name='Ichsan' ");
if (mysqli_num_rows($status_ichsan) > 0) {
  // output data of each row
  $stat_ichsan = '<label class="badge badge-success">Sudah Melapor</label>';
 } else {
  $stat_ichsan = '<label class="badge badge-danger">Belum Melapor</label> ';
 }
 

 
 $status_nindia = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && user_name='Nindia' ");
if (mysqli_num_rows($status_nindia) > 0) {
  // output data of each row
  $stat_nindia = '<label class="badge badge-success">Sudah Melapor</label>';
 } else {
  $stat_nindia = '<label class="badge badge-danger">Belum Melapor</label>';
 }

  
  $status_alfian = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && user_name='Alfian' ");
  if (mysqli_num_rows($status_alfian) > 0) {
	// output data of each row
	$stat_alfian = '<label class="badge badge-success">Sudah Melapor</label>';
   } else {
	$stat_alfian = '<label class="badge badge-danger">Belum Melapor</label>';
   }

   $status_brians = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && user_name='Brians' ");
   if (mysqli_num_rows($status_brians) > 0) {
	 // output data of each row
	 $stat_brians = '<label class="badge badge-success">Sudah Melapor</label>';
	} else {
	 $stat_brians = '<label class="badge badge-danger">Belum Melapor</label>';
	}




$operator = [
	["1", "Aditya", $stat_aditya, "<a href='form.html'>kirim laporan</a>"],
	["2", "Anang", $stat_anang, "<a href='form'>kirim laporan</a>"],
	["3", "Annisa", $stat_annisa, "<a href='form.html'>kirim laporan</a>"],
	["4", "Arya", $stat_arya, "<a href='form.html'>kirim laporan</a>"],
	["5", "Dayat", $stat_dayat, "<a href='form.html'>kirim laporan</a>"],
	["6", "Ichsan", $stat_ichsan, "<a href='form.html'>kirim laporan</a>"],
	["7", "Nindia", $stat_nindia, "<a href='form.html'>kirim laporan</a>"],	
	["8", "Alfian", $stat_alfian, "<a href='form.html'>kirim laporan</a>"],		
	["9", "Brians", $stat_brians, "<a href='form.html'>kirim laporan</a>"],		


	
];

// REKAP HARIAN TIAP-TIAP MESIN
// Mesin 1
$rekap_output_msn1 = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && machine_id='Mesin 1a' ");
if (mysqli_num_rows($rekap_output_msn1) > 0) {
	while ($data_msn1=mysqli_fetch_array($rekap_output_msn1)){
	 $jml_output_msn1_ok[]    =$data_msn1['product_ok'];
	 $jml_output_msn1_reject[]    =$data_msn1['product_reject'];
	 $jumlah_msn1_ok=array_sum($jml_output_msn1_ok);
	 $jumlah_msn1_reject=array_sum($jml_output_msn1_reject);
    } 
}
else {
	$jumlah_msn1_ok=0;
	$jumlah_msn1_reject=0;
}
// Mesin 2
$rekap_output_msn2 = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && machine_id='Mesin 2a' ");
if (mysqli_num_rows($rekap_output_msn2) > 0) {
	while ($data_msn2=mysqli_fetch_array($rekap_output_msn2)){
	 $jml_output_msn2_ok[]    =$data_msn2['product_ok'];
	 $jml_output_msn2_reject[]    =$data_msn2['product_reject'];
	 $jumlah_msn2_ok=array_sum($jml_output_msn2_ok);
	 $jumlah_msn2_reject=array_sum($jml_output_msn2_reject);
    } 
}
else {
	$jumlah_msn2_ok=0;
	$jumlah_msn2_reject=0;
}

// Mesin 3
$rekap_output_msn3 = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && machine_id='Mesin 3b' ");
if (mysqli_num_rows($rekap_output_msn3) > 0) {
	while ($data_msn3=mysqli_fetch_array($rekap_output_msn3)){
	 $jml_output_msn3_ok[]    =$data_msn3['product_ok'];
	 $jml_output_msn3_reject[]    =$data_msn3['product_reject'];
	 $jumlah_msn3_ok=array_sum($jml_output_msn3_ok);
	 $jumlah_msn3_reject=array_sum($jml_output_msn3_reject);
    } 
}
else {
	$jumlah_msn3_ok=0;
	$jumlah_msn3_reject=0;
}

// Mesin 4a dan 4b
$rekap_output_msn4 = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && (machine_id='Mesin 4a' or machine_id='Mesin 4b') ");
if (mysqli_num_rows($rekap_output_msn4) > 0) {
	while ($data_msn4=mysqli_fetch_array($rekap_output_msn4)){
	 $jml_output_msn4_ok[]    =$data_msn4['product_ok'];
	 $jml_output_msn4_reject[]    =$data_msn4['product_reject'];
	 $jumlah_msn4_ok=array_sum($jml_output_msn4_ok);
	 $jumlah_msn4_reject=array_sum($jml_output_msn4_reject);
    } 
}
else {
	$jumlah_msn4_ok=0;
	$jumlah_msn4_reject=0;
}

// Mesin 5a, 5b, 5c dan 5d
$rekap_output_msn5 = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && (machine_id='Mesin 5a' or machine_id='Mesin 5b' or machine_id='Mesin 5c'or machine_id='Mesin 5d') ");
if (mysqli_num_rows($rekap_output_msn5) > 0) {
	while ($data_msn5=mysqli_fetch_array($rekap_output_msn5)){
	 $jml_output_msn5_ok[]    =$data_msn5['product_ok'];
	 $jml_output_msn5_reject[]    =$data_msn5['product_reject'];
	 $jumlah_msn5_ok=array_sum($jml_output_msn5_ok);
	 $jumlah_msn5_reject=array_sum($jml_output_msn5_reject);
    } 
}
else {
	$jumlah_msn5_ok=0;
	$jumlah_msn5_reject=0;
}

// Mesin 6
$rekap_output_msn6 = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && machine_id='Mesin 6a' ");
if (mysqli_num_rows($rekap_output_msn6) > 0) {
	while ($data_msn6=mysqli_fetch_array($rekap_output_msn6)){
	 $jml_output_msn6_ok[]    =$data_msn6['product_ok'];
	 $jml_output_msn6_reject[]    =$data_msn6['product_reject'];
	 $jumlah_msn6_ok=array_sum($jml_output_msn6_ok);
	 $jumlah_msn6_reject=array_sum($jml_output_msn6_reject);
    } 
}
else {
	$jumlah_msn6_ok=0;
	$jumlah_msn6_reject=0;
}

// Mesin 7
$rekap_output_msn7 = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && machine_id='Mesin 7' ");
if (mysqli_num_rows($rekap_output_msn7) > 0) {
	while ($data_msn7=mysqli_fetch_array($rekap_output_msn7)){
	 $jml_output_msn7_ok[]    =$data_msn7['product_ok'];
	 $jml_output_msn7_reject[]    =$data_msn7['product_reject'];
	 $jumlah_msn7_ok=array_sum($jml_output_msn7_ok);
	 $jumlah_msn7_reject=array_sum($jml_output_msn7_reject);
    } 
}
else {
	$jumlah_msn7_ok=0;
	$jumlah_msn7_reject=0;
}

// Mesin 10
$rekap_output_msn10 = mysqli_query($conn,"SELECT * FROM daily_report_op where DAYOFYEAR(timestamp)=$dayofyear && machine_id='Mesin 10' ");
if (mysqli_num_rows($rekap_output_msn10) > 0) {
	while ($data_msn10=mysqli_fetch_array($rekap_output_msn10)){
	 $jml_output_msn10_ok[]    =$data_msn10['product_ok'];
	 $jml_output_msn10_reject[]    =$data_msn10['product_reject'];
	 $jumlah_msn10_ok=array_sum($jml_output_msn10_ok);
	 $jumlah_msn10_reject=array_sum($jml_output_msn10_reject);
    } 
}
else {
	$jumlah_msn10_ok=0;
	$jumlah_msn10_reject=0;
}

// MENGHITUNG WIP TIAP STATION
// jika hari ini ada opname, maka wip = hasil opname
// jika hari kemarin ada opname, maka wip = (hasil opname + output msn sebelumnya) - yang diproses hari ini
// jika hari kemarin tidak ada opname, maka wip = (produk OK msn sebelumnya hari kemarin + output mesin sebelumnya) - yang diproses hari ini

$today_opname_wip = mysqli_query($conn,"SELECT * FROM opname_wip where DAYOFYEAR(timestamp)=$dayofyear ORDER BY id DESC LIMIT 1");
$yesterday_opname_wip = mysqli_query($conn,"SELECT * FROM opname_wip where DAYOFYEAR(timestamp)=($dayofyear-1) ORDER BY id DESC LIMIT 1");

if (mysqli_num_rows($today_opname_wip) > 0) {
    //echo "hari ini ada opname"."<br>";
	$opname_arr = mysqli_fetch_assoc($today_opname_wip);
    $wip_sta1 = $opname_arr['station_1'];
    $wip_sta2 = $opname_arr['station_2'];
    $wip_sta3 = $opname_arr['station_3'];
    $wip_sta4 = $opname_arr['station_4'];
    $wip_sta5 = $opname_arr['station_5'];
    $wip_sta6 = $opname_arr['station_6'];
    $wip_sta7 = $opname_arr['station_7'];
    $wip_sta10 = $opname_arr['station_10'];
	
	//echo $wip_sta1."<br>";
	//echo $wip_sta2."<br>";
	//echo $wip_sta3."<br>";	
	//echo $wip_sta4."<br>";	
	//echo $wip_sta5."<br>";
	//echo $wip_sta6."<br>";
	//echo $wip_sta7."<br>";
	//echo $wip_sta10."<br>";
	
} else if (mysqli_num_rows($yesterday_opname_wip) > 0) {
    //echo "hari kemarin ada opname"."<br>";
	$opname_arr = mysqli_fetch_assoc($yesterday_opname_wip);
    $wip_sta1 = ($opname_arr['station_1']+$jumlah_msn1_ok )-($jumlah_msn3_ok + $jumlah_msn3_reject);
    $wip_sta2 = ($opname_arr['station_2']+$jumlah_msn2_ok )-($jumlah_msn3_ok + $jumlah_msn3_reject);
    $wip_sta3 = ($opname_arr['station_3']+$jumlah_msn3_ok )-($jumlah_msn4_ok + $jumlah_msn4_reject);
    $wip_sta4 = ($opname_arr['station_4']+$jumlah_msn4_ok )-($jumlah_msn5_ok + $jumlah_msn5_reject);
    $wip_sta5 = ($opname_arr['station_5']+$jumlah_msn5_ok )-($jumlah_msn6_ok + $jumlah_msn6_reject);
    $wip_sta6 = ($opname_arr['station_6']+$jumlah_msn6_ok )-($jumlah_msn7_ok + $jumlah_msn7_reject);
    $wip_sta7 = ($opname_arr['station_7']+$jumlah_msn7_ok );
    $wip_sta10 = $opname_arr['station_10'];
	
	//echo $wip_sta1."<br>";
	//echo $wip_sta2."<br>";
	//echo $wip_sta3."<br>";	
	//echo $wip_sta4."<br>";	
	//echo $wip_sta5."<br>";
	//echo $wip_sta6."<br>";
	//echo $wip_sta7."<br>";
	//echo $wip_sta10."<br>";
	
} else {
    //echo "tidak ada opname";
    $wip_sta1 = $jumlah_msn1_ok -($jumlah_msn3_ok + $jumlah_msn3_reject);
    $wip_sta2 = $jumlah_msn2_ok -($jumlah_msn3_ok + $jumlah_msn3_reject);
    $wip_sta3 = $jumlah_msn3_ok -($jumlah_msn4_ok + $jumlah_msn4_reject);
    $wip_sta4 = $jumlah_msn4_ok -($jumlah_msn5_ok + $jumlah_msn5_reject);
    $wip_sta5 = $jumlah_msn5_ok -($jumlah_msn6_ok + $jumlah_msn6_reject);
    $wip_sta6 = $jumlah_msn6_ok -($jumlah_msn7_ok + $jumlah_msn7_reject);
    $wip_sta7 = $jumlah_msn7_ok;
    $wip_sta10 = $jumlah_msn10_ok - (2*($jumlah_msn5_ok + $jumlah_msn5_reject));
	
	//echo $wip_sta1."<br>";
	//echo $wip_sta2."<br>";
	//echo $wip_sta3."<br>";	
	//echo $wip_sta4."<br>";	
	//echo $wip_sta5."<br>";
	//echo $wip_sta6."<br>";
	//echo $wip_sta7."<br>";
	//echo $wip_sta10."<br>";
}

$lap_opname_wip = mysqli_query($conn,"SELECT * FROM opname_wip where DAYOFYEAR(timestamp)=$dayofyear");
if (mysqli_num_rows($lap_opname_wip) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($lap_opname_wip)) {
    //echo "Nama: " . $row["user_name"]. " - Mesin: " . $row["machine_id"]. " " . $row["product_ok"]. "<br>";
  }
} else {
  echo "";
}

?>
