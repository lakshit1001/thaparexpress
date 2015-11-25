<?php 
include ('config.php');

$newtable = "CREATE TABLE IF NOT EXISTS members ( ". 
  "memberid int(10) NOT NULL AUTO_INCREMENT, ".
  "name varchar(36) NOT NULL,".
  "rollnum varchar(36) NOT NULL, ".
  "year int(10) NOT NULL,".
  "branch int(2),".
  "hostel int(2) ,".
  "gender int(2) ,".
  "email varchar(200) NOT NULL, ".
  "mobile int(13) NOT NULL ,".
  "password varchar(36) NOT NULL, ".
  "activation varchar(40) DEFAULT NULL, ".
 
  "time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,".

  "PRIMARY KEY (memberid)".
  ")";
$newtable2 = "CREATE TABLE IF NOT EXISTS events ( ". 
  "eventid int(10) NOT NULL AUTO_INCREMENT, ".
   "name text DEFAULT NULL,".
   "descrip text DEFAULT NULL,".
  "image text DEFAULT NULL,".
  "venue text DEFAULT NULL,".
  "time text DEFAULT NULL,".
  "cost text DEFAULT NULL,".
  "code text DEFAULT NULL,".
  
  "timer timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,".
  
  "PRIMARY KEY (eventid)".
  ")";
  
  $newtable3 = "CREATE TABLE IF NOT EXISTS societies ( ". 
  "societyid int(10) NOT NULL AUTO_INCREMENT, ".
   "name text DEFAULT NULL,".
   "descrip text DEFAULT NULL,".
  "image text DEFAULT NULL,".
  "email varchar(36) DEFAULT NULL,".
  "head text DEFAULT NULL,".
  "username varchar(36) DEFAULT NULL,".
  "password varchar(36) DEFAULT NULL,".
  "PRIMARY KEY (societyid)".
  ")";
  
$newtable4 = "CREATE TABLE IF NOT EXISTS teachers ( ". 
  "teacherid int(10) NOT NULL AUTO_INCREMENT, ".
  "name varchar(36) NOT NULL,".
  "email varchar(36) NOT NULL,".
  "department int(2),".
  "gender int(2) ,".
  "mobile int(13) NOT NULL ,".
  "password varchar(36) NOT NULL, ".
 

  "PRIMARY KEY (teacherid)".
  ")";
  
  
  $newtable5 = "CREATE TABLE IF NOT EXISTS bloggers ( ". 
  "bloggerid int(10) NOT NULL AUTO_INCREMENT, ".
   "name text DEFAULT NULL,".
   "descrip text DEFAULT NULL,".
  "image text DEFAULT NULL,".
  "email varchar(36) DEFAULT NULL,".
 
  "blogger varchar(36) DEFAULT NULL,".
  "password varchar(36) DEFAULT NULL,".
  "PRIMARY KEY (bloggerid)".
  ")";

  
$newtable6 = "CREATE TABLE IF NOT EXISTS blogs ( ". 
  "blogid int(10) NOT NULL AUTO_INCREMENT, ".
   "name text DEFAULT NULL,".
   "descrip text DEFAULT NULL,".
  "image text DEFAULT NULL,".

  "code text DEFAULT NULL,".
   "blogger varchar(36) DEFAULT NULL,".
  "timer timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,".
  
  "PRIMARY KEY (blogid)".
  ")";
  
$run = mysql_query($newtable) or die(mysql_error());
$run2 = mysql_query($newtable2) or die(mysql_error());
$run3 = mysql_query($newtable3) or die(mysql_error());
$run4 = mysql_query($newtable4) or die(mysql_error());
$run5 = mysql_query($newtable5) or die(mysql_error());
$query_insert_user = "INSERT INTO `members` (  'name','rollnum','year','branch','email','mobile','password','activation') VALUES ( 'batman','169696969','1','2', '123','8725825811', '1234', NULL )";
$result_insert_user = mysqli_query($dbc, $query_insert_user);


            
            if (!$result_insert_user) {
                echo 'Query Failed ';
            }
echo "Installation Completed, you may now delete this file";
?>
