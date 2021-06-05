<?php
$title="Industry Monitoring";
$college="";
class MyDB extends SQLite3 {
      function __construct() {
         $this->open('meter.db');
      }
   }
    $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
    //  echo "Opened database successfully\n";
   }
   
   ?>
