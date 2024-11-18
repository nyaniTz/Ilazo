

<?php
include('connectandcreate.php');
$servername = "localhost";
$username = "root";
$password = "7898@";
$dbName = "ilazo pharmacy and cosmetics";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If database is not exist create one
if (!mysqli_select_db($conn,$dbName)){
    $sql = "CREATE DATABASE ".$dbName;
    if ($conn->query($sql) === TRUE) {
        echo "";
    }else {
        echo "Error creating database: " . $conn->error;
    }

  }

  $queryz = "CREATE TABLE IF NOT EXISTS ordergenerator (
    id int(255) NOT NULL AUTO_INCREMENT,
    OrderGenerators varchar(255) NOT NULL,
     
     PRIMARY KEY(id)
 
     )";
 
 
 
 $res2z = mysqli_query($conn, $queryz);


  $query = "CREATE TABLE IF NOT EXISTS orders (
    id int(255) NOT NULL AUTO_INCREMENT,
    Description varchar(255) NOT NULL,
    Unit varchar(255) NOT NULL,
    Quantity int (255) NOT NULL,
    Cost int (255) NOT NULL,
    PurchasingQty int (255),
    Amount int (255),
    PRIMARY KEY(id)
  
    )";



$res2 = mysqli_query($conn, $query);
if($res2){


}else{

}

  $query = "SELECT `id`,  `OrderID`, `Description`, `Unit`, `Quantity`, `Cost`, `PurchasingQty`, `Amount` FROM `orders`";
  $result = mysqli_query($conn, $query);
  
  
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   
  
<?php  


$sql = "SELECT * FROM `orders` WHERE id=(SELECT max(id) FROM `orders`)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>  ". $row["id"]. "<br>";
            $oldget=" ". $row["id"]. "";



    }
} else {
  
    $sql2="INSERT INTO `orders`(`id`, `Description`, `Unit`, `Quantity`, `Cost`, `PurchasingQty`, `Amount`, `OrderID`) VALUES (Null,'Default',0,0,0,0,0,0)";


    $query1=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
    if($query1){

        echo "sucessfull";
        
    }
    else{
        echo "Not sucessfull";

    }
}












if(isset($_POST['neworder'])){

    $newordetext=$_POST['newordetext'];
echo $newordetext;


 



         

$sqli="INSERT INTO `ordergenerator`(`id`, `OrderGenerators`) VALUES (NULL,'$newordetext')";

$query=mysqli_query($conn,$sqli) or die(mysqli_error($conn));




  if($query)
  {
      echo "Data Saved Successfully";
 
      header("Location: index.php");
      
      
  } else {
      echo "Failed to Create order create again";
      $conn->close();

  }
}
//$conn->close();


  
?>


<tr>
 <?php
  }} else { header("Location: index.php");?>
    
 <?php header("Location: index.php");} ?>