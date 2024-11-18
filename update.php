<?php


include('mpambe/connectandcreate.php');

if(isset($_POST['EdiBbtn'])){
  $id=$_POST['EdiBbtn'];
  $sql="SELECT * FROM `receveditems` where id='$id'";

  $result=mysqli_query($conn,$sql);
  
  
  $row=mysqli_fetch_assoc($result);


  $PurchasingCost=$row['PurchasingCost'];

  
  $VendorName=$row['VendorName'];
$Description=$row['Description'];
$Unit=$row['Unit'];
$Quantity=$row['Quantity'];
$Cost=$row['Cost'];
$Amount=$row['Amount'];

$ExpireDate=$row['ExpireDate' ];

}

?>
<?php

  




if (isset($_POST['submit'])) {
  $id = $_POST['idpassed'];
  $VendorName = $_POST['VendorName'];
  $Description = $_POST['Description'];
  $Unit = $_POST['Unit'];
  $Quantity = $_POST['Quantity'];
  $Cost = $_POST['Cost'];
  $Amount = $_POST['Amount'];
  $ExpireDate = $_POST['ExpireDate'];
  $PurchasingCost = $_POST['PurchasingCost'];

  // Retrieve the current quantity from the database
  $currentQuantityQuery = "SELECT Quantity FROM `receveditems` WHERE id = $id";
  $currentQuantityResult = mysqli_query($conn, $currentQuantityQuery);

  if ($currentQuantityResult) {
      $row = mysqli_fetch_assoc($currentQuantityResult);
      $currentQuantity = $row['Quantity'];

      // Calculate the new quantity by adding the entered quantity to the current quantity
      $newQuantity = $currentQuantity + $Quantity;

      // Update the database with the new quantity
      $sql = "UPDATE `receveditems` SET id = $id, VendorName = '$VendorName', Description = '$Description',
              Unit = '$Unit', Quantity = $newQuantity, PurchasingCost = '$PurchasingCost', 
              Cost = $Cost, Amount = $Amount, ExpireDate = '$ExpireDate' WHERE id = $id";

      $result = mysqli_query($conn, $sql);

      if ($result) {
          //echo 'update successful';
          header('location:display.php');
      } else {
          die(mysqli_error($conn));
      }
  } else {
      die(mysqli_error($conn));
  }
}
?>

     
     
     
     <!doctype html>
      <html lang="en">
        <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- Bootstrap CSS -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <link rel="icon" type="image/jpg" href="image/favicons.jpg">
          <title>Ilazo pharmacy and cosmetics</title>
          <style>
