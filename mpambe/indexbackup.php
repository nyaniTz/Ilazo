<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 60px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}


.close:hover,
.close:focus {
  color: white;
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #212529;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #212529;
  color: white;
}

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
.table{

width:819px;

}


body {
  font-family: 'lato', sans-serif;
}
.container {
  max-width: 100%;
  margin-left: auto;
  margin-right: auto;
  padding-left: 1px;
  padding-right: 10px;
}
h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
}
h2 small {
  font-size: 0.5em;
}
.responsive-table li {
  border-radius: 3px;
  padding: 15px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 25px;
}
.responsive-table .table-header {
  background-color: #95A5A6;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}
.responsive-table .table-row {
  background-color: #ffffff;
  box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
}
.responsive-table .col-1 {
  flex-basis: 10%;
}
.responsive-table .col-2 {
  flex-basis: 40%;
}
.responsive-table .col-3 {
  flex-basis: 25%;
}
.responsive-table .col-4 {
  flex-basis: 25%;
}
@media (max-width: 767px) {
  .responsive-table .table-header {
    display: none;
  }
  .responsive-table li {
    display: block;
  }
  .responsive-table .col {
    flex-basis: 100%;
  }
  .responsive-table .col {
    display: flex;
    padding: 10px 0;
  }
  .responsive-table .col:before {
    color: #6C7A89;
    padding-right: 10px;
    content: attr(data-label);
    flex-basis: 50%;
    text-align: right;
  }
}
/*ADDING TABLE */
table {border-collapse: collapse;}
th, td {border: 1px solid #ddd; padding: 5px 10px;}

#table1 button::after {content: "Add"}
#table2 button::after {content: "\2715"}



.item:hover {
  width:24px;

  
}









/*bird ----------------------------------------------- */
</style>
</head>
<body onload="refresh()" >
<div class="wrapper">
<a name="top"></a>
<header>

<p><b>purchase</b></p>

</header>
<br/>
<nav>
<a href="../index.html">Home</a> 

<a href="../display.php" >Receved Items</a> 



</nav>
<br/>
<br/>
<h2></h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn" style="background-color:#343a40;color:white">Select Product</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2></h2>
    </div>
    <div class="modal-body">
      
  <table style="width:100%;" >
    <tr>
      <td id="header">
   
  
      </td>
    </tr>
    <tr>
      <td id="table-form" >
        <form >
         <select  id="city-box" style="margin-left: 35%; ">
                          <option  value="">Select Product</option>
                        </select>

</br><br/>
        </form>
      </td>
    </tr>
    <tr>
      <td id="table-data"></td>
    </tr>
  </table>
    
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      url : "load-city.php",
      type : "POST",
      dataType : "JSON",
      success : function(data){
        $.each(data, function(key, value){
          $("#city-box").append("<option >" + value.Description +  "</option>");
        });
      }
    });

    // Load Table Data
    $("#city-box").change(function(){
      var city = $(this).val();

      if(city == ""){
        $("#table-data").html("");
      }else{
        $.ajax({
          url : "load-table.php",
          type : "POST",
          data : { city : city },
          success : function(data){
            $("#table-data").html(data);
          }
        });
      }
    })
  });
</script>




<form method="post">

<?php
 

  // Create connection


  // Check connection

 


if(isset($_POST["Submit1"]))
{


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



$name=$_POST['named'];
$id=$_POST['takeid'];

$sql = "UPDATE `receved items` SET `Quantity`='$name' WHERE `id`='$id'";


if (mysqli_query($conn, $sql)) {

} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);



}






?>





</form>
      
      
      
      
   
      
      
      
      
      
      
      
      
      
      
      
      
    </div>
    <div class="modal-footer">
      <h3></h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</div>
</div>

<br/><br/>
<?php
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


 $query = "SELECT `id`,  `OrderID`, `Description`, `Unit`, `Quantity`, `Cost`, `Purchasing Qty`, `Amount` FROM `orders`";
$result = mysqli_query($conn, $query);

if(empty($result)) {
  $query = "CREATE TABLE orders (
            id int(255) AUTO_INCREMENT,
            Description varchar(255) NOT NULL,
            Unit varchar(255) NOT NULL,
            Quantity int (255) NOT NULL,
            Cost int (255) NOT NULL,
            Purchasing Qty int (255),
            Amount int (255),
          
            )";
  $result = mysqli_query($con, $query);
}




?>
<div id='mytable'>
<table  style=" border: 1px; width:100%;" cellspacing="0" cellpadding="10">
  

   

<tr>


<th style="background-color: #343a40;color:white;"> NO</th>

  <th style="background-color: #343a40;color:white;"> OrderID</th>
    <th style="background-color: #343a40;color:white;">Description</th>
    <th style="background-color: #343a40;color:white;">Purchasing Qty</th>
    <th style="background-color: #343a40;color:white;">Amount</th>
    <th style="background-color: #343a40;color:white;">Action</th>
    
    
  </tr>
    </div>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
   
 <td ><?php echo $sn; ?> </td>

   <td ><?php echo $data['OrderID']; ?> </td>
   <td><?php echo $data['Description']; ?> </td>
   <td><?php echo $data['Purchasing Qty']; ?> </td>
   <td><?php echo $data['Amount']; ?> </td>
   
   <td>
  <form action="refresher.php" method="POST">


  <button type="submit" src="delete.png" value="<?php   echo $data['id'];  ?>"  name="delete" id="delete1" style="color:white;border-style:none;background-color:white; cursor:pointer;" >
  <div class="item">
   <img   src="delete.png" style=" width:18px;" id="delete2">
  </div>
  </button>


 

  
  </input>

  </form>
  </td>

 


 





 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>
  




 
<?php

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
foreach($conn->query('SELECT SUM(Amount) 
FROM orders') as $row) {
 

}
?>




<table  style=" border: 1px; width:104%;" >
  

   

<tr>


<th style="background-color: #343a40;color:white; width: 100%;"> Total</th>

  </tr>
    

 <tr >
   


 
   <td style="text-align:center;font-size: 18px;"><?php echo  $row['SUM(Amount)'] ; ?> </td>

  

   
 </tr>
 <!--
 <tr> <td ><input type='number'  id='Text2' name='TextBox2' style='width:100px;margin-left:47%;' oninput='' onchange='' placeholder="Pay Amount"  min='1' required> </td></tr>
-->

<tr >
<td style="border:0px;">
<a href="calculator.php">
<img src="image/calculator.png" style="width:1.5%;margin-left:50%;" alt="calculator">
</a>
</td>

</tr>
  </div>

<script>



function refresh(){
    setTimeout(function(){
   $( "#mytable" ).load( "index.php #mytable" );
}, 1000);
    }
    



</script>

<?php

exit
?>

















<br/><br/>


  
  
  </div>


  <footer>


<?php

include('bird.php');

?>

  </footer>

</body>
</html>
