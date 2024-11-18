
<?php
include 'session_timeout.php';

// Rest of your page code...
?>

<?php

ob_start();
include 'connect.php';
include('mpambe/connectandcreate.php');

?>

<?php

if(isset($_SESSION['id']) && isset($_SESSION['email'])){

  if(isset($_POST['submit'])){

    $VendorName=$_POST['VendorName'];
    $Description=$_POST['Description'];
    $Unit=$_POST['Unit'];
    $Quantity=$_POST['Quantity'];
    $Cost=$_POST['Cost'];
    $Amount=$_POST['Amount'];
    $ExpireDate=$_POST['ExpireDate'];
    $Receveddate=$_POST['Receveddate'];
    $PurchasingCost=$_POST['PurchasingCost'];
    
    $check = mysqli_query($conn, "SELECT * FROM receveditems ORDER BY id DESC LIMIT 1");
    $chec = mysqli_fetch_assoc($check);
    if($chec=="" || $chec==NULL){$num=1;}else{$num = $chec['id'];}
    $newid = "PROD".($num +1);
    
    $sql="INSERT INTO `receveditems`(`id`,`ProductId`, `VendorName`, `Description`, `Unit`, `Quantity`, `PurchasingCost`, `Cost`, `Amount`, `RecevedDate`, `ExpireDate`) VALUES
     (null, '$newid', '$VendorName','$Description','$Unit','$Quantity','$PurchasingCost','$Cost','$Amount','$Receveddate','$ExpireDate')";
    
    
     $result=mysqli_query($conn,$sql);
    
    
     if($result){
    
    header('location:display.php');
    
     }
    else{
    
    
      die(mysqli_error($con));
    }
    
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Add Bootstrap CSS link -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <meta http-equiv="refresh" content="900;url=logout.php" />
    <title>Received Items</title>

    <link rel="icon" type="image/jpg" href="image/favicons.jpg">




    <link rel="stylesheet" href="library/dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js "  ></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js " ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js " ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js " ></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js " ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js " ></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js "  ></script>









    <style>
      body{

    
      }
header{
position:relative;


 color: #003f5c;
  border-bottom: 2px solid #e7e7e7;
font-size:25px;
text-align:center;

font-weight:bold;
padding:13px;

}
nav {

  

-webkit-box-shadow: 4px 10px 0px -2px rgba(127,127,127,0.82); 
box-shadow: 4px 10px 0px -2px rgba(127,127,127,0.82);
padding:13px;


}
nav a{

padding-right:30px;
color:black;
cursor:pointer;
text-decoration:none;
list-style-type: none; 
font-weight:bold;
font-size:18px;
}

nav a:hover{

font-size:19px;
border-bottom:2px solid #003f5c;
}
footer{

height:30px;
text-align:center;

box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);
-webkit-box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);
-moz-box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);

}
.myinfo1{
text-align:center;
background-color:white;
border-radius:14px;
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.33);
-webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.33);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.33);


height:332px;
}
.myinfo1 img{
position:relative;
overflow: hidden;
margin-top:-56px;

}
#icomn img{
border:1px solid #003f5c;

padding:15px;
 justify-content: space-between;
object-fit: cover;
-webkit-box-shadow: 4px 10px 0px -2px rgba(127,127,127,0.80); 
box-shadow: 4px 10px 0px -2px rgba(127,127,127,0.80);
}
#icomn{
margin-left:40%;

}
#icomn img:hover{

transform: scale(1.3);
cursor:pointer;

}
html {
  scroll-behavior: smooth;
}
#backtotop{
color:#003f5c;
float:right;
margin-top:-32px;
}
#backtotop a{
text-decoration:none;
}

.item:hover {
  width:27px;

  
}

table { 
    table-layout:fixed;
}

@media only screen and (max-width: 480px) {
    /* horizontal scrollbar for tables if mobile screen */
    .tablemobile {
        overflow-x: auto;
        display: block;
    }
}
.itemAdd:hover {
  width:33px;

  
}
.ray{

}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 70%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}


/* Model password validate */

#scan{
  width: 50px;
  float:right;


}  
</style>


</head>
        <body>
        <div class="wrapper">
          
<a name="top"></a>

<?php include('rowless.php');?><br>
<div class="ray">



<header>

<p><b>Received Items</b></p>

</header>


<nav>
<a href="AdminPanel.php">Home</a> 



<a href="report.php" >Report</a> 


