<?php  
//default value


// vairable for connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "real_estate";


        //Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
