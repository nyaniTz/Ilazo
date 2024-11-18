<?php
include('mpambe/connectandcreate.php');
include 'connect.php';
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
     
     
     
     
     
     <!doctype html>
      <html lang="en">
        <head>


        <link href="mpambe/library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
        <script src="mpambe/library/bootstrap-5/bootstrap.bundle.min.js"></script>
        <script src="mpambe/library/dselect.js"></script>

          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- Bootstrap CSS -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <link rel="icon" type="image/jpg" href="image/favicons.jpg">
          
          <title>Add Items</title>
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

#scan{
  width: 50px;
  float:right;


}

</style>

<body>  
<div class="wrapper">
<a name="top"></a>
<?php include('rowless.php');?><br>
<header>

<p><b>Add Received Items</b></p>

</header>

<br/>
<nav>

<a href="AdminPanel.php">Home</a> 

<a href="display.php">Received Items</a>

<a href="report.php" >Report</a> 


<a href="adminAction.php" >Action</a> 


<a href="logout.php" >Sign Out</a> 




</nav>
<!--
</head>
        


        <div class="wrapper">

<header>

<p><b>Add Product</b></p>

</header>
-->
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
        <form method="post">

        <div class="mb-4">
          <label  class="form-label">Vendor Name</label>
          <input type="text" class="form-control" id="Unit" name="VendorName" autocomplete="off" placeholder="Vendor Name" aria-describedby="emailHelp" required>
          </div>

        <div class="mb-3">
          <label  class="form-label">Description</label>
          <a href="barcode.php" ><img  id="scan" src="image/scan.png"  alt="Scanning" /></a>
          <input type="text" class="form-control" id="Description" name="Description" value="<?php if(isset($_POST['barkod'])){

$Descriptions=$_POST['barkodreader'];

echo $Descriptions;


}   ?>" autocomplete="off" placeholder="Description" aria-describedby="emailHelp" required />



          </div>


      <div class="mb-4">
          <label  class="form-label">Unit</label>
          
         
          <select class="form-select"  name="newSkill" id="newSkill"  onchange="getValue(this)" required>

          <option selected disabled>Choose one</option>
          <option value="1">Ampoules</option>    
    <option value="2">Bottles</option>
    <option value="3">Capsules</option>
    <option value="4">Tablets</option>
    <option value="5">Pieces</option>

    
</select>


<input type="hidden" id="textch" name="Unit" required>

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
          <label  class="form-label">Quantity</label>
          <input type="Number" class="form-control" id="Quality" name="Quantity" oninput='myFunctions()' onchange="myFunctions();" autocomplete="off"  placeholder="Quantity" aria-describedby="emailHelp" required>
          </div>


          <div class="mb-5">
          <label  class="form-label">Purchasing Cost</label>
          <input type="Number" class="form-control" id="PurchasingCost" name="PurchasingCost" oninput='myFunctions()' onchange="myFunctions();" autocomplete="off"  placeholder="Purchasing Cost" aria-describedby="emailHelp" required>
          </div>
        
          <div class="mb-5">
          <label  class="form-label">Amount</label>
          <input type="Number" class="form-control" id="Amount"  name="Amount" autocomplete="off"  placeholder="Amount" aria-describedby="emailHelp" required readonly>
          </div>

          <script>

          

function myFunctions(){
 
  

var text1 = document.getElementById("Quality");
var text2 = document.getElementById("PurchasingCost");




 
   var first_number = parseFloat(text1.value);
   if (isNaN(first_number)) first_number = 0;
   var second_number = parseFloat(text2.value);
   if (isNaN(second_number)) second_number = 0;
   var result = first_number * second_number;
   $result=result;
   document.getElementById("Amount").value = $result;
  
  

}

          </script>




          <div class="mb-5">
          <label  class="form-label">Seling Cost</label>
          <input type="Number" class="form-control" id="Cost" name="Cost" autocomplete="off"  placeholder="Cost per each" aria-describedby="emailHelp" required>
          </div>


          
         

          <div class="mb-5">
          <label  class="form-label">Expire Date</label>


          <input type="hidden" name="Receveddate" value="<?php  echo $italy_current_time ?> "> 

          
          <input type="Date" class="form-control" id="Amount" name="ExpireDate" autocomplete="off" min="<?php echo date("Y-m-d"); ?>" aria-describedby="emailHelp" required>
          </div>





          






        <button type="submit" name='submit' class="btn btn-primary">Submit</button>
      </form>

      </div>
      <div id="icomn">


<a href="https://www.instagram.com/nyoxmlimwap" target="_blank"><img src="icon/Insta.png" width="30" height="26" alt="Instagram icon" ></a>
<a href="mailto:cliffmlimwa@gmail.com" target="_blank"><img src="icon/Gmail.png" width="30" height="20" alt="Gmail icon" ></a>
<a href="https://wa.me/+255767622192/?text=urlencodedtext" target="-black"><img src="icon/tsups.png" width="35" height="26" alt="WhatsApp icon" ></a>
<a href="https://www.facebook.com/profile.php?id=100010160807745" target="_blank"><img src="icon/Fb.png" width="30" height="26" alt="facebook icon" ></a>

</div>


<br/><br/>
<a id="backtotop" href="#top" style="text-decoration:none;">top</a>
<footer>

 &copy; <small>Ilazo pharmacy and cosmetics 2022</small>
</footer>
</div>
        </body>
      </html>