<a href="adminAction.php" >Action</a> 


<a href="logout.php" >Sign Out</a> 



</nav>
<br/>
</div>
    <div class="container">



    

<button style="color:white;border-style:none;background-color:white; cursor:pointer;">
  <a href="user.php"  style="text-decoration:none;">

  <div class="itemAdd">
  
  <img src="image/Add.png" width="28px" height="25px;"  id="add">
 </div>

</a>
    

    </button>



    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="display:none">
  Open Form
</button>

    <br> <br>


    <input type="text" id="myInput" style="display:none" onkeyup="myFunction(event)" placeholder="Search for Vender or Description.." title="Type in a name">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



<select class="form-select"  name="newSkill" id="newSkill"  onchange="getValue(this)">

<option selected disabled>Filter</option>

<option value="1">Out of Stock</option>    




</select>


    <div id='mytable2'>

<table  style=" border: 1px;width:100%; " id="MytableNormal" cellspacing="0" cellpadding="10">
  

<thead style="text-align:left;width:100%">



<tr  >

    <th  style="background-color: #343a40;color:white;">No</th>
    <th style="background-color: #343a40;color:white;">Vendor Name</th>
      <th style="background-color: #343a40;color:white;">Description</th>
      <th style="background-color: #343a40;color:white;"  >Unit</th>
      <th style="background-color: #343a40;color:white;">Quantity</th>
      <th style="background-color: #343a40;color:white;">Purch Cost</th>
     
      <th style="background-color: #343a40;color:white;">Amount</th>
      <th style="background-color: #343a40;color:white;">Selling Cost</th>
      <th style="background-color: #343a40;color:white;">Receved Date</th>
      <th style="background-color: #343a40;color:white;">Expire Date</th>
      
      <th style="background-color: #343a40;color:white;">Operation</th>

    </tr>
  </thead>


  
  <tbody id="table-body">


<?php

$sql="SELECT * FROM `receveditems`";
$result=mysqli_query($conn,$sql);





