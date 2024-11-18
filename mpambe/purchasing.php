<!DOCTYPE html>
<html lang="en">
<head>
<script type='text/javascript' src='load-table.php'>
  </script>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>




<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
          <br/>
        </div>
        <div class="modal-body">
     
        <?php

include 'mydbCon.php';

if(isset($_GET['edit_id'])){
$sql="SELECT * FROM `receved items` Where id=".$_GET['edit_id'];
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {


    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $Discription=$row["Description"];
        echo "id: " . $row["id"]. " - Name: " . $row["Description"]. " " . $row["Unit"]. "<br>";

echo"
<html>

<!--payng tables-->

<table class='table' id='hidentable' style='width:100%;'>
  <thead style='width:100%;' class='thead-dark'>
    <tr>
      <th scope='col'>Description</th>
      <th scope='col'>Total</th>
      <th scope='col'>Pay</th>
      <th scope='col'>Due</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope='row' > $Discription</th>
      <td>
      
      
      
   
      
      <script type='text/javascript'>
      
      
      </script> 
      </td>
      <td></td>
      <td></td>
    </tr>
   
  </tbody>
</table>


</table>


</html>




";





        
    }
} else {
    echo "0 results";
}

mysqli_close($con);
}
?>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


<script>
   


</script>
</body>
</html>








<?php

include 'mydbCon.php';

if(isset($_GET['edit_id'])){
$sql="SELECT * FROM `receved items` Where id=".$_GET['edit_id'];
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["Description"]. " " . $row["Unit"]. "<br>";










        
    }
} else {
    echo "0 results";
}

mysqli_close($con);
}
?>





<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
               
            </div>

            <table class="table">
              <thead>
                <tr>

              






                  <th scope="col">#</th>
                  <th scope="col">Description</th>
                  <th scope="col">Unit</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Cost</th>


                </tr>
              </thead>
              <tbody>
                <?php include 'retrieve-data.php'; ?>

                <?php if ($result->num_rows > 0): ?>

                <?php while($array=mysqli_fetch_row($result)): ?>

                <tr>
                    <th scope="row"><?php echo $array[0];?></th>
                    <td><?php echo $array[1];?></td>
                    <td><?php echo $array[2];?></td>
                    <td><?php echo $array[3];?></td>
                    <td><?php echo $array[4];?></td>
                </tr>

                <?php endwhile; ?>

                <?php else: ?>
                <tr>
                   <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
                <?php endif; ?>

                <?php mysqli_free_result($result); ?>

              </tbody>
            </table>
        </div>
    </div>        
</div>

</body>
</html>



