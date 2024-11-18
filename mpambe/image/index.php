<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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





/*modeling---------------------------------------------------------------------*/

.calculator {
  padding: 20px;
  -webkit-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
  box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
  border-radius: 1px;
}

.input {
  border: 1px solid #ddd;
  border-radius: 1px;
  height: 60px;
  padding-right: 15px;
  padding-top: 10px;
  text-align: right;
  margin-right: 6px;
  font-size: 2.5rem;
  overflow-x: auto;
  transition: all .2s ease-in-out;
}

.input:hover {
  border: 1px solid #bbb;
  -webkit-box-shadow: inset 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
}

.buttons {}

.operators {}

.operators div {
  display: inline-block;
  border: 1px solid #bbb;
  border-radius: 1px;
  width: 80px;
  text-align: center;
  padding: 10px;
  margin: 20px 4px 10px 0;
  cursor: pointer;
  background-color: #ddd;
  transition: border-color .2s ease-in-out, background-color .2s, box-shadow .2s;
}

.operators div:hover {
  background-color: #ddd;
  -webkit-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
  box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
  border-color: #aaa;
}

.operators div:active {
  font-weight: bold;
}

.leftPanel {
  display: inline-block;
}

.numbers div {
  display: inline-block;
  border: 1px solid #ddd;
  border-radius: 1px;
  width: 90px;
  text-align: center;
  padding: 10px;
  margin: 10px 4px 10px 0;
  font-weight:bold;
  font-size:27px;
  cursor: pointer;
  background-color: #f9f9f9;
  transition: border-color .2s ease-in-out, background-color .2s, box-shadow .2s;
}

.numbers div:hover {
  background-color: #f1f1f1;
  -webkit-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
  box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
  border-color: #bbb;
}

.numbers div:active {
  font-weight: bold;
}

div.equal {
  display: inline-block;
  border: 1px solid #343a40;
  border-radius: 1px;
  width: 17%;
  text-align: center;
  padding: 127px 10px;
  margin: 10px 6px 10px 0;
  vertical-align: top;
  cursor: pointer;
  color: #FFF;
  background-color:#343a40;
  transition: all .2s ease-in-out;
}

div.equal:hover {
  background-color: #0e1317;
  -webkit-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
  box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
  border-color: #343a40;
}

div.equal:active {
  font-weight: bold;
}










body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 50px; /* Location of the box */
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
  width: 45%;
  
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-100px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: white;
  color: black;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;

  color: black;
}

/*cancel and pint button  */
.button1 {
  border: none;
  color: white;

  text-align: center;
  font-size:34px;
  text-decoration: none;
  display: inline-block;

  
 
}

.button1 {
  box-shadow: 3px 4px 0px 0px #f00a1d;

 
border-radius: 25px;
border-style: solid;
  border-width: thin;

  border-color: red;
margin-left:45%;
cursor: pointer;color:#ffffff;
	font-family:Arial;
	font-size: medium;
 height:26px;

	text-decoration:none;
	text-shadow:0px 1px 0px #f00a1d;
  color:black;
  width:65px;

} 
.button2 {
  border: none;
  color: white;

  text-align: center;
  font-size:34px;
  text-decoration: none;
  display: inline-block;

  
 
}
.button2{
  box-shadow: 3px 4px 0px 0px #076942;

  
border-radius: 25px;
border-style: solid;
  border-width: thin;

  border-color: green;
margin-left:5%;
cursor: pointer;color:#ffffff;
	font-family:Arial;
	font-size: medium;
 height:26px;

	text-decoration:none;
	text-shadow:0px 1px 0px #004d2e;
  color:black;
  width:65px;

} 

#message{
    margin-left:28%;
    margin-top: -42px;
}


/* Green */







/*bird ----------------------------------------------- */
</style>
</head>
<body onload="checkvote1();refresh();"  >
<div class="wrapper">
<a name="top"></a>
<header>

<p><b>purchase</b></p>

</header>
<br/>
<nav>
<a href="../index2.php">Home</a> 

<a href="../authentication.php" >Sign Out</a> 

<a href="#icomn">Contact me</a>



</nav>
<div id="message">

<?php include("rowlessStuff.php"); ?>
</div><br>
<br/>
 
<?php  
include('connectandcreate.php');


