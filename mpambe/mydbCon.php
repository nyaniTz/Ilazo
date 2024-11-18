<?php
include('connectandcreate.php');
$con=new mysqli('localhost','root','','ilazo pharmacy and cosmetics');

if($con){

    die(mysqli_error($con));
    echo "something wrong contact  nyox";
}else{

    

}


?>



