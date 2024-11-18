<!DOCTYPE html>
<html>
<head>



<script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
  <style>



  </style>
  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
        <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
        <script src="library/dselect.js"></script>
<title></title>


<script type="text/javascript" 
        src="test.js">
    </script>





</head>
<body >



<?php
include('connectandcreate.php');
$conn = mysqli_connect("localhost","root","","ilazo pharmacy and cosmetics") or die("Connection Failed");

$sql = "SELECT * FROM `receveditems` WHERE `Description` = '{$_POST['city']}'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

$output = "";

if(mysqli_num_rows($result) > 0 ){
  $output .= '<table class="table" id="table1" >
  <thead class="thead-dark">
              <tr>
               
                <th>Description</th>
                <th >Unit</th>
                <th >quantity</th>
                <th >Cost</th>
                <th >purchasing Qty</th>
                <th >Amount</th>
                <th >Action</th >
               
              </tr>
              
              </thead>'
              ;



       







             
  while($row = mysqli_fetch_assoc($result)){

    $quarity=$row['Quantity'];
    $Discription=$row["Description"];
    $Unity=$row["Unit"];
    $Quantity=$row["Quantity"];
    $ids=$row["id"];
   $ProductId=$row['ProductId'];
    $output .= "
    <tbody>
    <tr>
               
                
                  


                        <td   >
                                      
                        <input type='text' ID='Description1' name='Description' style='width:87px;  background-color:ffffff;border:0;cursor: no-drop;' value='$Discription'  readonly >
                        </td> 
                  

                  
                 <!-- <td   >{$Discription}</td> -->

                <td  style='display:none' >{$ProductId}</td>
                 


                  <td   >
                  
                  <input type='text' id='Unity' name='' style='width:87px; font-size:18px; background-color:#dbd9d3;border:0;cursor: no-drop;' value='$Unity'  readonly >
                  </td>

                  <td   >
                  
                  <input type='text' id='quantity' name='' style='width:87px; font-size:18px; background-color:#dbd9d3;border:0;cursor: no-drop;' value='$Quantity'  readonly >
                  </td>
               
                  
                  <td ><input type='readonly' id='Text1' name='TextBox1' style='width:87px; background-color:#dbd9d3;border:0;cursor: no-drop;' oninput='add_number()'  value='{$row["Cost"]}' readonly  >  </td>
              

                 
                  <td ><input type='number'  id='Text2' name='TextBox2' style='width:90px;' oninput='myFunctions();add_number();myFunction();add_number3();add_number4();makesure();' onchange='myFunctions();myFunction();add_number3();add_number4();makesure();'   min='1' required></td>
                 
               
                 
            

                  <td><input type='text' id='txtresult' name='TextBox3' style='width:87px; background-color:#dbd9d3;border:0;cursor: no-drop;' readonly ></td>
                  

                  
                  <td><input type='button' style='display:none;' id='btn_save' name='btn_save'  onclick='reflash();myFunctions();myFunction();clicknow();' value='Add'  class='btn btn-success'></td>


                 
                  
             
                


         
    


    <script type='text/javascript'>

    function calculate(){
      
      
      var text2answer = document.getElementById('Text2').value;
      var answer=$quarity-text2answer;
      
      
      alert( answer);


      
    }

    </script>


    
           
                </form>

                 



                </tr>
                




                </tbody>







                
                
                ";
  


               
                echo "

    
  

    <script type='text/javascript'>

    function calculate(){
      
      
      var text2answer = document.getElementById('Text2').value;
      var answer=$quarity-text2answer;
      
      
      alert( answer);




      
    }

    </script>"; 




    if(isset($_POST["btn_save"]))
    {
      include('connectandcreate.php');
    
      // Your code that you want to execute
    
      //<input type='submit' name='Submit1' id='myDIV' style='display:none;' onclick='calculate()'  id='btn_save' class='btn btn-success'  value='Save' /></button>


    //  $sql = "UPDATE `receved items` SET Quantity=1 where id=$ids";
    
  if (mysqli_query($conn, $sql)) {
  
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
    }
    
  










               
                echo "

                <script type='text/javascript'>

function myFunction(){
                document.getElementById('Text2')
  .addEventListener('change', (event) => {
      if (event.target.value > $quarity) {
           alert('The purchasing is Greater than stock');
           document.getElementById('Text2').value = '';
           document.getElementById('txtresult').value = '';
           document.getElementById('txtresult1').value = '';
           document.getElementById('TextcalculateHeps').value = '';

           
           

           var x = document.getElementById('btn_save');
           if (x.style.display === 'none') {
             x.style.display = 'none';
           } else {
             x.style.display = 'none';
           }


      }
  });
                }

                              



                </script>"; 



               
              }
                  
             
      

             
        
   $output .= "</table>";

   echo $output;
  
}else{
    echo "No Record Found.";
}




?>



<!--auto calculate <a href='purchasing.php?edit_id=$row[id]'> -->











<script type="text/javascript">
var text1 = document.getElementById("Text1");
var text2 = document.getElementById("Text2");




function add_number() {

 
   var first_number = parseFloat(text1.value);
   if (isNaN(first_number)) first_number = 0;
   var second_number = parseFloat(text2.value);
   if (isNaN(second_number)) second_number = 0;
   var result = first_number * second_number;
   $result=result;
   document.getElementById("txtresult").value = $result;
   document.getElementById("txtresult1").value = $result;
}
</script>


<script type="text/javascript">
 document.getElementById("quantity").value;
 document.getElementById("Text2").value;



function add_number3() {

   var first_number = parseFloat(quantity.value);
   if (isNaN(first_number)) first_number = 0;
   var second_number = parseFloat(Text2.value);
   if (isNaN(second_number)) second_number = 0;
   var result = first_number - second_number;

   $result=result;
   if($result>=0){
    document.getElementById("TextcalculateHeps").value = $result;

   }
   else {
    alert('The purchasing is Greater than stock');
    
    var x = document.getElementById('btn_save');
           if (x.style.display === 'none') {
             x.style.display = 'none';
           } else {
             x.style.display = 'none';
           }
    document.getElementById('Text2').value = '';
   }

   
}
</script>



<script type="text/javascript">
 document.getElementById("myid").value;
 document.getElementById("TextcalculateHeps2").value;



 function add_number4(){

  var first_number = parseFloat(myid.value);
   if (isNaN(first_number)) first_number = 0;
   var second_number = parseFloat(TextcalculateHeps2.value);
   if (isNaN(second_number)) second_number = 0;
   var result = first_number - 0 ;
   $result=result;
   document.getElementById("TextcalculateHeps2").value = $result;




 //document.getElementById("myid").value=document.getElementById("TextcalculateHeps2").value;

}
</script>








<br/><br/>

<!-- table added items


<div class="container">

  <ul class="responsive-table" id="table2">
    <li class="table-header">
      <div class="col col-1">Description</div>
      <div class="col col-2">purchasing Qty</div>
      <div class="col col-3">Amount</div>
      <div class="col col-4">Pay</div>
    </li>
    <li class="table-row">
   

      <input ID="second1" type="text" class="col col-1" id="second" data-label="Description" style='width:87px;  background-color:ffffff;border:0;cursor: no-drop;' />
     
      <input ID="quantity2" type="text" class="col col-2" id="second" data-label="purchasing Qty" style='width:87px;  background-color:ffffff;border:0;cursor: no-drop;' />

      
      <div class="col col-3" data-label="Amount">$350</div>
      <div class="col col-4" data-label="Pay">Pending</div>
    </li>
    <li class="table-row">
      <div class="col col-1" data-label="Description">42442</div>
      <div class="col col-2" data-label="purchasing Qty">Jennifer Smith</div>
      <div class="col col-3" data-label="Amount">$220</div>
      <div class="col col-4" data-label="Pay">Pending</div>
    </li>
    <li class="table-row">
      <div class="col col-1" data-label="Description">42257</div>
      <div class="col col-2" data-label="purchasing Qty">John Smith</div>
      <div class="col col-3" data-label="Amount">$341</div>
      <div class="col col-4" data-label="Pay">Pending</div>
    </li>
    <li class="table-row">
      <div class="col col-1" data-label="Description">42311</div>
      <div class="col col-2" data-label="purchasing Qty">John Carpenter</div>
      <div class="col col-3" data-label="Amount">$115</div>
      <div class="col col-4" data-label="Pay">Pending</div>
    </li>
  </ul>
</div>
-->
<form  method='Get' action="insert.php"  id='myform' >
<input type="hidden" name="Description" id="Description">
<input type="hidden" name="Unitys" id="Unitys">
<input type="hidden" name="quantitys" id="quantitys">
<input type="hidden" name="Text1s" id="Text1s">

<input type="hidden" name="PurchaseQty" id="PurchaseQty">
<input type="hidden" name="Amount1" id="Amount1">
<input type="hidden" name="Quantitycalc" id="TextcalculateHeps" min="1">
<input type="hidden" name="ProductId" value="<?php echo $ProductId; ?>">
<input type="hidden" name="idtaker" value="<?php echo $ids; ?>">


<input type="hidden" name="Date" value="<?php echo date("Y-m-d"); ?>">




<input type="submit" style="display:none;" class="button is-info is-large" id="btn_save2" name="btn_save2" ></button>

<p id='result'></p>           

</form>
<!--
<script>
$(document).click(function(){
$('#btn_save').click(function(){
	var data=$('#myform').serialize()+'&btn_save=btn_save';
	$.ajax({
		url:'insert.php',
		type:'Get',
		data:data,
		success:function(response){
		$('#result').text(response);
	$('#Description').text('');
	$('#Unitys').text('');
	$('#quantitys').text('');
	$('#Text1s').text('');
  $('#PurchaseQty').text('');
  $('#Amount1').text('');

  
		}
	});
});
});


</script>

-->
<script type="text/javascript">

function myFunctions() {

  document.getElementById("Description").value=document.getElementById("Description1").value;
  document.getElementById("quantitys").value=document.getElementById("quantity").value;
  document.getElementById("Text1s").value=document.getElementById("Text1").value;
  document.getElementById("PurchaseQty").value=document.getElementById("Text2").value;
  document.getElementById("Amount1").value=document.getElementById("txtresult").value;
  document.getElementById("Unitys").value=document.getElementById("Unity").value;
 

  
  
  var x = document.getElementById("btn_save");
  if (x.style.display === "none") {
    x.style.display = "block";
  } 

 
  
}

</script>

<script>

function clicknow(){

document.getElementById("btn_save2").click();

}
</script>



</script>

<script>



function reflash() {
  window.location.reload(1);

  var y = document.getElementById("btn_save");
  if (y.style.display === "block") {
    y.style.display = "none";
  
}

}
</script>




</body>

</html>



              
                 
  