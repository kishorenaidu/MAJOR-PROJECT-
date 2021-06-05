<?php
require 'util.php';
$ID = isset($_GET['ID']) ? $_GET['ID'] : '';
$sql="update status set status='$ID'";
echo $sql; 
      $db->query($sql);

      
?>