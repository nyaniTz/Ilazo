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


$sql = "SELECT distinct(`Description`) FROM `receved items`";
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
if(mysqli_num_rows($result) > 0 ){
  $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

  echo json_encode($output);

}else{
  echo "No Record Found.";
}

?>
