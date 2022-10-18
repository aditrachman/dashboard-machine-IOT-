<?php
/*
Script  : PHP-JSON-MySQLi-GoogleChart
Author  : Enam Hossain
version : 1.0

Copied from : https://qastack.id/programming/12994282/php-mysql-google-chart-json-complete-example
Date : 7 Oct 2021
Title : Contoh PHP-MySQLi-JSON-Google Chart

Test result = OK
*/

/*
--------------------------------------------------------------------
Usage:
--------------------------------------------------------------------

Requirements: PHP, Apache and MySQL

Installation:

  --- Create a database by using phpMyAdmin and name it "chart"
  --- Create a table by using phpMyAdmin and name it "googlechart" and make sure table has only two columns as I have used two columns. However, you can use more than 2 columns if you like but you have to change the code a little bit for that
  --- Specify column names as follows: "weekly_task" and "percentage"
  --- Insert some data into the table
  --- For the percentage column only use a number

      ---------------------------------
      example data: Table (googlechart)
      ---------------------------------

      weekly_task     percentage
      -----------     ----------

      Sleep           30
      Watching Movie  10
      job             40
      Exercise        20     


*/

/* Your Database Name */

$DB_NAME = 'db_sensor';

/* Database Host */
$DB_HOST = 'localhost';

/* Your Database User Name and Passowrd */
$DB_USER = 'root';
$DB_PASS = '';





  /* Establish the database connection */
  $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }
  
  $batas_atas = 200; 
  $batas_bawah = $batas_atas-50; 
  /* $batas_atas = SELECT id FROM current_mesin5_c ORDER BY id DESC LIMIT 2; 
  echo $batas_atas;
  echo $batas_bawah; */
   /* select all the weekly tasks from the table googlechart */
  //$result = $mysqli->query('SELECT * FROM current_mesin5_c where id LIMIT 452, 535'); // program untuk membatasi tampilan grafik 
  $result = $mysqli->query('SELECT * FROM current_mesin5_c where id LIMIT 391, 450'); // program untuk membatasi tampilan grafik 


  /*
      ---------------------------
      example data: Table (googlechart)
      --------------------------
      Weekly_Task     percentage
      Sleep           30
      Watching Movie  10
      job             40
      Exercise        20       
  */


echo date('l, d / m / Y');
echo "<br/>";
date_default_timezone_set('Asia/Jakarta');
echo 'Time: ' .date('G:i:s');
echo "<br/>";


  $rows = array();
  $table = array();
  $table['cols'] = array(

    // Labels for your chart, these represent the column titles.
    /* 
        note that one column is in "string" format and another one is in "number" format 
        as pie chart only required "numbers" for calculating percentage 
        and string will be used for Slice title
    */

    array('label' => 'Weekly Task', 'type' => 'string'),
    array('label' => 'Current', 'type' => 'number'),
    array('label' => 'Pressure', 'type' => 'number')

);
    /* Extract the information from $result */
    foreach($result as $r) {

      $temp = array();

      // The following line will be used to slice the Pie chart

      $temp[] = array('v' => (string) $r['time']); 

      // Values of the each slice

      $temp[] = array('v' => (int) $r['current']); 
	  $temp[] = array('v' => (int) $r['pressure']); 
      $rows[] = array('c' => $temp);
	  
    }

$table['rows'] = $rows;

// convert data into JSON format
$jsonTable = json_encode($table);
//echo $jsonTable;


?>


<html>
  <head>
  <meta http-equiv="refresh" content="5" />
<!-- 
kalau dipasang di head, script seperti berikut ini 
<meta http-equiv=refresh content=10;url=index.php>   

-->
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
          title: 'Mesin 5C - Current & Pressure', 
		           
          is3D: 'true',
          width: 800,
          height: 600,
		  
		  hAxis: {title: 'Time', minValue: 0.00, maxValue: 1700.00 }, //horizontal axis
          vAxis: {title: 'Current(A) - Pressure(bar)', minValue: 0.00, maxValue: 2.00 }, //vertical axis asalkan value lebih kecil dari setting
	  		  
		  
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
	  // var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
	  // var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
      chart.draw(data, options);
    }
    </script>


    <style>
        table, th, td {
         border: 1px solid black;
        }
        
    </style>


  </head>

  <body>
    <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>


  <body>
    <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>
    
    
    <!--    <h3 style="color:red">Data terbaru</h3> -->


    

    
  </body>




















  </body>
</html>