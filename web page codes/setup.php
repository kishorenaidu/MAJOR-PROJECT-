<?php
 class MyDB extends SQLite3 {
      function __construct() {
         $this->open('meter.db');
      }
   }

   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $db->query("drop table log");
   $db->query("drop table userinfo");
   $db->query("drop table status");
   

   $sql = "CREATE TABLE log (
 ID                      INTEGER primary key,
  gas1             VARCHAR2(100) NOT NULL,
  gas2             VARCHAR2(100) NOT NULL,
 temperature                VARCHAR2(10) NOT NULL,
 humidity              VARCHAR2(100) NOT NULL, status              VARCHAR2(100) NOT NULL,

 UTIME                    DATETIME
 );";
try{   
 $db->query($sql);
} catch (Exception $e){
    
}
 $sql = "CREATE TABLE userinfo (
 ID                      INTEGER auto increment,
 name                    VARCHAR2(100) NOT NULL,
 email                   VARCHAR2(255) NOT NULL,
 password                VARCHAR2(50) NOT NULL,
 mobile                  VARCHAR2(12) NOT NULL,
 address                VARCHAR2(150) NOT NULL

 );";
try{   
 $db->query($sql);
} catch (Exception $e){} 
 
$sql="create table status ("
        . "device1   varchar(10), "
        . "device2   varchar (10), "
        . "unit      varchar (10),"
        . "status    varchar (10) "
        . ");";
        
try{   
 $db->query($sql);
 $db->query("insert into status (device1,device2,unit,status) values(0,0,0,0)");
} catch (Exception $e){} 
        

 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

