<?php
include 'conn/koneksi.php';


//$dayofyear = 168;
$dayofyear = date("z")+1; 
$output_mesin1_a = mysqli_query($koneksi,"SELECT * FROM mesin1_a where DAYOFYEAR(time)=$dayofyear");
$output_mesin2_a = mysqli_query($koneksi,"SELECT * FROM mesin2_a where DAYOFYEAR(time)=$dayofyear");
$output_mesin3_b = mysqli_query($koneksi,"SELECT * FROM mesin3_b where DAYOFYEAR(time)=$dayofyear");
$output_mesin4_a = mysqli_query($koneksi,"SELECT * FROM mesin4_a where DAYOFYEAR(time)=$dayofyear");
$output_mesin4_b = mysqli_query($koneksi,"SELECT * FROM mesin4_b where DAYOFYEAR(time)=$dayofyear");
$output_mesin5_a = mysqli_query($koneksi,"SELECT * FROM mesin5_a where DAYOFYEAR(time)=$dayofyear");
$output_mesin5_b = mysqli_query($koneksi,"SELECT * FROM mesin5_b where DAYOFYEAR(time)=$dayofyear");
$output_mesin5_c = mysqli_query($koneksi,"SELECT * FROM mesin5_c where DAYOFYEAR(time)=$dayofyear");
$output_mesin5_d = mysqli_query($koneksi,"SELECT * FROM mesin5_d where DAYOFYEAR(time)=$dayofyear");
$output_mesin6_a = mysqli_query($koneksi,"SELECT * FROM mesin6_a where DAYOFYEAR(time)=$dayofyear");

$jumlah_output_mesin1_a = mysqli_num_rows($output_mesin1_a);
$jumlah_output_mesin2_a = mysqli_num_rows($output_mesin2_a);
$jumlah_output_mesin3_b = mysqli_num_rows($output_mesin3_b);
$jumlah_output_mesin4_a = mysqli_num_rows($output_mesin4_a);
$jumlah_output_mesin4_b = mysqli_num_rows($output_mesin4_b);
$jumlah_output_mesin5_a = mysqli_num_rows($output_mesin5_a);
$jumlah_output_mesin5_b = mysqli_num_rows($output_mesin5_b);
$jumlah_output_mesin5_c = mysqli_num_rows($output_mesin5_c);
$jumlah_output_mesin5_d = mysqli_num_rows($output_mesin5_d);
$jumlah_output_mesin6_a = mysqli_num_rows($output_mesin6_a);

$output_station1 = $jumlah_output_mesin1_a;
$output_station2 = $jumlah_output_mesin2_a;
$output_station3 = $jumlah_output_mesin3_b;
$output_station4 = $jumlah_output_mesin4_a + $jumlah_output_mesin4_b;
$output_station5 = $jumlah_output_mesin5_a + $jumlah_output_mesin5_b + $jumlah_output_mesin5_c + $jumlah_output_mesin5_d;
$output_station6 = $jumlah_output_mesin6_a;

$masker_station1 = $output_station1*6;
$masker_station2 = $output_station2*1;
$masker_station3 = $output_station3*1;
$masker_station4 = $output_station4*2;
$masker_station5 = $output_station5/4;
$masker_station6 = $output_station6/2;

$hari = date("l");
$tanggal = date("Y-m-d");
// Target output hari ini 
$target_sta1 = 1500;
$target_sta2 = 1500;
$target_sta3 = 1500;
$target_sta4 = 1500;
$target_sta5 = 1500;
$target_sta6 = 1500; 

// Menghitung prosentase output 
$prosentase_target_sta1 = round(($masker_station1/$target_sta1)*100) ." %";
$prosentase_target_sta2 = round(($masker_station2/$target_sta2)*100) ." %";
$prosentase_target_sta3 = round(($masker_station3/$target_sta3)*100) ." %";
$prosentase_target_sta4 = round(($masker_station4/$target_sta4)*100) ." %";
$prosentase_target_sta5 = round(($masker_station5/$target_sta5)*100) ." %";
$prosentase_target_sta6 = round(($masker_station6/$target_sta6)*100) ." %";

?>