$sql = "SELECT * FROM `ordertracker` ORDER BY OrderID DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "<br>  ". $row["id"]. "<br>";
            $oldget="". $row["OrderID"]. "";

    }
} else {
    
}



?>
<form action="neworder.php" method="POST">
  <button id="like1" name="neworder" onclick="myFunction2();"  style="background-color:#343a40;color:white;cursor:pointer">New Order</button>

  <input type="hidden" name="newordetext" value="<?php
  
  if(isset($oldget) )
  {
    echo $oldget+1; 
  } 
    else {
  echo 1;

    }

 
  ?>"
  
  >


  
</form>
<script>
function myFunction2(){

 document.getElementById('like1').style.visibility = 'hidden';
 document.getElementById('like2').style.visibility = 'show';
localStorage.setItem("lionelol", "lionelol");

}; 




function checkvote1(){

 
const name = localStorage.getItem('lionelol');

if(name){

  
  document.getElementById('like1').style.visibility = 'hidden';
  document.getElementById('like2').style.visibility = 'show';


}else{
document.getElementById('like1').style.visibility = 'show';
document.getElementById('like2').style.visibility = 'hidden';
}



}

</script>







<script type="text/javascript">
function clickd(){
    setTimeout(function(){
        document.getElementById("myBtn").click();
       
        
    }, 100);
  
}
</script>
<div id="like2">
<button style="display:none;" id="myBtn"></button>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
  
      <span class="close">&times;</span>

    </div>
    <div class="modal-body">
      <div class="calculator">
  <div class="input" id="input"></div>
  <div class="buttons">
    <div class="operators">
      <div>+</div>
      <div>-</div>
      <div>&times;</div>
      <div>&divide;</div>
    </div>
    <div class="leftPanel">
      <div class="numbers">
        <div>7</div>
        <div>8</div>
        <div>9</div>
      </div>
      <div class="numbers">
        <div>4</div>
        <div>5</div>
        <div>6</div>
      </div>
      <div class="numbers">
        <div>1</div>
        <div>2</div>
        <div>3</div>
      </div>
      <div class="numbers">
        <div>0</div>
        <div>.</div>
        <div id="clear">C</div>
      </div>
    </div>
    <div class="equal" id="result">=</div>
  </div>
</div>
      <p></p>
    </div>
    <div class="modal-footer">
    <small><p style="font-size:10px; text-align:center;">ilazo pharmacy and cosmetics</p></small>
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
<script>

"use strict";

var input = document.getElementById('input'), // input/output button
  number = document.querySelectorAll('.numbers div'), // number buttons
  operator = document.querySelectorAll('.operators div'), // operator buttons
  result = document.getElementById('result'), // equal button
  clear = document.getElementById('clear'), // clear button
  resultDisplayed = false; // flag to keep an eye on what output is displayed

// adding click handlers to number buttons
for (var i = 0; i < number.length; i++) {
  number[i].addEventListener("click", function(e) {

    // storing current input string and its last character in variables - used later
    var currentString = input.innerHTML;
    var lastChar = currentString[currentString.length - 1];

    // if result is not diplayed, just keep adding
    if (resultDisplayed === false) {
      input.innerHTML += e.target.innerHTML;
    } else if (resultDisplayed === true && lastChar === "+" || lastChar === "-" || lastChar === "×" || lastChar === "÷") {
      // if result is currently displayed and user pressed an operator
      // we need to keep on adding to the string for next operation
      resultDisplayed = false;
      input.innerHTML += e.target.innerHTML;
    } else {
      // if result is currently displayed and user pressed a number
      // we need clear the input string and add the new input to start the new opration
      resultDisplayed = false;
      input.innerHTML = "";
      input.innerHTML += e.target.innerHTML;
    }

  });
}

// adding click handlers to number buttons
for (var i = 0; i < operator.length; i++) {
  operator[i].addEventListener("click", function(e) {

    // storing current input string and its last character in variables - used later
    var currentString = input.innerHTML;
    var lastChar = currentString[currentString.length - 1];

    // if last character entered is an operator, replace it with the currently pressed one
    if (lastChar === "+" || lastChar === "-" || lastChar === "×" || lastChar === "÷") {
      var newString = currentString.substring(0, currentString.length - 1) + e.target.innerHTML;
      input.innerHTML = newString;
    } else if (currentString.length == 0) {
      // if first key pressed is an opearator, don't do anything
      console.log("enter a number first");
    } else {
      // else just add the operator pressed to the input
      input.innerHTML += e.target.innerHTML;
    }

  });
}

