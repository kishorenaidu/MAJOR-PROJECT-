<?php
require 'util.php';
$table="log";
if(isset($_GET['table'])){
$table=$_GET['table'];
}

$sql="select * from $table";
//SELECT * FROM myTable WHERE myDate >= date('now','-1 day')
      $ret = $db->query($sql);
      $nCols = $ret->numColumns();
      echo "<table><tr>";
	          for ($i = 0; $i < $nCols; $i++) {
	              $colName[$i] = $ret->columnName($i);
	              echo "<th>$colName[$i]</th>";
        }
        echo "<tr>";


      while($row = $ret->fetchArray(SQLITE3_BOTH) ) {
//      var_dump($row);
echo "<tr>";
		for($i=0;$i<$nCols;$i++){
         echo "<td>$row[$i]</td>";
         }
echo "</tr>";
//         echo "name = ". $row[1] ."\n";
//         echo "slotname = ". $row[2] ."\n";
//         echo "time_hr = ". $row[3] ."\n";
//         echo "time_min = ". $row[4] ."\n";
//         echo "regno = ". $row[5] ."\n";
//         echo "time = ".$row[6] ."\n\n<br>";

      }
   echo "Operation done successfully\n";


   $db->close();

?>