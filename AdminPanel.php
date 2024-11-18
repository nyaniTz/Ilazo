<?php
include 'session_timeout.php';

// Rest of your page code...
?>

<?php
ob_start();
include('mpambe/connectandcreate.php');

?>
<?php

if(isset($_SESSION['id']) && isset($_SESSION['email'])){



?>
<!doctype html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="image/jpg" href="image/favicons.jpg">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<title>Ilazo pharmacy and cosmetics</title>
<style>
    body{

       
        
    }
html {
  scroll-behavior: smooth;
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
width:100%;
height:30px;
text-align:center;

box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);
-webkit-box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);
-moz-box-shadow: 6px 6px 21px 1px rgba(0,0,0,0.35);

}
#profile1,#profile2,#profile3{
box-shadow: 5px 8px 22px -2px rgba(0,0,0,0.6);
-webkit-box-shadow: 5px 8px 22px -2px rgba(0,0,0,0.6);
-moz-box-shadow: 5px 8px 22px -2px rgba(0,0,0,0.6);
margin-left: 3.5em;
object-fit: cover;
border-radius:5px;
}
#profile1:hover{
 transform: scale(1.05);
overflow:hidden;

}

#profile2:hover{
 transform: scale(1.05);
overflow:hidden;

}
#profile3:hover{
 transform: scale(1.05);
overflow:hidden;

}


.allarticle{
border: 2px solid #e7e7e7;
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

.totalorders{
  box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
margin-left:50px;
    background-color:ffffff;
    background-repeat: no-repeat;
  background-size: 300px 100px;
     color:black;
     border-radius: 10px;
 

  padding: 10px; 
  text-align:center;
  font-size:17px;
  top:2px;
  width: 150px;
  height: 100px; 
}
#Totalstaff{
  box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
    margin-left:37%;
    margin-top:-9%;
    background-color:ffffff;
    background-repeat: no-repeat;
  background-size: 300px 100px;
     color:black;
     border-radius: 10px;
 

  padding: 10px; 
  text-align:center;
  font-size:17px;
  top:2px;
  width: 150px;
  height: 100px;

}
#Totalstock{
  box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
    margin-left:67%;
    margin-top:-9%;
    background-color:fffff;
    background-repeat: no-repeat;
  background-size: 300px 100px;
     color:black;
     border-radius: 10px;
  

  padding: 10px; 
  text-align:center;
  font-size:17px;
  top:2px;
  width: 150px;
  height: 100px;}


  #Totalstock:hover{
 transform: scale(1.05);
overflow:hidden;

}
#Totalstaff:hover{
    transform: scale(1.05);
overflow:hidden;

}
.totalorders:hover{
    transform: scale(1.05);
overflow:hidden;


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

 
</style>
</head>



<body >



<div class="wrapper">
<a name="top"></a>
<?php include('rowless.php');?><br/>

<header>

<p><b>Ilazo pharmacy and cosmetics</b></p>

</header>
<br/>
<nav>
<a href="AdminPanel.php">Home</a> 

<a onclick="openModal()">Received Items</a>

<a href="report.php" >Report</a> 


<a href="adminAction.php" >Action</a> 


<a href="logout.php" >Sign Out</a> 



</nav>
<br/>

<p style="font-size:15px;"><b>





</b> </p>
<div class="totalorders">
<p style="">
<i>TOTAL ORDERS</i>


<?php


$sql="SELECT * FROM `orders` where Date = CURDATE() ";
$res1 = mysqli_query($conn, $sql);
$res = mysqli_num_rows($res1);

echo "Today " . $res . "<br>";

?>

<?php
$NewDate=Date('y:m:d', strtotime('-7 days'));

$sql2="SELECT `Date` FROM `orders` where date(`Date`) > '$NewDate'  ";
$res12 = mysqli_query($conn, $sql2);


$res2 = mysqli_num_rows($res12);

echo "Week " . $res2 . "<br>";



?>


<?php
$NewDate=Date('y:m:d', strtotime('-30 days'));

$sql2="SELECT `Date` FROM `orders` where date(`Date`) > '$NewDate'  ";
$res12 = mysqli_query($conn, $sql2);


$res2 = mysqli_num_rows($res12);

echo "Month " . $res2 . "<br>";



?>





<!--while($row = $res12->fetch_assoc()) {
  //echo "<br>  ". $row["id"]. "<br>";
      $oldget="". $row["Date"]. "<br>";
      echo $oldget;

} -->



</div>

<div id="Totalstaff">
<br>
<i>TOTAL STAFF</i>
<br><br>
<?php

$sql="SELECT * FROM `userauthentication`";
$res1 = mysqli_query($conn, $sql);
$res = mysqli_num_rows($res1);
echo $res;

?>
</div>
<div id="Totalstock">
<br>
<i>TOTAL STOCK</i>
<br><br>
<?php

$sql="SELECT * FROM `receveditems`";
$res1 = mysqli_query($conn, $sql);
$res = mysqli_num_rows($res1);
echo $res;

?>

<br><br><br>

</div>







<!-- Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
    <input type="password" id="password" placeholder="Enter Password" value="" class="password" autofocus>
	<br><br>
<button class="button" onclick="checkPassword()">Submit</button>
    </div>
</div>

<script>
  function openModal() {
  // Display the modal
  document.getElementById("myModal").style.display = "block";
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








<br/>


 <img  id="profile1" src="image/ph1.jpg" width="320" height="270" alt="To provide the best and satisfying Costumer services for excellent Results.">


 <img  id="profile2" src="image/ph2.jpg" width="320" height="277" alt="To provide the best and satisfying Costumer services for excellent Results.">


 <img  id="profile3" src="image/ph3.jpg" width="320" height="270" alt="To provide the best and satisfying Costumer services for excellent Results.">


<br><br>








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


<?php

}

else{


  header("Location:authentication.php");

  exit();

}




?>
