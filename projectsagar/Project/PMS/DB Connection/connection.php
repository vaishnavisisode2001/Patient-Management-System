<?php

//Connecting to database

$servername = "localhost";
$username = "root";
$password = "";
$database = "patient_management_system";

//Create Connection Object
$conn = mysqli_connect($servername, $username, $password, $database);



if(!$conn){
    die("Connection was unsuccessful :".mysqli_connect_error());
}
else{
echo "Connection was Successful";
}
?>