// on click of 'equal' button
result.addEventListener("click", function() {

  // this is the string that we will be processing eg. -10+26+33-56*34/23
  var inputString = input.innerHTML;

  // forming an array of numbers. eg for above string it will be: numbers = ["10", "26", "33", "56", "34", "23"]
  var numbers = inputString.split(/\+|\-|\×|\÷/g);

  // forming an array of operators. for above string it will be: operators = ["+", "+", "-", "*", "/"]
  // first we replace all the numbers and dot with empty string and then split
  var operators = inputString.replace(/[0-9]|\./g, "").split("");

  console.log(inputString);
  console.log(operators);
  console.log(numbers);
  console.log("----------------------------");

  // now we are looping through the array and doing one operation at a time.
  // first divide, then multiply, then subtraction and then addition
  // as we move we are alterning the original numbers and operators array
  // the final element remaining in the array will be the output

  var divide = operators.indexOf("÷");
  while (divide != -1) {
    numbers.splice(divide, 2, numbers[divide] / numbers[divide + 1]);
    operators.splice(divide, 1);
    divide = operators.indexOf("÷");
  }

  var multiply = operators.indexOf("×");
  while (multiply != -1) {
    numbers.splice(multiply, 2, numbers[multiply] * numbers[multiply + 1]);
    operators.splice(multiply, 1);
    multiply = operators.indexOf("×");
  }

  var subtract = operators.indexOf("-");
  while (subtract != -1) {
    numbers.splice(subtract, 2, numbers[subtract] - numbers[subtract + 1]);
    operators.splice(subtract, 1);
    subtract = operators.indexOf("-");
  }

  var add = operators.indexOf("+");
  while (add != -1) {
    // using parseFloat is necessary, otherwise it will result in string concatenation :)
    numbers.splice(add, 2, parseFloat(numbers[add]) + parseFloat(numbers[add + 1]));
    operators.splice(add, 1);
    add = operators.indexOf("+");
  }

  input.innerHTML = numbers[0]; // displaying the output

  resultDisplayed = true; // turning flag if result is displayed
});

// clearing the input on press of clear
clear.addEventListener("click", function() {
  input.innerHTML = "";
})



</script>

      
  <table style="width:100%;" >
    <tr>
      <td id="header" style="border:0px;">
   
  
      </td>
    </tr>
    <tr>
      <td id="table-form" style="border:0px;">
        <form >
         <select  id="city-box" style="margin-left: 35%; ">
                          <option  value="">Select Product</option>
                          <input type="submit" name="submit">
                        </select>

</br><br/>
        </form>
      </td>
    </tr>
    <tr>
      <td id="table-data" style="border:0px;"></td>
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


  if(!empty($oldget)) {

 $query = "SELECT * FROM `ordertracker` Where OrderID='$oldget' ORDER BY '$oldget'";
$result = mysqli_query($conn, $query);
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
   <td><?php echo $data['PurchasingQty']; ?> </td>
   <td><?php echo $data['Amount']; ?> </td>
   
   <td>
  <form action="refresher.php" method="POST">

   <input type="hidden" name="PurchasedQuantity" value="<?php echo $data['PurchasingQty']; ?>">



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
FROM ordertracker') as $row) {
 

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

<img src="image/calculator.png" style="width:1.5%;margin-left:50%;cursor:pointer;" alt="calculator" onclick="clickd();">

</td>

</tr>
<tr>
<td>
<form action="CancelOrder.php" method="POST">
<button class="button1 button1" onclick="myFunction1();" name="cancelorder" value="<?php echo $oldget; ?>" >Cancel</button>

<button class="button2 button2" name="print" value="<?php echo $oldget; ?>" onclick="myFunction1();">Print</button>
</form>
</td>

</tr>




<!--<button  name="neworder" onclick="myFunction1();"  style="background-color:#343a40;color:white;cursor:pointer">remove</button>-->

<script>
  function myFunction1(){


    localStorage.removeItem("lionelol");
  }

  </script>





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
  </div>

<?php

include('bird.php');

?>

  </footer>

</body>
</html>
