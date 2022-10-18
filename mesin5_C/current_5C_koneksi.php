/*
Source = https://symask.blogspot.com/2018/10/nodemcu-cara-menyimpan-data-ke-database.html
*/

<?php
    try {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_sensor";
 
        $PDO = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8", $username, $password);
    } catch (PDOException $erro) {
        echo "Gagal Terhubung ke database : " . $erro->getMessage();
    }
 
?>