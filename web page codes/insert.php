<?php
require 'util.php';


$gas1=$_POST['gas1'];
$gas2=$_POST['gas2'];
$temperature=$_POST['temperature'];
$humidity=$_POST['humidity'];
$status=$_POST['status'];
$response = Array();


//$motorstatus=$_GET['motorStatus'];

$sql="insert into log (ID,gas1,gas2,temperature,status,humidity,utime)"
              . "values(NULL,'".$gas1."','".$gas2."','".$temperature."','".$status."','".$humidity."',"
              . "datetime('now'))";
//      echo $sql;
      
      if($db->query($sql))
	  {
	  $response['error'] = false; 
      $response['message'] = 'updated';
      
	  }
	  echo json_encode($response);
	  ?>