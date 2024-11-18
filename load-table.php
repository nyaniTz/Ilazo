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

$sql = "SELECT * FROM `receved items` WHERE `Description` = '{$_POST['city']}'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(empty($result)) {
  $query = "CREATE TABLE receved items (
            id int(255) AUTO_INCREMENT,
            Description varchar(255) NOT NULL,
            Unit varchar(255) NOT NULL,
            Quantity int (255) NOT NULL,
            Cost int (255) NOT NULL,
            Amount int (255),
          
            )";
  $result = mysqli_query($con, $query);
}
$output = "";

if(mysqli_num_rows($result) > 0 ){
  $output .= '<table border="0" width="100%"  cellpadding="10px">
              <tr>
                <th width="60px">Id</th>
                <th>Description</th>
                <th width="90px">Unit</th>
                <th width="90px">Price</th>
              </tr>';
  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
                  <td align='center'>{$row["id"]}</td>
                
                  <td align='center'>{$row["Description"]}</td>
                  <td align='center'>{$row["Unit"]}</td>
                  <td align='center'>{$row["Quantity"]}</td>
                </tr>";
  }    
   $output .= "</table>";

   echo $output;
}else{
    echo "No Record Found.";
}
?>
