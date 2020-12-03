<?php 
 $db['db_host']='localhost';
 $db['db_user']='root';
 $db['db_password']='';
 $db['db_name']='blog_bd';
 foreach ($db as $key => $value) {
 	define(strtoupper($key),$value);
 }




 $connect=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  if($connect){
  	  //echo "Database connected";
  }
  else{
  	die("mysqli connection error".mysqli_error($connect));
  }


?>