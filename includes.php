<?php
  
  $host = $_SERVER['HTTP_HOST'];
  if ($host == 'localhost:8888') {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "root";
    $dbname = "idm232";
  }
  else {
    $dbhost = "localhost";
    $dbuser = "vstauffe_idm232";
    $dbpass = "AHenry108";
    $dbname = "vstauffe_idm232";
  }
  
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  
  if (mysqli_connect_errno()) {
      die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
      );
    }
  
?>