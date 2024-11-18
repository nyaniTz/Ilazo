<?php include('mpambe/connectandcreate.php');?>
<!DOCTYPE html>
<html>
<head>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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




/* Table search*/


#myInput {
  background-image: url('image/search.png');
  background-size:18px;
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 98%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}



/*bird ----------------------------------------------- */
</style>
<title>ilazo report</title>

</head>
        <body>
        <div class="wrapper">
<?php //include('rowless.php');?>
<a name="top"></a>
<header>
<p><b>Report</b></p>
</header>

<nav>
<a href="AdminPanel.php">Home</a> 

<a href="display.php" >Receved Items</a> 

<a href="adminAction.php" >Action</a> 

<a href="authentication.php" >Sign Out</a> 


</nav>
<br><br>















<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Description.." title="Type in a name">

<?php
$query = "SELECT * FROM `orders`";
$result = mysqli_query($conn, $query);
?>



<div id='mytable'>

<table id="mytable" style=" border: 1px; width:100%;" cellspacing="0" cellpadding="10">
  

<thead style="text-align:left;">



<tr  >
	



  <th style="background-color: #343a40;color:white;">Description</th>
  <th style="background-color: #343a40;color:white;">Purchasing Qty</th>
  <th style="background-color: #343a40;color:white;">Amount</th>

  
  
</tr>
</thead> 


 




</div>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr >
   

 
   <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Description']; ?> </td>
   <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['PurchasingQty']; ?> </td>
   <td style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><?php echo $data['Amount']; ?> </td>
   

  </tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
 <?php } ?>




<br/><br/>


  
  
  </div>

</table>


  <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("mytable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function now(){
  $(document).ready(function () {
        $('#mytable').DataTable({
           aaSorting: [[0, "asc"]]
        });
    });

}
    
</script>



</body>
</html>