header{
position:relative;

width: 100%;
 color: #003f5c;
  border-bottom: 2px solid #e7e7e7;
font-size:25px;
text-align:center;

font-weight:bold;
padding:13px;

}
nav {

width: 100%;

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
width:100%;
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

width:100%;
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
</style>
        </head>
        <body>
        <div class="wrapper">
          
<a name="top"></a>
<?php include('rowless.php');?><br/>
<header>

<p><b>Update Product</b></p>

</header>

<br/>
<br/>
<nav>
<a href="AdminPanel.php">Home</a> 

<a href="display.php">Received Items</a>

<a href="report.php" >Report</a> 


<a href="adminAction.php" >Action</a> 


<a href="logout.php" >Sign Out</a> 



</nav>



        <div class="container">
      <br/>
        <form method="post">
        <div class="mb-3">
          <label  class="form-label">Vendor Name</label>
          <input type="text" class="form-control" id="Description"
           name="VendorName" autocomplete="off" value="<?php echo $VendorName;?>"
           placeholder="Vendor Name" aria-describedby="emailHelp">
          </div>



        <div class="mb-3">
          <label  class="form-label">Description</label>
          <input type="text" class="form-control" id="Description"
       name="Description" value="<?php echo htmlspecialchars($Description); ?>"
       placeholder="Description" aria-describedby="emailHelp">

          </div>


  
          
		  
		  
		  
		  
		  
		      <div class="mb-4">
          <label  class="form-label">Unit</label>
          
         
          <select class="form-select"  name="newSkill" id="newSkill" 
 onchange="getValue(this)" required>

          <option selected disabled > <?php  echo $Unit;?></option>
          <option value="1">Ampoules</option>    
    <option value="2">Bottles</option>
    <option value="3">Capsules</option>
    <option value="4">Tablets</option>
    <option value="5">Pieces</option>

    
</select>


          
<input type="hidden" id="textch" value=<?php  echo $Unit;?> name="Unit" required>

<script>
function getValue(obj)
{  
   // it will return the selected text
   // obj variable will contain the object of check box
   var text = obj.options[obj.selectedIndex].innerHTML ; 
   
   document.getElementById('textch').value=text;
   

}


               


</script>
        
        
        
        
        </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  

        <div class="mb-5">
  <label class="form-label">Quantity</label>
  <input type="Number" class="form-control" id="Quality" name="Quantity" autocomplete="off" value="<?php echo $Quantity; ?>" placeholder="Quality" aria-describedby="emailHelp">
</div>

<div class="mb-5">
  <label class="form-label"> Purchasing Cost</label>
  <input type="Number" class="form-control" id="Cost" name="PurchasingCost" autocomplete="off" value="<?php echo $PurchasingCost; ?>" placeholder="Purchasing Cost" aria-describedby="emailHelp">
</div>

<div class="mb-5">
  <label class="form-label">Amount</label>
  <input type="Number" class="form-control" id="Amount" name="Amount" autocomplete="off" readonly value="<?php echo $Amount; ?>" placeholder="Amount" aria-describedby="emailHelp">
</div>


<script>
function calculateAmount() {
  let text1 = document.getElementById("Quality");
  let text2 = document.getElementById("Cost");

  let first_number = parseFloat(text1.value);
  if (isNaN(first_number)) first_number = 0;

  let second_number = parseFloat(text2.value);
  if (isNaN(second_number)) second_number = 0;

  let result = first_number * second_number;

  document.getElementById("Amount").value = result;
}

document.getElementById("Quality").addEventListener("input", calculateAmount);
document.getElementById("Cost").addEventListener("input", calculateAmount);


</script>

          <div class="mb-5">
          <label  class="form-label">Seling Cost</label>
          <input type="Number" class="form-control" id="Cost" name="Cost" autocomplete="off"
          
          value=
           <?php
           echo $Cost;
           ?>
          
          
          placeholder="Cost per each" aria-describedby="emailHelp">
          </div>


          
          


          <div class="mb-5">
          <label  class="form-label">Expire Date</label>
          <input type="date" class="form-control" id="ExpireDate" name="ExpireDate" 
          min="<?php echo date("Y-m-d"); ?>"
          
          value=
           <?php
           echo $ExpireDate;
           ?>
         >
          </div>

        <input type="hidden" name="idpassed" value="<?php  echo $_POST['EdiBbtn']; ?>"/>
          



        <button type="submit" name='submit' class="btn btn-primary">Update</button>
      </form>

      </div>
      <div id="icomn">


<a href="https://www.instagram.com/nyoxmlimwap" target="_blank"><img src="icon/Insta.png" width="30" height="26" alt="Instagram icon" ></a>
<a href="mailto:cliffmlimwa@gmail.com" target="_blank"><img src="icon/Gmail.png" width="30" height="20" alt="Gmail icon" ></a>
<a href="https://wa.me/+255767622192/?text=urlencodedtext" target="-black"><img src="icon/tsups.png" width="35" height="26" alt="WhatsApp icon" ></a>
<a href="https://www.facebook.com/profile.php?id=100010160807745" target="_blank"><img src="icon/Fb.png" width="30" height="26" alt="facebook icon" ></a>

</div>


<br/><br/>
<a id="backtotop" href="#top" style="text-decoration:none;">back to top</a>
<footer>

 &copy; <small>Ilazo pharmacy and cosmetics 2022</small>
</footer>
</div>
        </body>
      </html>