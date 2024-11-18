<?php
include 'mydbCon.php';
$query="SELECT * FROM `receved items` "; // Fetch all the data from the table customers
$result=mysqli_query($con,$query);
?>