<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require 'util.php';
//require_once ('Pager.php');
 
/* Replace this with your database details */
 
/* First we need to get the total rows in the table */


 
/* Total number of rows in the logs table */
$totalItems = 100;
 
/* Set some options for the Pager */
$pager_options = array(
'mode'       => 'Sliding',   // Sliding or Jumping mode. See below.
'perPage'    => 10,   // Total rows to show per page
'delta'      => 4,   // See below
'totalItems' => $totalItems,
);
 
/* Initialize the Pager class with the above options */
//$pager = Pager::factory($pager_options);
 
/* Display the links */
//echo $pager->links;
 
/* The following code will retreive the result using the pager options */
 
/* The function below will get the page offsets to be used with
the database query. For e.g if we are on the third page then the
$from variable will have the value of '21' (we are showing 10 items per 
page, remember) and the $to variable will have the value of '30'.
*/
$perPage = $pager_options['perPage'];
 

$sql="select * from log";

      $ret = $db->query($sql);
      while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
//      var_dump($row);
         echo 'ID = '.$row['ID']."\n";
         echo "voltafe = ". $row['voltage'] ."\n";
         echo "current = ". $row['current'] ."\n";
         echo "power = ". $row['power'] ."\n";
         echo "motorStatus = ". $row['status'] ."\n";
         echo "Electric Status = ". $row['notification'] ."\n";
         echo "time= ".$row['UTIME'] ."\n\n<br>";

      }
      
      
      
$sql="select * from status";

      $ret = $db->query($sql);
      while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
//      var_dump($row);
         
         echo "device1 = ". $row['device1'] ."\n";
         echo "device2 = ". $row['device2'] ."\n";
         echo "unit = ". $row['unit'] ."\n";
         echo "status = ". $row['status'] ."\n";
         
         
         
         echo "\n\n<br>";

      }
   echo "Operation done successfully\n";


   $db->close();

?>