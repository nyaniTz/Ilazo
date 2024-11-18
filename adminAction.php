
<?php
include 'session_timeout.php';

// Rest of your page code...
?>

<?php


include('mpambe/connectandcreate.php');
?>

<?php

if(isset($_SESSION['id']) && isset($_SESSION['email'])){



?>

<?php
if(isset($_POST['EdiBbtn'])){
  $id=$_POST['EdiBbtn'];


  $sql="SELECT * FROM `userauthentication` where id='$id'";

  $result=mysqli_query($conn,$sql);
  
  

  
  $Password=$_POST['Password'];
  $Email=$_POST['Email'];
 

  $sql="UPDATE `userauthentication` set id=null,Email='$Email',Password='$Password' where id=$id";

  
 $result=mysqli_query($conn,$sql);

 if($result){





 }
else{


  die(mysqli_error($conn));
}



}



?>









<?php
if(isset($_POST['EdiBbtn1'])){
  $id=$_POST['EdiBbtn1'];
  echo $id;
  $sql="SELECT * FROM `authentication` where id='$id'";

  $result=mysqli_query($conn,$sql);
  
  

  
  $Password1=$_POST['Password1'];
  $Email1=$_POST['Email1'];
 

  $sql="UPDATE `authentication` set id=null,Email='$Email1',Password='$Password1' where id=$id";

  
 $result=mysqli_query($conn,$sql);

 if($result){





 }
else{


  die(mysqli_error($conn));
}



}



?>








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




/* Green */


:root {
    --input-color: #003f5c;
  --input-border: #003f5c;
  --input-background: #fff;
  --input-placeholder: #003f5c;
  --input-border-focus: #275EFE;
  --group-color: var(--input-color);
  --group-border: var(--input-border);
  --group-background: #003f5c;
  --group-color-focus: #fff;
  --group-border-focus: var(--input-border-focus);
  --group-background-focus: #003f5c;
  --group-color:#fff;
}
.form-field {
  display: block;
  width: 100%;
  padding: 8px 16px;
  line-height: 25px;
  font-size: 14px;
  font-weight: 500;
  font-family: inherit;
  border-radius: 6px;
  -webkit-appearance: none;
  color: var(--input-color);
  border: 1px solid var(--input-border);
  background: var(--input-background);
  transition: border 0.3s ease;
}
.form-field::placeholder {
  color: var(--input-placeholder);
}
.form-field:focus {
  outline: none;
  border-color: var(--input-border-focus);
}
.form-group {
  position: relative;
  display: flex;
  width: 100%;
}
.form-group > span, .form-group .form-field {
  white-space: nowrap;
  display: block;
}
.form-group > span:not(:first-child):not(:last-child), .form-group .form-field:not(:first-child):not(:last-child) {
  border-radius: 0;
}
.form-group > span:first-child, .form-group .form-field:first-child {
  border-radius: 6px 0 0 6px;
}
.form-group > span:last-child, .form-group .form-field:last-child {
  border-radius: 0 6px 6px 0;
}
.form-group > span:not(:first-child), .form-group .form-field:not(:first-child) {
  margin-left: -1px;
}
.form-group .form-field {
  position: relative;
  z-index: 1;
  flex: 1 1 auto;
  width: 1%;
  margin-top: 0;
  margin-bottom: 0;
}
.form-group > span {

  text-align: center;

  padding: 3px 12px;
  font-size: 14px;
  line-height: 25px;
  color: var(--group-color);
  background: var(--group-background);
  border: 1px solid var(--group-border);
  transition:background 0.3s ease, border 0.3s ease, color 0.3s ease;
}
.form-group:focus-within > span {
  color: var(--group-color-focus);
  background: var(--group-background-focus);
  border-color: var(--group-border-focus);
}
html {
  box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
}
* {
  box-sizing: inherit;
}
*:before, *:after {
  box-sizing: inherit;
}

body .form-group {
  max-width: 360px;
}
body .form-group:not(:last-child) {
  margin-bottom: 32px;
}
.form-group{

}


.item:hover {
  width:33px;

  
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



/* Modal styles */
.modal {
            display: none; /* Hide the modal by default */
            position: fixed; /* Fixed position */
            z-index: 1; /* Ensure it appears on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scrolling if needed */
            background-color: rgba(0, 0, 0, 0.4); /* Black with opacity */
            
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* Center the modal on the screen */
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
        }
		.button {
    display: inline-block;
    text-align: center;
    vertical-align: middle;
    padding: 3px 11px;
    border: 1px solid #b0b0b0;
    border-radius: 19px;
    background: #ffffff;
    background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#b3b3b3));
    background: -moz-linear-gradient(top, #ffffff, #b3b3b3);
    background: linear-gradient(to bottom, #ffffff, #b3b3b3);
    -webkit-box-shadow: #ffffff 0px 0px 40px 0px;
    -moz-box-shadow: #ffffff 0px 0px 40px 0px;
    box-shadow: #ffffff 0px 0px 40px 0px;
    font: normal normal bold 15px times new roman;
    color: #332f33;
    text-decoration: none;
}
.button:hover,
.button:focus {
    border: 1px solid #cacaca;
    background: #ffffff;
    background: -webkit-gradient(linear, left top, left bottom, from(#ffffff), to(#d7d7d7));
    background: -moz-linear-gradient(top, #ffffff, #d7d7d7);
    background: linear-gradient(to bottom, #ffffff, #d7d7d7);
    color: #332f33;
    text-decoration: none;
}
.button:active {
    background: #b3b3b3;
    background: -webkit-gradient(linear, left top, left bottom, from(#b3b3b3), to(#b3b3b3));
    background: -moz-linear-gradient(top, #b3b3b3, #b3b3b3);
    background: linear-gradient(to bottom, #b3b3b3, #b3b3b3);
}

.password {
  -webkit-appearance: none;
  background-color: white;
  color: inherit;
  outline: none;
  resize: none;
  box-sizing: border-box;
  border-radius: 0.2em;
  border: 1px solid lightgray;
  box-shadow: none;
  font-family: inherit;
  font-size: inherit;
  font-weight: inherit;
  padding: 0.6em;
  margin-right: 0.6em;
  min-width: 15em;
}


/*bird ----------------------------------------------- */
</style>
<title>ilazo report</title>
</head>
<body >
<div class="wrapper">
<a name="top"></a>
<header>

<p><b>Action</b></p>

</header>
<br/>
<nav>
<a href="AdminPanel.php">Home</a> 

<a onclick="openModal()">Received Items</a>

<a href="report.php" >Report</a> 

<a href="authentication.php" >Sign Out</a> 

</nav>
</div></div>


<!-- Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content" style="">
      
		
	<input type="password" id="password" placeholder="Enter Password" value="" class="password" autofocus>
	<br><br>
<button class="button" onclick="checkPassword()">Submit</button>

    </div>
</div>



<br><br><br>

<div id='mytable'>

<table  style=" border: 1px;width:100%; " cellspacing="0" cellpadding="10">
  

<thead style="text-align:left;">



<tr  >

    <th  style="background-color: #343a40;color:white;">No</th>
    <th style="background-color: #343a40;color:white;">Email</th>
    <th style="background-color: #343a40;color:white;">Password</th>
    <th style="background-color: #343a40;color:white;">Action</th>

    </tr>
  </thead>


  
  <tbody>


<?php
$query = "SELECT * FROM `userauthentication` ";
$result = mysqli_query($conn, $query);



if($result){
  while($data=mysqli_fetch_assoc($result)){
  
    
    ?>
    
  
  <tr >

     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $sn; ?> </td>
    
       <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
       <form  method="POST">  
<div class="form-group">

    <input class="form-field" name="Email" id="textbox1" style="width:23px;height:32px;" type="email" placeholder="Staff Email" required>
    <span style="height:32px;">Email</span> 
</div>
      
      </td>



      <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
      
<div class="form-group">

    <input class="form-field"  id="textbox2" name="Password" style="width:23px;height:32px;" type="number" placeholder="Staff Password" required>
    <span style="height:32px;">Password</span> 
</div>
      
      </td>
      
     


  <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
  
  <button  name="EdiBbtn" value="<?php   echo $data['id'];  ?>" style="color:white;border-style:none;background-color:white; cursor:pointer;">
  <div class="item"> <img   src="image/editbtn.png" style=" width:20px;"   id="edit" ></div>
  </button>
  
  </form>
  <button  name="EdiBbtn" value="<?php   echo $data['id'];  ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color:white;border-style:none;background-color:white; cursor:pointer;">
  <div class="item"> <img   src="image/delete.png" style=" width:20px;"   id="edit" ></div>
  </button>
  </td>
  </tr> 
  
  
  <?php
    $sn++;}} else { ?>
      <tr>
       <td colspan="8">No data found</td>
      </tr>
   <?php } ?>












   <script>
  function openModal() {
  // Display the modal
  document.getElementById("myModal").style.display = "block";
  document.getElementById("textbox1").style.display = "none";
  document.getElementById("textbox2").style.display = "none";
  document.getElementById("textbox3").style.display = "none";
  document.getElementById("textbox4").style.display = "none";
  
}
function checkPassword() {
  var password = document.getElementById("password").value;

  // Send the password to the server for validation
  fetch("validate_password.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: "password=" + encodeURIComponent(password)
  })
    .then(response => response.text())
    .then(data => {
      console.log(data); // Output the response to the console for debugging
      try {
        var jsonData = JSON.parse(data);
        if (jsonData.valid) {
          // Password is correct, redirect to display.php
          window.location.href = "display.php";
        } else {
          // Password is incorrect
          alert("Incorrect password. Please try again.");
		  location.reload(); // Refresh the page
        }
      } catch (error) {
        console.error("Error:", error);
        // Handle the error appropriately
      }
    })
    .catch(error => {
      console.error("Error:", error);
      // Handle the error appropriately
    })
    .finally(() => {
      // Hide the modal
      document.getElementById("myModal").style.display = "none";
    });
}



</script>






<?php
$query = "SELECT * FROM `authentication` ";
$resultz = mysqli_query($conn, $query);



if($resultz){
  while($dataz=mysqli_fetch_assoc($resultz)){
  
    
    ?>
    
  
  <tr >

     <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $sn; ?> </td>
    
       <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
       <form  method="POST">  
<div class="form-group">

    <input class="form-field" id="textbox3" name="Email1" id="textbox" style="width:23px;height:32px;" type="email" placeholder="Admin Email" required>
    <span style="height:32px;">Email</span> 
</div>
      
      </td>



      <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
      
<div class="form-group">

    <input class="form-field" id="textbox4" name="Password1" id="textbox" style="width:23px;height:32px;" type="number" placeholder="Admin Password" required>
    <span style="height:32px;">Password</span> 
</div>
      
      </td>
      
     <!--<?php echo $dataz['Email']; ?> -->


  <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
  
  <button  name="EdiBbtn1" id="textbox" value="<?php   echo $dataz['id'];  ?>" style="color:white;border-style:none;background-color:white; cursor:pointer;">
  <div class="item"> <img   src="image/editbtn.png" style=" width:20px;"   id="edit" ></div>
  </button>
  
  </form>
  <button  id="textbox" name="EdiBbtn1" value="<?php   echo $dataz['id'];  ?>" onclick="return confirm('Are you sure you want to delete this item?');" style="color:white;border-style:none;background-color:white; cursor:pointer;">
  <div class="item"> <img   src="image/delete.png" style=" width:20px;"   id="edit" ></div>
  </button>
  </td>
  </tr> 
  
  
  <?php
    $sn++;}} else { ?>
      <tr>
       <td colspan="8">No data found</td>
      </tr>
   <?php } ?>










<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>




<?php
  $sn++;}} else { ?>
    <tr>
   
    </tr>
 <?php } ?>

</body>
</html>
<?php

}

else{


  header("Location:authentication.php");

  exit();

}




?>

<!--











-->