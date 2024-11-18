<?php include('mpambe/connectandcreate.php');?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>





/* Green */






/*bird ----------------------------------------------- */
</style>
<title>ilazo report</title>
</head>
<body >
<div class="wrapper">
<a name="top"></a>
<header>
<?php include('rowless.php');?>
<p><b>Report</b></p>

</header>
<br/>
<nav>
<a href="AdminPanel.php">Home</a> 

<a href="display.php" >Receved Items</a> 

<a href="adminAction.php" >Action</a> 

<a href="authentication.php" >Sign Out</a> 


</nav>

<?php
$query = "SELECT * FROM `orders`";
$result = mysqli_query($conn, $query);
?>



<div id='mytable'>

<table  style=" border: 1px; width:100%;" cellspacing="0" cellpadding="10">
  

<thead style="text-align:left;">



<tr  >
	
<th style="background-color: #343a40;color:white;" > NO</th>


  <th style="background-color: #343a40;color:white;">Description</th>
  <th style="background-color: #343a40;color:white;">Purchasing Qty</th>
  <th style="background-color: #343a40;color:white;">Amount</th>

  
  
</tr>
</thead> 


 




</div>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr >
   
 <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $sn; ?> </td>

   <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Description']; ?> </td>
   <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['PurchasingQty']; ?> </td>
   <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Amount']; ?> </td>
   

 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>




<br/><br/>


  
  
  </div>




</body>
</html>
