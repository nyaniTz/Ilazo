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

@media print {

header, footer, aside, nav, form, iframe, .menu, .hero, .adslot {
  display: none !important;
}
@page {
  size:auto !important;
  
}
table{
width:80px !important;
height:70px !important;
 margin-left: auto; 
  margin-right: auto;

}
}



</style>
</head>

<body>

<a name="top"></a>


<div class="ray">



<header>

<p><b>Print</b></p>

</header>


<nav>
<a href="../index2.php">Home</a> 

<a href="../authentication.php" >Sign Out</a> 

<a href="#icomn">Contact me</a>



</nav>
<br/>



<div id="printableArea">

<div class="center" style=" text-align: center;">

<img src="image/Nembo2.JPG" height="126px" width="416px;" >


  <p><h4 >Ilazo pharmacy and cosmetics</h4></p>
  ilazo D-centre 46<br>
  Ipagala , Meriwa road<br>
  
  Register #56749<br>
  Cashie #0100 <?php echo date('d/m/Y H:i:s');  ?>
</div>



<br>




<!--HTML tables with student data-->
<div class="row">
				<div class="col-md-12">
					<div class="tile">
                        
						<div class="tile-body">
							<div class="table-responsive">
								<table width="100%" class="display table-striped table-bordered table-sm" id="tableID">
                                
                                <thead>
										<tr align="center">
										<th style="background-color: #343a40;color:white;"> NO</th>
                
    <th style="background-color: #343a40;color:white;">Description</th>
    <th style="background-color: #343a40;color:white;">Purchasing Qty</th>
    <th style="background-color: #343a40;color:white;">Amount</th>
 
   
							
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

  

   

<tr>


<th style="background-color: #343a40;color:white; width: 100%;" colspan="4"><b style="text-align:centre;margin-left: 47%;"> Total</b></th>

  </tr>
    

 <tr >
   


 <div id="total" style="margin-left:-50%">
 <td colspan="4" style="text-align:center;font-size: 18px;"><?php echo  $row['SUM(Amount)'] ; ?> </td>

 </div>


  


 </tr>

 <div class="center" style=" text-align: center;">
 <td colspan="4"  style=" border:none;text-align: center;"> Experience your wellness and beauty</td> 

 
 
 </div>
<tr>
<td colspan="4"  style=" border:none;text-align: center;"> <smail>Thanks you for shopping at Ilazo pharmacy </smail></td> 

</tr>
 


                            </table>


                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>




<tr >


<tr>
<td>



<a href="index.php">
<button class="button2 button2" style="margin-left:48%;" onclick="printDiv('printableArea')" name="print" id="print-all">Print</button>
</a>


</td>

</tr><br><br>
<td style="border:0px;">

<img src="image/calculator.png" style="width:1.5%;margin-left:50%;cursor:pointer;" alt="calculator" onclick="clickd();">

</td>
</body>
<br><br>
</html>

<?php

}

else{


  header("Location:../authentication.php");

  exit();

}




?>
