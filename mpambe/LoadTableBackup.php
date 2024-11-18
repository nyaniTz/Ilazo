<!DOCTYPE html>
<html>
<head>
  <style>
.table{

width:819px;

}
  </style>
  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title></title>


<script type="text/javascript" 
        src="test.js">
    </script>





</head>
<body >



<?php

$conn = mysqli_connect("localhost","root","","ilazo pharmacy and cosmetics") or die("Connection Failed");

$sql = "SELECT * FROM `receved items` WHERE `Description` = '{$_POST['city']}'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

$output = "";

if(mysqli_num_rows($result) > 0 ){
  $output .= '<table class="table" >
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
   
    $output .= "
    <tbody>
    <tr>
               
                
                  


                  <!--<td   >
                  
                  <input type='text' id='' name='' style='width:87px; font-size:18px; background-color:#dbd9d3;border:0;cursor: no-drop;' value='$Discription'  readonly >
                  </td> -->
                  
                  <td   >{$Discription}</td>





                  <td   >
                  
                  <input type='text' id='' name='' style='width:87px; font-size:18px; background-color:#dbd9d3;border:0;cursor: no-drop;' value='$Unity'  readonly >
                  </td>

                  <td   >
                  
                  <input type='text' id='quantity' name='' style='width:87px; font-size:18px; background-color:#dbd9d3;border:0;cursor: no-drop;' value='$Quantity'  readonly >
                  </td>
               
                  
                  <td ><input type='readonly' id='Text1' name='TextBox1' style='width:87px; background-color:#dbd9d3;border:0;cursor: no-drop;' oninput='add_number()'  value='{$row["Cost"]}' readonly  >  </td>
              

                 
                  <td ><input type='number'  id='Text2' name='TextBox2' style='width:80px;' oninput='add_number();myFunction();add_number3();add_number4();' onchange='myFunction();add_number3();add_number4();'  min='1' required></td>
                 
               
                 
            

                  <td><input type='text' id='txtresult' name='TextBox3' style='width:87px; background-color:#dbd9d3;border:0;cursor: no-drop;' readonly ></td>
                  

                  <td><input type='submit' value='Add' name='' class='btn btn-success' value='Add' onclick=''></td>
                
                  <form action='' method='post'>
             
                


         
    


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
    $quarity;
    
  

    <script type='text/javascript'>

    function calculate(){
      
      
      var text2answer = document.getElementById('Text2').value;
      var answer=$quarity-text2answer;
      
      
      alert( answer);




      
    }

    </script>"; 




    if(isset($_POST["Submit1"]))
    {
      $conn = mysqli_connect('localhost','root','','ilazo pharmacy and cosmetics') or die('Connection Failed');
      $sql = "UPDATE `receved items` SET `Quantity`='3' WHERE id=18";
      // Your code that you want to execute
    
      //<input type='submit' name='Submit1' id='myDIV' style='display:none;' onclick='calculate()'  id='btn_save' class='btn btn-success'  value='Save' /></button>


    //  $sql = "UPDATE `receved items` SET Quantity=1 where id=$ids";
    
  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
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
   document.getElementById("TextcalculateHeps").value = $result;
   
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








<br/><br/><br/>

<!--payng tables-->
<form id="form_id" action="" method="POST">
<table class="table" id="hidentable" style="width:100%;">
  <thead style="width:100%;" class="thead-dark">
    <tr>
     
      <th scope="col">Total Payment</th>
      <th scope="col">Pay</th>
      <th scope="col">Due</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      
<script type="text/javascript">
var text1 = document.getElementById("Text1");
var text2 = document.getElementById("Text2");



function add_number1() {

if(Text2.value<1){
alert("Unknown purchasing Qty detected ");
document.getElementById("txtresult2").value ="";
document.getElementById("Text3").value ="";
document.getElementById("txtresult1").value ="";

}


else{
  var first_number = parseFloat(txtresult1.value);
   if (isNaN(first_number)) first_number = 0;
   var second_number = parseFloat(Text3.value);
   if (isNaN(second_number)) second_number = 0;
   var result = first_number - second_number;
   $result=result;
   if($result=>0){
    document.getElementById("txtresult2").value = $result;


}


}
   
   
    

   
   
}

//<!--check if payment is ok -->


</script>

    <td><input type='text' id='txtresult1' name='TextBox3' style='width:87px; background-color:#dbd9d3;border:0;cursor: no-drop;' readonly ></td>
                  
                 

    <td ><input type='number'  id='Text3' name='TextBox2' style='width:80px;' oninput='add_number1();myFunction()' onchange='myFunction()'  min='1'    required></td>

    <td><input type='text' id='txtresult2' name='TextBox3' style='width:87px; background-color:#dbd9d3;border:0;cursor: no-drop;' readonly ></td>
         

   
    
    <td > 


    <script type="text/javascript">


function checkpayment(){
  var textboxchecker = document.getElementById("txtresult2");
  var textboxchecker2 = document.getElementById("quantity");
  
  if(textboxchecker.value>0){

    alert("payment is not complite");
    


  }

else if(textboxchecker2.value<2){

 
 //document.getElementById('form_id').submit();
    //  return(true);

    alert("Quantity can't be less than 1 in stock please cancel this purchase");
   

}

 
  
 

}




</script>
                  



        <!--  <input type="submit" id='mydivid' name="Submit1" class='btn btn-success' value='Add' onclick='checkpayment();adddata();'/></button> 
-->
       
        


          <input type="submit" value="Save" name="Submit1" class='btn btn-success' value='Add' onclick='checkpayment();'>

       
          <br/><br/>












        </form>


</td>

    </tr>
   
  </tbody>
</table>



<!-- togggle show payment after click button-->


<td ><input type='number' style="display:none;" name='named' id='TextcalculateHeps' name='TextBox2' style='width:80px;' oninput='add_number3();myFunction()' onchange='myFunction();add_number3();'  min='1'    ></td>


<td ><input type='number'  style="display:none;"  name='takeid' id='TextcalculateHeps2' name='TextBoxids' style='width:80px;'   min='1' oninput='add_number4();myFunction()' onchange='myFunction();add_number4();'   ></td>






<script>



</script>





<script>
function showTable(){
document.getElementById('hidentable').style.visibility = "visible";
}
function hideTable(){
document.getElementById('hidentable').style.visibility = "hidden";
}






</script>


<form method="post">

<?php
 
  
  // Create connection


  // Check connection

 


if(isset($_POST["Submit1"]))
{


  $conn = mysqli_connect("localhost","root","","ilazo pharmacy and cosmetics") or die("Connection Failed");

  
  
  


$name=$_POST['named'];
$id=$_POST['takeid'];
$sql = "UPDATE `receved items` SET `Quantity`='$name' WHERE id=$id";


if (mysqli_query($conn, $sql)) {

} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);



}
?>





</form>

</body>

</html>



              
                 
  