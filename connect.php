<?php

include('mpambe/connectandcreate.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ilazo pharmacy and cosmetics";

// Connect to MySQL

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If database is not exist create one
$db=mysqli_select_db($conn,'ilazo pharmacy and cosmetics');
if(empty($db)){

$dbcr="create database ilazo pharmacy and cosmetics";
$check=mysqli_query($conn,$dbcr);


}


?>