if($result){
while($data=mysqli_fetch_assoc($result)){

  
  ?>
  

<tr >
<?php $id= $data['id']; 

 

?>
 
   <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $sn; ?> </td>
  
     <td id="" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['VendorName']; ?> </td>
     <td id="Description" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Description']; ?> </td>
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Unit']; ?> </td>
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
     <?php

$cal= $data['Quantity'];

if ($data['Unit']=='Bottles'  && $cal<2 ){

  echo "background-color:#f5b5b0;";

}

if ($data['Unit']=='Ampoules'  && $cal<2 ){

  echo "background-color:#f5b5b0;";

}

if ($data['Unit']=='Pieces'  && $cal<2 ){

  echo "background-color:#f5b5b0;";

}



if ($data['Unit']=='Capsules'  && $cal<30 ){

  echo "background-color:#f5b5b0;";

}
if ($data['Unit']=='Tablets'  && $cal<30 ){

  echo "background-color:#f5b5b0;";

}




?>




     
     ">
     
     
     <?php echo $data['Quantity']; ?> </td>



     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['PurchasingCost']; ?> </td>
     
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Amount']; ?> </td>
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Cost']; ?> </td>
     
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['RecevedDate']; ?> </td>
     
	 
	 <?php $expireDate = $data['ExpireDate'];
    $now = time();
    $expire = strtotime($expireDate);
    $diff = $expire - $now;
    $daysRemaining = round($diff / (60 * 60 * 24));
	
	$style = '';
	if ($daysRemaining <= 30) {
      $style = 'style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;background-color:#f5b5b0;"';
    }
    ?>
	
	
    

	 <td <?php echo $style; ?>>
      <?php echo $data['ExpireDate']; ?>
    </td>
	
     
  
  
<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
<form action="update.php" method="POST">
<button  name="EdiBbtn" value="<?php   echo $data['id'];  ?>" style="color:white;border-style:none;background-color:white; cursor:pointer;">
<div class="item"> <img   src="image/editbtn.png" style=" width:20px;"   id="edit" ></div>
</button>

</form>
<form action="delete.php" method="GET">
<button  name="deleteid" value="<?php   echo $data['id'];  ?>"  onclick="return confirm('Are you sure you want to delete this item?');" style="color:white;border-style:none;background-color:white; cursor:pointer;">
<div class="item"> <img   src="image/delete.png" style=" width:20px;"   id="edit" ></div>
</button>
</form>
</td>
</tr> 


<?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>











  </tbody>
</table>
  </div>


<!--  Handle Exp Table -->

<div id='mytable' style="display:none;">

<table  style=" border: 1px;width:100%; " cellspacing="0" cellpadding="10">
  

<thead style="text-align:left;width:100%">



<tr  >

    <th  style="background-color: #343a40;color:white;">No</th>
    <th style="background-color: #343a40;color:white;">Vendor Name</th>
      <th style="background-color: #343a40;color:white;">Description</th>
      <th style="background-color: #343a40;color:white;"  >Unit</th>
      <th style="background-color: #343a40;color:white;">Quantity</th>
      <th style="background-color: #343a40;color:white;">Purch Cost</th>
     
      <th style="background-color: #343a40;color:white;">Amount</th>
      <th style="background-color: #343a40;color:white;">Selling Cost</th>
      <th style="background-color: #343a40;color:white;">Receved Date</th>
      <th style="background-color: #343a40;color:white;">Expire Date</th>
      
      <th style="background-color: #343a40;color:white;">Operation</th>

    </tr>
  </thead>


  
  <tbody id="table-body">


<?php

$sql="SELECT * FROM `receveditems` WHERE  (Unit='Bottles' Or Unit='Ampoules' or Unit='Pieces' ) And `Quantity` < 2 or (Unit='Capsules' Or Unit='Tablets'  ) And `Quantity` < 30";
$result=mysqli_query($conn,$sql);





if($result){
while($data=mysqli_fetch_assoc($result)){

  
  ?>
  

<tr >
<?php $id= $data['id']; 



?>
 
   <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $sn; ?> </td>
  
     <td id="" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['VendorName']; ?> </td>
     <td id="Description" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Description']; ?> </td>
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Unit']; ?> </td>
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;background-color:#f5b5b0;"><?php echo $data['Quantity']; ?> </td>
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['PurchasingCost']; ?> </td>
     
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Amount']; ?> </td>
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Cost']; ?> </td>
     
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['RecevedDate']; ?> </td>
     
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['ExpireDate']; ?> </td>
     
  
  
<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
<form action="update.php" method="POST">
<button  name="EdiBbtn" value="<?php   echo $data['id'];  ?>" style="color:white;border-style:none;background-color:white; cursor:pointer;">
<div class="item"> <img   src="image/editbtn.png" style=" width:20px;"   id="edit" ></div>
</button>

</form>
<form action="delete.php" method="GET">
<button  name="deleteid" value="<?php   echo $data['id'];  ?>"  onclick="return confirm('Are you sure you want to delete this item?');" style="color:white;border-style:none;background-color:white; cursor:pointer;">
<div class="item"> <img   src="image/delete.png" style=" width:20px;"   id="edit" ></div>
</button>
</form>
</td>
</tr> 


<?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>











  </tbody>
</table>



<script>
function getValue(obj)
{  
   // it will return the selected text
   // obj variable will contain the object of check box
  
   
   var x = document.getElementById("mytable");
  if (x.style.display === "none") {
    x.style.display = "block";
   
    document.getElementById("newSkill").selectedIndex = "0";
  
  } else {
    x.style.display = "none";
    document.getElementById("newSkill").selectedIndex = "0";

  }



  var y = document.getElementById("mytable2");
  if (y.style.display === "none") {
    y.style.display = "block";
  } else {
    y.style.display = "none";
  }


}


               


</script>














<script>

//$(document).ready(function() {
//     $('#tableID').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             'copy', 'csv', 'excel', 'pdf', 'print'
//         ]
//     } );
// } );

	/* Initialization of datatables */
	$(document).ready(function () {

	// 	$('#tableID').DataTable( {
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copyHtml5',
    //         'excelHtml5',
    //         'csvHtml5',
    //         'pdfHtml5'
    //     ]
    // } );




		// Paging and other information are
		// disabled if required, set to true
		var myTable = $("#MytableNormal").DataTable({
		paging: true,
		searching: true,
		info: false,

		
        "lengthMenu": [20, 40, 60, 80, 100],
        "pageLength": 20,
		});





	});




</script>
</div>






    </div>



    







<br><br>
<?php
if(isset($_POST['barkod'])){

$Descriptions=$_POST['barkodreader'];


}





?>
<?php  date_default_timezone_set('Africa/nairobi'); 
            $italy_current_time = date("d-m-Y H:i:s"); 
 
 
           ?> 
        <div class="container">
      <br/>
     




<!-- Button to trigger the modal -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Received Items</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <!-- Your existing form goes here -->
        <form method="post">

        <div class="mb-4">
            <label class="form-label">Vendor Name</label>
            <input type="text" class="form-control" id="Unit" name="VendorName" autocomplete="off" placeholder="Vendor Name" aria-describedby="emailHelp" required>
          </div>


          <div class="mb-3">
            <label class="form-label">Description</label>
            <a href="barcode.php"><img id="scan" src="image/scan.png" alt="Scanning" /></a>
            <input type="text" class="form-control" id="Description" name="Description" value="<?php if(isset($_POST['barkod'])){

  $Descriptions=$_POST['barkodreader'];

  echo $Descriptions;

  } ?>" autocomplete="off" placeholder="Description" aria-describedby="emailHelp" required />
          </div>

          <div class="mb-4">
            <label class="form-label">Unit</label>
            <select class="form-select" name="newSkill" id="newSkill" onchange="getValue(this)" required>
              <option selected disabled>Choose one</option>
              <option value="1">Ampoules</option>
              <option value="2">Bottles</option>
              <option value="3">Capsules</option>
              <option value="4">Tablets</option>
              <option value="5">Pieces</option>
            </select>
            <input type="hidden" id="textch" name="Unit" required>
            <script>
              function getValue(obj) {
                var text = obj.options[obj.selectedIndex].innerHTML;
                document.getElementById('textch').value = text;
              }
            </script>
          </div>

          <div class="mb-5">
            <label class="form-label">Quantity</label>
            <input type="Number" class="form-control" id="Quality" name="Quantity" oninput='myFunctions()' onchange="myFunctions();" autocomplete="off" placeholder="Quantity" aria-describedby="emailHelp" required>
          </div>

          <div class="mb-5">
            <label class="form-label">Purchasing Cost</label>
            <input type="Number" class="form-control" id="PurchasingCost" name="PurchasingCost" oninput='myFunctions()' onchange="myFunctions();" autocomplete="off" placeholder="Purchasing Cost" aria-describedby="emailHelp" required>
          </div>

          <div class="mb-5">
            <label class="form-label">Amount</label>
            <input type="Number" class="form-control" id="Amount" name="Amount" autocomplete="off" placeholder="Amount" aria-describedby="emailHelp" required readonly>
          </div>

          <script>
            function myFunctions() {
              var text1 = document.getElementById("Quality");
              var text2 = document.getElementById("PurchasingCost");
              var first_number = parseFloat(text1.value);
              if (isNaN(first_number)) first_number = 0;
              var second_number = parseFloat(text2.value);
              if (isNaN(second_number)) second_number = 0;
              var result = first_number * second_number;
              $result = result;
              document.getElementById("Amount").value = $result;
            }
          </script>

          <div class="mb-5">
            <label class="form-label">Selling Cost</label>
            <input type="Number" class="form-control" id="Cost" name="Cost" autocomplete="off" placeholder="Cost per each" aria-describedby="emailHelp" required>
          </div>

          <div class="mb-5">
            <label class="form-label">Expire Date</label>
            <input type="hidden" name="Receveddate" value="<?php echo $italy_current_time ?>">
            <input type="Date" class="form-control" id="ExpireDate" name="ExpireDate" autocomplete="off" min="<?php echo date("Y-m-d"); ?>" aria-describedby="emailHelp" required>
          </div>

          <button type="submit" name='submit' class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Add Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

<div id="icomn">


<a href="https://www.instagram.com/nyoxmlimwap" target="_blank"><img src="Insta.png" width="26" height="23" alt="Instagram icon" ></a>
<a href="mailto:cliffmlimwa@gmail.com" target="_blank"><img src="Gmail.png" width="26" height="17" alt="Gmail icon" ></a>
<a href="https://wa.me/+255767622192/?text=urlencodedtext" target="-black"><img src="tsups.png" width="27" height="26" alt="WhatsApp icon" ></a>
<a href="https://www.facebook.com/profile.php?id=100010160807745" target="_blank"><img src="Fb.png" width="23" height="26" alt="facebook icon" ></a>

</div>





<br/><br/>
<a id="backtotop" href="#top" style="text-decoration:none;">top</a>
<footer>

 &copy; <small>Ilazo pharmacy and cosmetics 2022</small>
</footer>
</div>
</body>
</html>

<?php

}

else{


  header("Location:authentication.php");

  exit();

}




?>
