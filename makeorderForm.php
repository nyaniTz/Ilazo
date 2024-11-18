<?php 
include('connect.php');

if(isset($_POST['add'])){

  
// Retrieve values from the form
$description = $_POST['description'];
$unit = $_POST['Unit'];
$purchasing_qty = $_POST['purchasing_qty'];
$amount = $_POST['amount'];
$product_id=$_POST['product_id'];
echo $product_id;
$stmt = mysqli_prepare($conn, "INSERT INTO orders (Description, Unit, PurchasingQty, Amount) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssii", $description, $unit, $purchasing_qty, $amount);



$product_id = $_POST['product_id'];
$quantity_sold = $_POST['purchasing_qty'];

// Query to update the quantity of the received item
$update_query = "UPDATE receveditems SET Quantity = Quantity - ? WHERE id = ?";
$update_stmt = mysqli_prepare($conn, $update_query);
mysqli_stmt_bind_param($update_stmt, "ii", $quantity_sold, $product_id);
mysqli_stmt_execute($update_stmt);

// Check if the update was successful
if (mysqli_affected_rows($conn) > 0) {
    // Update was successful
} else {
    // Update failed
}




if (mysqli_stmt_execute($stmt)) {
    echo "New record created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
}
?> 