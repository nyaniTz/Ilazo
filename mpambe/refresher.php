

              <?php
              if(isset($_POST['delete'])){
                  $conn = mysqli_connect("localhost","root","","ilazo pharmacy and cosmetics") or die("Connection Failed");
                $deleteitems=mysqli_real_escape_string($conn,$_POST['delete']);
                $OrderID=mysqli_real_escape_string($conn,$_POST['OrderID']);
                $ProductId=mysqli_real_escape_string($conn,$_POST['ProductId']);

                $que="DELETE FROM `orders` WHERE `ProductId`='$ProductId' AND `OrderID`='$OrderID'  ";
                $query_run=mysqli_query($conn,$que);
                if($query_run){
                
                  header("Location: orderdetals.php");
                }else{
                echo "record not deleted";
                }
              
                $quer = mysqli_query($conn, "SELECT * FROM `ordertracker` WHERE `id`='$deleteitems'  ");
                $array =  mysqli_fetch_assoc($quer);
                $val = $array['PurchasingQty'];
                $quer2 = mysqli_query($conn, "UPDATE `receveditems` SET `Quantity`=`Quantity`+'$val' ");


                
                  $que="DELETE FROM `ordertracker` WHERE id='$deleteitems'";
                  $query_run=mysqli_query($conn,$que);
                  if($query_run){
                    header("Location: orderdetals.php");

                  }else{
                  echo "record  not deleted";
                  }
                }



               
              ?>

  



