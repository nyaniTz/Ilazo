<?php

ob_start();
include 'connect.php';
include('mpambe/connectandcreate.php');

?>

<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['email'])){



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="900;url=logout.php" />
    <title>Received Items</title>

    <link rel="icon" type="image/jpg" href="image/favicons.jpg">

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
  <a href="user.php"  style="">

  <div class="itemAdd">
  
  <img src="image/Add.png" width="28px" height="25px;"  id="add">
 </div>

</a>
    

    </button>

    <br> <br>


    <input type="text" id="myInput" onkeyup="myFunction(event)" placeholder="Search for Vender or Description.." title="Type in a name">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


    <select class="form-select"  name="newSkill" id="newSkill"  onchange="getValue(this)">

<option selected disabled>Filter</option>
<option value="1">Expire Date Hide or Show</option>    
<option value="1">Expire Date Show or Hide</option> 



</select>







               


</script>

    <div id='mytable'>

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
     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Quantity']; ?> </td>
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
let tbody = document.getElementById("table-body");

function myFunction(e) {
  
  const filterText = e.target.value.toUpperCase();
  Array.from(tbody.children).forEach((row) => {
    const name = row.children[2].textContent.toUpperCase();
  

    const country = row.children[1].textContent.toUpperCase();

    if (name.includes(filterText) || country.includes(filterText))  {
      row.style.display = "table-row";
    } else {
      row.style.display = "none";
     
    }
  })
}
</script>
</div>






    </div>



    







<br><br>

    

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
