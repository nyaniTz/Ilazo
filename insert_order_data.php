<?php
include('connect.php');

$current_date = date('Y-m-d'); // Get the current date

// Select data from ordertracker table
$select_query = "SELECT * FROM ordertracker";
$result = mysqli_query($conn, $select_query);

// Insert selected data into orders table
$insert_query = "INSERT INTO orders (Description, PurchasingQty, Amount, Date) VALUES (?, ?, ?, ?)";
$insert_stmt = mysqli_prepare($conn, $insert_query);

while ($row = mysqli_fetch_assoc($result)) {
    $description = $row['Description'];
    $purchasing_qty = $row['PurchasingQty'];
    $amount = $row['Amount'];

    mysqli_stmt_bind_param($insert_stmt, "sids",
        $description,
        $purchasing_qty,
        $amount,
        $current_date
    );

    if (!mysqli_stmt_execute($insert_stmt)) {
        echo "Error inserting order data: " . mysqli_error($conn);
        exit;
    }
}

mysqli_stmt_close($insert_stmt);
mysqli_close($conn);
?>
