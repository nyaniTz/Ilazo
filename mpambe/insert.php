<?php  
include('connectandcreate.php');





$sqli = "SELECT * FROM `OrderGenerator` ORDER BY OrderGenerators DESC LIMIT 1";
$result = $conn->query($sqli);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<br>  ". $row["id"]. "<br>";
            $oldget=" ". $row["OrderGenerators"]. "";
echo $oldget;
    }
} else {
    
}



?>
<?php

include('connectandcreate.php');


$servername = "localhost";
$username = "root";
$password = "7898@";
$dbName = "ilazo pharmacy and cosmetics";

// Connect to MySQL
$con = new mysqli($servername, $username, $password);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
else      {

 
}
// If database is not exist create one
if (!mysqli_select_db($con,$dbName)){
    $sql = "CREATE DATABASE ".$dbName;
    if ($con->query($sql) === TRUE) {
        echo "";
    }else {
        echo "Error creating database: " . $con->error;
    }

  }



if(!$con){

    die(mysqli_error($con));
    echo "something wrong contact  nyox";
}

if (isset($_GET['btn_save2'])){

$DescriptionZ =mysqli_real_escape_string($con,$_GET['Description']);


$UnityZ = mysqli_real_escape_string($con,$_GET['Unitys']);
$quantityZ =mysqli_real_escape_string($con,$_GET['quantitys']);
$TextZ = mysqli_real_escape_string($con,$_GET['Text1s']);
$PurchaseQtyZ = mysqli_real_escape_string($con,$_GET['PurchaseQty']);
$AmountZ= mysqli_real_escape_string($con,$_GET['Amount1']);
$Quantitycalc=mysqli_real_escape_string($con,$_GET['Quantitycalc']);
$idtaker=mysqli_real_escape_string($con,$_GET['idtaker']);
$Date=mysqli_real_escape_string($con,$_GET['Date']);
$ProductId=mysqli_real_escape_string($con,$_GET['ProductId']);


$checka = mysqli_query($con, "SELECT * FROM `ordertracker` ");
$numa = mysqli_num_rows($checka);
if($numa>0){
    $rows =mysqli_query($con, "SELECT * FROM `ordertracker` ORDER BY id DESC LIMIT 1");
    $arr = mysqli_fetch_assoc($rows);
    $newid = $arr['OrderID'];
}else{

    $check = mysqli_query($con, "SELECT * FROM orders ORDER BY id DESC LIMIT 1");
    $chec = mysqli_fetch_assoc($check);
    $num = $chec['id'];
    $newid = "ORD".($num +1);
}

$sql= "INSERT INTO `orders`(`id`, `ProductId`, `Description`, `Unit`, `Quantity`, `Cost`, `PurchasingQty`, `Amount`, `OrderID`, `Date`) VALUES
 (NULL,'$ProductId','$DescriptionZ','$UnityZ','$quantityZ','$TextZ','$PurchaseQtyZ','$AmountZ','$newid ','$Date')";
  $query=mysqli_query($con,$sql) or die(mysqli_error($con));
  if($query)
  {


     
      
      
  } else {
      echo "Failed to save data";
  }


  $sql2= "INSERT INTO `ordertracker`(`id`, `ProductId`,`OrderID`, `Description`, `PurchasingQty`, `Amount`)
  VALUES (NULL,'$ProductId','$newid','$DescriptionZ','$PurchaseQtyZ','$AmountZ')";
    $query=mysqli_query($con,$sql2) or die(mysqli_error($con));



$sql3="UPDATE `receveditems` SET `Quantity`='$Quantitycalc' where id='$idtaker'";
$query=mysqli_query($con,$sql3) or die(mysqli_error($con));


if($sql3 && $sql2 && $sql){
    header('location:orderdetals.php');
    mysqli_close($conn);

}

}
?>






