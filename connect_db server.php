<?php  
//default value


// vairable for connection
  $servername = "server";
  $username = "real_saurabh";
  $password = "srb957#CPANEL";
  $dbname = "real_real_state";


        //Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
