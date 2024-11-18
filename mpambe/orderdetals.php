<?php include('connectandcreate.php');
ob_start();
if(isset($_POST['neworder'])){
    mysqli_query($conn, " TRUNCATE TABLE `ordertracker`  ");

}
?>


<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['email'])){



?>
<!DOCTYPE html>
<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
        <!--START Bootstrap CSS ADDED BY MERCEL-->
        <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
        <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
        <script src="library/dselect.js"></script>
        <!--END Bootstrap CSS ADDED BY MERCEL-->
<meta content="initial-scale=1,
		maximum-scale=1, user-scalable=0" name="viewport" />
<meta name="viewport" content="width=device-width" />

<!--Datatable plugin CSS file -->
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





</style>
</head>

<body>

<a name="top"></a>


<div class="ray">



<header>

<p><b>Sales</b></p>

</header>


<nav>
<a href="../index2.php">Home</a> 

<a href="../authentication.php" >Sign Out</a> 

<a href="#icomn">Contact me</a>



</nav>
<br/>






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








<!-- START MERCEL'S TRIAL SCRIPT -->
<?php 
//orderdetals.php
include('connectandcreate.php');
// If database is not exist create one
$query = "SELECT `Description` FROM `receveditems` ORDER BY `Description` ASC";
$result = mysqli_query($conn, $query);
//
?>


  <!-- <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="align-items:center; justify-content:cener">
                  <form>
                    <select name="mercel_box" style="margin-left: 35%; width:150px " id="mercel_box">
                        <option value="">Select Product</option>
                        <?php 
                        foreach($result as $row)
                        {
                            echo '<option value="'.$row["Description"].'">'.$row["Description"].'</option>';
                        }
                        ?>  
                        
                    </select>
                    <input type="submit" name="submit">
                  </form>
                </div>
            </div> -->
<!-- END MERCELS SCRIPT -->



<table style="width:100%;" >
    <tr>
      <td id="header" style="border:0px;">
   
  
      </td>
    </tr>
    <tr>
      <td id="table-form" style="border:0px;">
        <!-- <form >
         <select name="city-box" id="city-box" style="margin-left: 35%;  ">
                          <option  value="">Select Product</option>
                          <input type="submit" name="submit">
                        </select>

</br><br/>
        </form> -->
        <div class="row">
          <div class="col-md-4"></div>
        <div class="col-md-4">
        <form >
        <select name="city-box" style="margin-left: 35%;" id="city-box">
                        <option value="">Select Product</option>
                        <?php 
                        foreach($result as $row)
                        {
                            echo '<option value="'.$row["Description"].'">'.$row["Description"].'</option>';
                        }
                        ?>                         
        </select>
                   
            </form>        
        </div>
      <div class="col-md-4"></div>
      </td>
    </tr>
    <tr>
      <td id="table-data" style="border:0px;"></td>
    </tr>
  </table>


  <script>
    var select_box_element = document.querySelector('#city-box');
    dselect(select_box_element, {
        search: true
    });
</script>






<!--
<script type="text/javascript" src="js/jquery.js"></script>
  -->

<script type="text/javascript">
  $(document).ready(function(){
    // $.ajax({
    //   url : "load-city.php",
    //   type : "POST",
    //   dataType : "JSON",
    //   success : function(data){
    //     $.each(data, function(key, value){
    //       $("#city-box").append("<option >" + value.Description +  "</option>");
    //     });

    //     var sel_box_element = document.querySelector('#city-box');
    //     dselect(sel_box_element, {
    //         search: true
    //     });

    //   }
    // });

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








<br>
<div class="example"></div>
<!--HTML tables with student data-->
<div class="row">
				<div class="col-md-12">
					<div class="tile">
                        
						<div class="tile-body">
							<div class="table-responsive">
								<table class="display table-striped table-bordered table-sm" id="tableID">
                                
                                <thead>
										<tr align="center">
										<th style="background-color: #343a40;color:white;"> NO</th>
                
    <th style="background-color: #343a40;color:white;">Description</th>
    <th style="background-color: #343a40;color:white;">Purchasing Qty</th>
    <th style="background-color: #343a40;color:white;">Amount</th>
    <th style="background-color: #343a40;color:white;">Action</th>
   
							
										</tr>
									</thead>
									<tbody>
										<?php

                        
 

                          
										    $getOfferType = mysqli_query($conn, "SELECT * FROM `ordertracker`") or die(mysqli_error($conn));
										    if (mysqli_num_rows($getOfferType) >= 1) {
                          $sn=1;
										        while ($rs = mysqli_fetch_array($getOfferType)) {
										            
			
            											?>
            												<tr>
                                    <td ><?php echo $sn; ?> </td>
            												
            													
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"  align="center"><?php echo  $rs[3]; ?></td>
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" align="center"><?php echo $rs[4]; ?></td>
            													<td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;" align="center"><?php echo $rs[5]; ?></td>
                                      <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"  align="center">
  <form action="refresher.php" method="POST">

   <input type="hidden" name="ProductId" value="<?php echo $rs[1]; ?>">

   <input type="hidden" name="OrderID" value="<?php echo $rs[2]; ?>">

  <button type="submit" src="delete.png" value="<?php   echo $rs[0];  ?>"  name="delete" id="delete1" style="color:white;border-style:none;background-color:white; cursor:pointer;" >
  <div class="item">
  
   <img   src="delete.png" style=" width:18px;" id="delete2">
  </div>
  </button>


 

  
  </input>





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
						</div>
					</div>
				</div>
			</div>
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
		var myTable = $("#tableID").DataTable({
		paging: true,
		searching: true,
		info: false,


   
        "lengthMenu": [20, 40, 60, 80, 100],
        "pageLength": 5,




        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf'
        ]
  






		});

    


      



		// 2d array is converted to 1D array
		// structure the actions are
		// implemented on EACH column
		// myTable
		// .columns()
		// .flatten()
		// .each(function (colID) {

		// 	// Create the select list in the
		// 	// header column header
		// 	// On change of the list values,
		// 	// perform search operation
		// 	var mySelectList = $("<select />")
		// 	.appendTo(myTable.column(colID).header())
		// 	.on("change", function () {
		// 		myTable.column(colID).search($(this).val());

		// 		// update the changes using draw() method
		// 		myTable.column(colID).draw();
		// 	});

		// 	// Get the search cached data for the
		// 	// first column add to the select list
		// 	// using append() method
		// 	// sort the data to display to user
		// 	// all steps are done for EACH column
		// 	myTable
		// 	.column(colID)
		// 	.cache("search")
		// 	.sort()
		// 	.each(function (param) {
		// 		mySelectList.append(
		// 		$('<option value="' + param + '">'
		// 			+ param + "</option>")
		// 		);
		// 	});
		// });
	});




</script>


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


<th style="background-color: #343a40;color:white; width: 100%;" colspan="4"><b style="text-align:centre;margin-left: 47%;"> Total</b></th>

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


<!--
<button class="button1 button1" onclick="myFunction1();" name="cancelorder" value="<?php echo $oldget; ?>" >Cancel</button>
-->
<a href="Printnow.php">
<button class="button2 button2" style="margin-left:48%;" name="print" id="print-all">Print</button>
</a>
</td>

</tr>




<!--<button  name="neworder" onclick="myFunction1();"  style="background-color:#343a40;color:white;cursor:pointer">remove</button>-->






  </div>

<script>



function refresh(){
    setTimeout(function(){
   $( "#mytable" ).load( "orderdetals.php #mytable" );
}, 1000);
    }
    



</script>

<?php

exit
?>
</body>

</html>

<?php

}

else{


  header("Location:../authentication.php");

  exit();

}




?>
