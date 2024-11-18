<?php 

//index.php

include('mpambe/connectandcreate.php');

// If database is not exist create one


$query = "SELECT `Description` FROM `receveditems` ORDER BY `Description` ASC";
$result = mysqli_query($conn, $query);




?>

<!doctype html>
<html lang="en">
    <head>


   
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax</title>
  <link rel="stylesheet" href="mpambe/css/style.css">












    <link rel="icon" type="image/jpg" href="image/favicons.jpg">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
        <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
        <script src="library/dselect.js"></script>
        <title>Sales</title>
        <style>


html {
  scroll-behavior: smooth;
}

</style>



    </head>
    <body>


    <div class="wrapper">
<a name="top"></a>
<header>



</header>
<br/>



</div><br>
<!--            Hide body when choose dropdown  -->

<script>

</script>
<!--           end choose dropdown  -->

<div class="article"  >

<br/>
<!-- <img  src="image/Homeworkicons.png" style=" padding-right:74px;" width="560" height="360" alt="Books">  -->
<div class="container">
           <!-- <h1 class="mt-2 mb-3 text-center text-primary">ilazo pharmacy and cosmetics</h1> -->
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">











                
                    <select   name="select_box" class="form-select" id="select_box"   >
                        <option value="" >Select Product</option>


                        <?php 
                        foreach($result as $row)
                        {
                            echo '<script type="text/JavaScript"> 
                           
                            </script>
                            <option value="'.$row["Description"].'">'.$row["Description"].'</option>';

                            

                        }

                        echo $row["id"];;

                        echo'My name is';
                        ?> 
                        
                        
                    </select>

                 
                 



                </div>
                <div class="col-md-3">&nbsp;</div>




            </div>      
            <br />
            <br />











        </div>

</div>






<br/><br/>


</div>

  <table id="main" style="border:0px" cellspacing="0" style="display:none">
    <tr>
  
      <td id="table-form" style="display:none">
        <form>
          <select id="city-box"  name="select_box" class="form-select" id="select_box">
                          <option value="">Select Product</option>
                        </select>
        </form>
      </td>
    </tr>
    <tr>
     
    </tr>
  </table>
    




    </body>
</html>

<script>



let option1 = document.getElementById('select_box');
let option2 = document.getElementById('city-box');

function matchOptions(e) {
 let option = e.target.selectedIndex;
 option1.selectedIndex = option;
 option2.selectedIndex = option;
}

option1.addEventListener('change', matchOptions);
option2.addEventListener('change', option1);


    var select_box_element = document.querySelector('#select_box');

    dselect(select_box_element, {
        search: true
    });

</script>

