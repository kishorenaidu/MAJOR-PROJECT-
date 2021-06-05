<?php
require 'util.php';


$sql = "SELECT * FROM log ORDER BY ID DESC LIMIT 1;";
     $ret = $db->query($sql);
     $row = $ret->fetchArray(SQLITE3_ASSOC);
     $rrr = array_values($row);
   //  var_dump($row);
   //  echo "<br>ROW";
          echo json_encode($row);
?>