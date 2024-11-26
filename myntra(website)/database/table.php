<?php


// Create connection
$conn = new mysqli("localhost","root","","forms");
// $a=mysqli_select_db($conn,"registerform");

// $db="CREATE DATABASE registerform";
// $result1=$conn->query($db);

// if($result1) {
//     echo "database created successfully" ;
//   }
//   else{
//   echo "database is not created" ;
//   }


$q="CREATE TABLE registertable (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email varchar(255),
    password varchar(255)
);";
$result1=$conn->query($q);

if($result1) {
    echo "table created successfully" ;
  }
  else{
  echo "table is not created" ;
  }


?>