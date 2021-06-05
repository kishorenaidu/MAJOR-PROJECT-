<?php
require 'util.php';

$type=$_GET['type'];

if($type=="unit"){
    $sql = "SELECT * FROM status ";
     $ret = $db->query($sql);
     $row = $ret->fetchArray(SQLITE3_ASSOC);
          echo $row['unit'];
}else
if($type=="device"){
    $sql = "SELECT * FROM status ";
     $ret = $db->query($sql);
     $row = $ret->fetchArray(SQLITE3_ASSOC);
          echo $row['status'];
}    

?>