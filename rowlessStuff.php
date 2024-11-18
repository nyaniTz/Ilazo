<?php include('mpambe/connectandcreate.php');?>



<!DOCTYPE html>
<html>
<head>
<style>
/*shake image */
#messageison {
  animation: shake 5.5s;
  animation-iteration-count: infinite;
}

@keyframes shake {
 
  
  0% { transform: translate(1px, 1px) rotate(1deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(1deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-400deg); }
  60% { transform: scale(2.1); }
  
  60% { transition: all ease 500ms; }
 
  
}



</style>
</head>
<body>
<div class="wrapper">
<?php
$query = "SELECT * FROM `receveditems` WHERE `Quantity` < 15 limit 1";
$result = mysqli_query($conn, $query);
$res = mysqli_num_rows($result);


?>
<?php
if (mysqli_num_rows($result) > 0) {
 
  while($data = mysqli_fetch_assoc($result)) {
 ?>

 <img src="image/Newmessage.png" style="margin-left:-12px;" id="messageison" width="36px;" height="25px;" alt="new message">




  </div>



<?php
  }} else { ?>
    
 <?php } ?>
 </div>
</body>
</html>
