
<?php
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
if (!mysqli_select_db($conn,$dbName)){
    $dbName = "ilazo pharmacy and cosmetics";
    $sql = "CREATE DATABASE IF NOT EXISTS ".$dbName;
    if (mysqli_query($conn,$sql)) {
        echo "";
    }else {
        echo "Error creating database: " . $conn->error;
    }

  }
  $query = "CREATE TABLE IF NOT EXISTS orders (
   id int(255) NOT NULL AUTO_INCREMENT,
   ProductId varchar(255) NOT NULL,
    Description varchar(255) NOT NULL,
    Unit varchar(255) NOT NULL,
    Quantity int (255) NOT NULL,
    Cost int (255) NOT NULL,
    PurchasingQty int (255),
    Amount int (255),
    OrderID varchar(255),
    Date varchar(255),
    PRIMARY KEY(id)

    )";



$res2 = mysqli_query($conn, $query);
if($res2){

  
  
  
  
 

}else{

}



$query4 = "CREATE TABLE IF NOT EXISTS receveditems (
  id int(255) NOT NULL AUTO_INCREMENT,
  ProductId varchar(255) NOT NULL,
  VendorName varchar(255) NOT NULL,
   Description varchar(255) NOT NULL,
   Unit varchar(255) NOT NULL,
   Quantity int (255) NOT NULL,
   PurchasingCost int (255) NOT NULL,
   Cost int (255) NOT NULL,
   Amount int (255),
   RecevedDate varchar(255) NOT NULL,
   ExpireDate varchar(255) NOT NULL,

   PRIMARY KEY(id)

   )";



$res4= mysqli_query($conn, $query4);













  $query = "SELECT `id`,  `OrderID`, `Description`, `Unit`, `Quantity`, `Cost`, `PurchasingQty`, `Amount` FROM `orders`";
  $result = mysqli_query($conn, $query);
  
  
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {


  }
}






  $query3 = "CREATE TABLE IF NOT EXISTS OrderGenerator (
    id int(255) NOT NULL AUTO_INCREMENT,
    OrderGenerators varchar(255) NOT NULL,
     
     PRIMARY KEY(id)
 
     )";
 
 
 
 $res3 = mysqli_query($conn, $query3);




  $query = "SELECT `id`, `OrderGenerators` FROM `ordergenerator`";
  $result = mysqli_query($conn, $query);
  
  

if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {


 } }else{
  $sqliv=" INSERT INTO `ordergenerator`(`id`, `OrderGenerators`) VALUES (null,1)";
  $query=mysqli_query($conn,$sqliv) or die(mysqli_error($conn));

  }





  $query3 = "CREATE TABLE IF NOT EXISTS OrderTracker (
    id int(255) NOT NULL AUTO_INCREMENT,
    ProductId varchar(255) NOT NULL,
    OrderID varchar(255) NOT NULL,
    Description varchar(255) NOT NULL,
            PurchasingQty int (255),
            Amount int (255),
     
     PRIMARY KEY(id)
 
     )";
 
 
 
 $res3 = mysqli_query($conn, $query3);



 $queryA = "CREATE TABLE IF NOT EXISTS `userauthentication` (
  id int(255) NOT NULL AUTO_INCREMENT,
  Email varchar (255) NOT NULL,
  Password varchar(255) NOT NULL,
  PRIMARY KEY(id)


  )";



$resA = mysqli_query($conn, $queryA);


$query2 = "SELECT * FROM `userauthentication`";
$result2 = mysqli_query($conn, $query2);

$num=mysqli_num_rows($result2);



 ?>

 <?php
 
 if ($num > 0) {
 
  while($data = mysqli_fetch_assoc($result2 )) {


 } }else{
  $sqliI=" INSERT INTO `userauthentication`(`id`, `Email`, `Password`) VALUES (null,'cliffmlimwa@gmail.com',1)";
  $query=mysqli_query($conn,$sqliI) or die(mysqli_error($conn));

  }
 ?>

 <?php




$query10= "CREATE TABLE IF NOT EXISTS authentication (
  id int(255) NOT NULL AUTO_INCREMENT,
  Email varchar (255) NOT NULL,
  Password varchar (255) NOT NULL,
 
   PRIMARY KEY(id)

   )";



$res10= mysqli_query($conn, $query10);


$queryW = "SELECT * FROM `authentication`";
$resultW = mysqli_query($conn, $queryW );

$numW=mysqli_num_rows($resultW);

?>
 <?php
 
 if ($numW> 0) {
 
  while($data = mysqli_fetch_assoc($resultW )) {


 } }else{
  $sqliI=" INSERT INTO `authentication`(`id`, `Email`, `Password`) VALUES (null,'nyoxmlimwa@gmail.com',1)";
  $query=mysqli_query($conn,$sqliI) or die(mysqli_error($conn));

  }












  $query11= "CREATE TABLE IF NOT EXISTS recevedauthentication (
    id int(255) NOT NULL AUTO_INCREMENT,
    Email varchar (255) NOT NULL,
    Password varchar (255) NOT NULL,
   
     PRIMARY KEY(id)
  
     )";
  
  
  
  $res11= mysqli_query($conn, $query11);
  
  
  $queryz = "SELECT * FROM `recevedauthentication`";
  $resultz = mysqli_query($conn, $queryz );
  
  $numz=mysqli_num_rows($resultz);
  
  ?>
   <?php
   
   if ($numz> 0) {
   
    while($data = mysqli_fetch_assoc($resultz )) {
  
  
   } }else{
    $sqliIz=" INSERT INTO `recevedauthentication`(`id`, `Password`) VALUES (null,'kingkelly7898')";
    $query=mysqli_query($conn,$sqliIz) or die(mysqli_error($conn));
  
    }









 ?>