<?php
require 'util.php';
//echo "OK";
if(!isset($_GET['type'])){
//$type=$_GET['type'];

$voltage=$_GET['voltage'];
$current=$_GET['current'];
$hours=$_GET['hours'];
$minutes=$_GET['minutes'];
$seconds=$_GET['seconds'];

//$motorstatus=$_GET['motorStatus'];

$sql="insert into log (ID,voltage,current,hours,minutes,seconds,utime)"
              . "values(NULL,'".$voltage."','".$current."','".$hours."','".$minutes."','".$seconds."',"
              . "datetime('now'))";
//      echo $sql;
      $db->query($sql);
   $sql = "SELECT * FROM status ";
     $ret = $db->query($sql);
     $row = $ret->fetchArray(SQLITE3_ASSOC);
          echo $row['status']."@".$row['unit'];
}
else 
if($_GET['type']=="unit"){
$unit = $_GET['unit'];
$sql="update status set unit='$unit'";

      $db->query($sql);
}
else if($_GET['type']=="device"){
$device=$_GET['device'];
$devicestat=$_GET['status'];

if($device=="device1"){
    if($devicestat==1)
        $stat="X";
    else
        $stat="Y";
}else
if($device=="device2"){
    if($devicestat==1)
        $stat="W";
    else
        $stat="Z";
}





$sql="update status set $device='$devicestat',status='$stat'";
echo $sql; 
      $db->query($sql);

}
      
?>