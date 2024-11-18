<?php
include('connect.php');

$sql = "DELETE FROM ordertracker";
if (mysqli_query($conn, $sql)) {
  echo "Data removed from the ordertracker table successfully";
} else {
  echo "Error removing data from the ordertracker table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
