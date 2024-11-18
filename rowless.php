<?php include('mpambe/connectandcreate.php');?>



<!DOCTYPE html>
<html>
<head>
<style>
.rowless{
 
  /*position: fixed;
z-index: 999;
width:100%;*/
    background-repeat: no-repeat;
  background-size: 100% 30px;
background-image: linear-gradient(#3b0c04, #7d1300); 

opacity: 1;
color:white;
box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
height:20px;
text-align:center;
font-size:16px;
font-family:fontAwesome;
}



</style>
</head>
<body>
<div class="wrapper">
<?php
$query = "SELECT * FROM `receveditems` WHERE  (Unit='Bottles' Or Unit='Ampoules' or Unit='Pieces' ) And `Quantity` < 2 or (Unit='Capsules' Or Unit='Tablets'  ) And `Quantity` < 30     limit 1";
$result = mysqli_query($conn, $query);
$res = mysqli_num_rows($result);


$pos=date('Y-m-d');

$NewDate=Date('y:m:d', strtotime('+30 days'));

$query2 = "SELECT `ExpireDate`,`Description` from`receveditems` where date(`ExpireDate`)  < '$NewDate' limit 1 ";
$result2 = mysqli_query($conn, $query2);




$num=mysqli_num_rows($result2);



?>
<?php
if (mysqli_num_rows($result) > 0) {
 
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <div class="rowless">

 <?php 
echo $res;
echo " Products running out of stock Such as ";
echo  $data['Description']; 


echo "  please add ";

//require_once('Email/email.php');

?>


<?php
if ($num > 0) {
 
  while($data = mysqli_fetch_assoc($result2)) {
 ?>
<br>
<div class="rowless">

 <?php 
echo " Products ";
echo  $data['Description']; 
echo " Expired  Remove to Stock";

?>


  </div>
  </div>

<?php
  }} else { ?>
    
 <?php }}} ?>
 </div>
</body>
</html>
