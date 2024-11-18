





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
  padding-top: 100px; /* Location of the box */
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
  background-color:  #fefefe;
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
  background-color: ffffff;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: ffffff;
  color: white;
}
</style>
<title>ilazo pharmacy and cosmetics</title>
</head>
<body>



<!-- Trigger/Open The Modal -->
<button id="myBtn">Print</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
     
    </div>
    <div class="modal-body">
    
<?php

include('connectandcreate.php');
$query = "SELECT * FROM `ordertracker` ";
$result = mysqli_query($conn, $query);






?>
<div class="noPrint">
<div id='mytable'>
<table  style=" border: 1px; width:100%;" cellspacing="0" cellpadding="10">
  

   

<tr style="text-align:left;">


<th style="background-color: #343a40;color:white;"> NO</th>
    <th style="background-color: #343a40;color:white;">Description</th>
    <th style="background-color: #343a40;color:white;">Purchasing Qty</th>
    <th style="background-color: #343a40;color:white;">Amount</th>
   
    
    
  </tr>
    </div>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {



 ?>
 <tr>
   
 <td ><?php echo $sn; ?> </td>
  
   <td><?php echo $data['Description']; ?> </td>
   <td><?php echo $data['PurchasingQty']; ?> </td>
   <td><?php echo $data['Amount']; ?> </td>
  </div>

 

<tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>

  </div>

  
    </div>
    <div class="modal-footer">
    <button onclick="window.print();" class="noPrint">
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

</body>
</html>