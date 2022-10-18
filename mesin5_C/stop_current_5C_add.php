/*
Source1 = https://symask.blogspot.com/2018/10/nodemcu-cara-menyimpan-data-ke-database.html
Source2 = https://www.php.net/manual/en/pdostatement.bindparam.php
Status = 
*/
<?php
    include('current_5C_koneksi.php');
 
    $sensor1 = $_GET['voltage'] ;
    $sensor2 = $_GET['current'] ;
    $sensor3 = $_GET['power'] ;
    $sensor4 = $_GET['energy'] ;
    $sensor5 = $_GET['frequency'] ;
    $sensor6 = $_GET['pf'] ;
	$sensor7 = $_GET['pressure'] ;
	$sensor8 = $_GET['remark'] ;

	$sql = "INSERT INTO current_mesin5_c(voltage,current,power,energy,frequency,pf,pressure,remark) VALUES (:voltage,:current,:power,:energy,:frequency,:pf,:pressure,:remark)";


//$query="INSERT INTO test_mesin1 SET  voltage='$voltage', current='$current'";

    $stmt = $PDO->prepare($sql);
 
    $stmt->bindParam(':voltage', $sensor1);
    $stmt->bindParam(':current', $sensor2);
    $stmt->bindParam(':power', $sensor3);
    $stmt->bindParam(':energy', $sensor4);
    $stmt->bindParam(':frequency', $sensor5);
    $stmt->bindParam(':pf', $sensor6);
    $stmt->bindParam(':pressure', $sensor7);
    $stmt->bindParam(':remark', $sensor8);
    
    if($stmt->execute()) {
        echo "sukses gaes";
    }else{
        echo "gagal gaes";
    }
?>

