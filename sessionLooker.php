<?php
session_start();
ob_start();
include 'connect.php';


?>


<?php
     
if (isset($_POST['email']) && isset($_POST['password'])) {
  function validate($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;

  }



  $email = validate($_POST['email']);
  $password = validate($_POST['password']);
  if(empty($email)){

    header("Location:authentication.php?error=Email required");
    exit();
  }
  elseif(empty($password)){

    header("Location:authentication.php?error=Password required");
    exit();
  }
else{
 

    $query = "CREATE TABLE IF NOT EXISTS authentication (
              id int(255) NOT NULL AUTO_INCREMENT,
              Email varchar (255) NOT NULL,
              Password varchar(255) NOT NULL,
              PRIMARY KEY(id)
            
              )";




    $res2 = mysqli_query($conn, $query);
    if($res2){

      echo "table created";
    }else{
      echo "table not exist";
    }
  


  $sql="SELECT * FROM `authentication` where Email='".$email."'AND Password='".$password."' limit 1";

  $sql2="SELECT * FROM `userauthentication` where Email='".$email."'AND Password='".$password."' limit 1";

  $res = mysqli_query($conn, $sql);
  $res2 = mysqli_query($conn, $sql2);




  if(mysqli_num_rows($res)===1){
   $row=mysqli_fetch_assoc($res);
  if($row['Email']===$email && $row['Password']===$password){
    $_SESSION['id']=$row['id'];
    $_SESSION['email']=$row['Email'];
    $_SESSION['password']=$row['Password'];

echo $_SESSION['email'];
header("Location:AdminPanel.php");
  }}
elseif(mysqli_num_rows($res2)===1){
 $row=mysqli_fetch_assoc($res2);
if($row['Email']===$email && $row['Password']===$password){
  $_SESSION['id']=$row['id'];
  $_SESSION['email']=$row['Email'];
  $_SESSION['password']=$row['Password'];

echo $_SESSION['email'];
header("Location:index2.php");
}
  }
  else{

    header("Location:authentication.php?error=Incorect Email or password");
    exit();
  }

}

}


?>




