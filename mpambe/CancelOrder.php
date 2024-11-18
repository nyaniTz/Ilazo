<?php
include('connectandcreate.php');

if(isset($_POST["print"])){

    $getolder=$_POST["print"];



    $sql="DELETE FROM `ordertracker` ";
    $result=mysqli_query($conn,$sql);
    
}

if(isset($_POST["cancelorder"])){


$getolder=$_POST["cancelorder"];


$sql="DELETE FROM `ordertracker` ";
    $result=mysqli_query($conn,$sql);
    
$sql="DELETE FROM `ordertracker` WHERE  OrderID= $getolder";
$result=mysqli_query($conn,$sql);


$sql="DELETE FROM `orders` WHERE  OrderID= $getolder";
$result=mysqli_query($conn,$sql);



if($result){
//echo 'deleted successfull';
header('location:index.php');

}
else{

    die(mysqli_error($conn));
    header('location:index.php');
}

}
else{

    header('location:index.php');
}


$sql3="UPDATE `receveditems` SET `Quantity`='$Quantitycalc' where id='$idtaker'";
$query=mysqli_query($con,$sql3) or die(mysqli_error($con));



?>