<?php
include('connect.php');

$order_id = $_POST['order_id'];
$description = $_POST['description'];
$purchasing_qty = $_POST['purchasing_qty'];

// Delete the order from the ordertracker table
$delete_query = "DELETE FROM ordertracker WHERE id = ?";
$delete_stmt = mysqli_prepare($conn, $delete_query);
mysqli_stmt_bind_param($delete_stmt, "i", $order_id);
if (!mysqli_stmt_execute($delete_stmt)) {
    echo "Error deleting order: " . mysqli_error($conn);
    exit;
}

// Check if the delete was successful
if (mysqli_affected_rows($conn) > 0) {
    echo "Order deleted successfully!";
} else {
    echo "No rows were affected by the delete operation.";
}

// Update the quantity of the received item
$update_query = "UPDATE receveditems SET Quantity = Quantity + ? WHERE Description = ?";
$update_stmt = mysqli_prepare($conn, $update_query);
mysqli_stmt_bind_param($update_stmt, "is", $purchasing_qty, $description);
if (!mysqli_stmt_execute($update_stmt)) {
    echo "Error updating quantity: " . mysqli_error($conn);
    exit;
}

// Check if the update was successful
if (mysqli_affected_rows($conn) > 0) {
    echo "Quantity updated successfully!";
} else {
    echo "No rows were affected by the update operation.";
}

$stmt = mysqli_prepare($conn, $update_query);
if ($stmt === false) {
    die(mysqli_error($conn));
}

mysqli_stmt_close($update_stmt);
mysqli_close($conn);

?>
